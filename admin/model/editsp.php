<?php
    
    
    if (isset($_POST['btnedit'])) {
        include "../../model/pdo.php";
        include "sanpham.php";
        $editCout = $_POST['btnedit'];
        for ($i = 1; $i <= $editCout; $i++) {

            $id = $_POST['idsp' . $i];
            $idDm = $_POST['dm' . $i];
            $tenSp = $_POST['tensp' . $i];
            $mota = $_POST['mota' . $i];
            $FILE = $_FILES['fileimg' . $i];
            $gia = $_POST['gia' . $i];

            $nameFile = $FILE['name'];

            $targetSave = "../../imgs/";

            if(empty($nameFile)) {
                $nameFile = $_POST['imgname' .$i];
            }
            move_uploaded_file($FILE['tmp_name'], $targetSave . $nameFile);
            updateSp($id, $idDm, $tenSp, $mota, $nameFile, $gia);
            header('location: ../?action=listsanpham');
        }
    }
?>