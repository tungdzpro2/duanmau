<?php
function getInfoOrders()
{
    $sql = "SELECT * FROM `donhang` inner join userdata on donhang.idUser = userdata.idUser
     inner join chitietdonhang on donhang.idDonHang = chitietdonhang.idDonHang 
     inner join sanpham on chitietdonhang.idSp = sanpham.idSp";
    return queriesSQL($sql);
}
?>