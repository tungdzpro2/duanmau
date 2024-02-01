<?php 
    include "./model/pdo.php";
    $sql = "SELECT danhmuc.tenDm, COUNT(sanpham.idSp) AS SoLuongSanPham
        FROM danhmuc
        LEFT JOIN sanpham ON danhmuc.idDm = sanpham.idDm
        GROUP BY danhmuc.tenDm";

    $data = queriesSQL($sql);
    
    header('Content-Type: application/json');
    echo json_encode($data);