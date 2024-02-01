<?php 
    function getDmADM() {
        $sql = "select * from danhmuc";
        return queriesSQL($sql);
    }
    function getDmADMID($idDm) {
        $sql = "select * from danhmuc where idDm = $idDm";
        return queryOneSQL($sql);
    }
    function getDataDm() {
        $sql = "SELECT danhmuc.tenDm, COUNT(sanpham.idSp) AS SoLuongSanPham
        FROM danhmuc
        LEFT JOIN sanpham ON danhmuc.idDm = sanpham.idDm
        GROUP BY danhmuc.tenDm";

        return queriesSQL($sql);
    }
    function insertDanhMuc($tenDM) {
        $sql = "INSERT INTO `danhmuc`(`tenDm`) 
        VALUES ('$tenDM')";
        executeSQL($sql);
    }
    function deleteDm($iddm) {
        $sql = "DELETE FROM `danhmuc` WHERE idDm = $iddm";
        executeSQL($sql);
    }
    function reDm($iddm,$tenDM) {
        $sql =  "UPDATE `danhmuc` SET `tenDm`='$tenDM' WHERE idDm = $iddm";
        executeSQL($sql);
    }
?>