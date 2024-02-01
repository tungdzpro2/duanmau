<?php

    $idSp;
    $idDm;

    if(isset($_GET['idSp']) && $_GET['idDm']) {
        $idSp = $_GET['idSp'];
        $idDm = $_GET['idDm'];
    }

    function getIdUSer() {
        include "users.php";
       $idUser = getInfoUser($_COOKIE['user'])['idUser'];
       return $idUser;

    }


    function CreateCommentId() {
        $sql = "SELECT idCm FROM comment";
        $idCm = 0;
        $idTT = 0;
        try {
            $arrId = [];
            $result = queriesSQL($sql);

            if($result != false) {
                foreach($result as $idCm) {
                    $arrId[] = $idCm['idCm'];
                }
                $idTT = max($arrId);
            }
            $idCm = $idTT + 1;
        } catch (Exception $e) {
            
        }
        return $idCm;
    }
    

    function createComment($idCm, $nd, $idSp, $idUser) {
        $sql = "INSERT INTO `comment`(`idCm`,`content`,`idSp`,`idUser`) VALUES ('$idCm','$nd','$idSp','$idUser')";
        executeSQL($sql);
    }
   
    if(isset($_POST['btnsmcm'])) {
        if(isset($_COOKIE['user'])) {

            $ndcm = $_POST['ndcm'];
    
            $idUser = getIdUSer();
            $idCm = CreateCommentId();
    
            createComment($idCm,$ndcm, $idSp ,$idUser);
            
            header("location: ../index.php?action=chitietsanpham&idSp=$idSp&idDm=$idDm");    
        } else {
            header('location: ../index.php?action=login');
        }
    }

    function getInfoCMT($idSp) {
        $sql = "SELECT * FROM `comment` 
        INNER JOIN sanpham on sanpham.idSp = comment.idSp 
        INNER JOIN userdata ON userdata.idUser = comment.idUser 
        WHERE sanpham.idSp = $idSp order by comment.PostTime desc";

        return queriesSQL($sql);
    }
?>