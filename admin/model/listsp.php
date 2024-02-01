<?php
    function getDtTable() {
        $sql = "SELECT * FROM `sanpham` inner join `danhmuc` on sanpham.idDm = danhmuc.idDm";
        return queriesSQL($sql);
    }
?>