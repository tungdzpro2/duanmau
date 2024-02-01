<?php
    function getDataCTsp($id) {
        $sql = "select * from sanpham where idSp = $id";
        return queryOneSQL($sql);
    }
    function getview($id) {
        $sql = "select view from sanpham where idSp = $id";
        return queryOneSQL($sql)['view'];
    }
    function updateView($id) {
        $view = getview($id) + 1;
        $sql = "UPDATE `sanpham` SET `view` = '$view' WHERE `idSp` = $id";
        executeSQL($sql);
    }
?>