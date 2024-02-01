<?php
function top10Sp()
{
    $sql = "SELECT * FROM sanpham inner join danhmuc on sanpham.idDm = danhmuc.idDm ORDER BY view DESC LIMIT 10";
    return queriesSQL($sql);
}

function Includes($icls, $value)
{

    foreach ($icls as $icl) {
        if ($icl == $value) {

            return true;
        }

    }
    return false;
}
function getValueInnerNotMatch()
{
    $sql = "SELECT * FROM `danhmuc` INNER JOIN `sanpham` ON danhmuc.idDm = sanpham.idDm ORDER BY view DESC LIMIT 10";
    $getDM = queriesSQL($sql);
    $includes = [];
    $result = [];
    foreach ($getDM as $vl) {
        if (Includes($includes, $vl['idDm'])) {
        } else {
            $result[] = $vl;
            $includes[] = $vl['idDm'];
        }
    }
    return $result;
}
function getTenNewProduct() {
    $sql = "select * from sanpham inner join danhmuc on sanpham.idDm = danhmuc.idDm where 1 ORDER BY idSp DESC";
    return queriesSQL($sql);
}
?>