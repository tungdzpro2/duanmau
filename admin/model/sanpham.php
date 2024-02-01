<?php 
    function selectSPDMflId($id) {
        $sql = "SELECT * FROM `sanpham` inner join `danhmuc` on sanpham.idDm = danhmuc.idDm where idSp = $id";
        return queryOneSQL($sql);
    }
    function insertSanPham($iddm, $tensp, $mota, $anh, $gia) {
        $sql = "INSERT INTO `sanpham`(`tenSp`, `moTa`, `img`, `gia`, `idDm`) 
        VALUES ('$tensp','$mota','$anh','$gia','$iddm')"; 
        executeSQL($sql);
    }
    function getSanPhampsNewInDay($id) {
        $sql = "SELECT * FROM `sanpham` where idSp > $id order by idSp";
        if(queriesSQL($sql) != false) {
        
            return queriesSQL($sql);
        } else {
          
            return false;
        }
    }
    function getidSPthemost() {
        $sql = "SELECT idSp FROM sanpham ORDER BY idSp desc LIMIT 1";
        echo queryOneSQL($sql)['idSp'];
        return queryOneSQL($sql)['idSp'];
    }
    function updateSp($id, $idDm, $tenSp,$mota, $img, $gia) {
        $sql = "UPDATE `sanpham` 
        SET `tenSp`='$tenSp',`moTa`='$mota',`img`='$img',`gia`='$gia',`idDm`=$idDm 
        WHERE idSp = $id";
        executeSQL($sql);
    }
?>