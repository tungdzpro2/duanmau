<?php

function getIdDonHangNew() {
    $sql = "SELECT idDonHang FROM donhang order by idDonHang desc limit 1 ";
    if(queryOneSQL($sql)) {
        return queryOneSQL($sql)['idDonHang'];
    } else {
        return 1;
    }
}
function getSpid($idSp) {
    $sql = "SELECT * FROM sanpham where idSp = $idSp";
    return queryOneSQL($sql);
}
function insertDonHang($idDonHang, $idUser) {
    $sql = "INSERT INTO `donhang`(`idDonHang`, `idUser`) VALUES ('$idDonHang','$idUser')";
    executeSQL($sql);
}

function insertCtDonHang($sl, $idSp, $idDonHang) {
    $sql = "INSERT INTO `chitietdonhang`(`soLuong`, `idSp`, `idDonHang`) 
    VALUES ('$sl', '$idSp', '$idDonHang')";  
    executeSQL($sql);
}
