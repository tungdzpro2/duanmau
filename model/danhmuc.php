<?php

function getValueDM()
{
    $sql = "SELECT * FROM `danhmuc`";
    $getDM = queriesSQL($sql);
    return $getDM;
}
function getValueSPDMID($id)
{
    $sql = "SELECT * FROM `danhmuc` INNER JOIN `sanpham` ON danhmuc.idDm = sanpham.idDm WHERE danhmuc.idDm = $id ";
    $getDM = queriesSQL($sql);
    return $getDM;
}
function getValueSPDMIDEX($idDm, $idSp)
{
    $sql = "SELECT * FROM danhmuc INNER JOIN sanpham ON danhmuc.idDm = sanpham.idDm WHERE danhmuc.idDm = $idDm AND sanpham.idSp != $idSp";
    $getDM = queriesSQL($sql);
    return $getDM;
}
?>