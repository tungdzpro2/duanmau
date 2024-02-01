<?php
include "../../model/pdo.php";
function deleteProduct($id) {
    $sql = "DELETE FROM `sanpham` WHERE idSp = $id";
    executeSQL($sql);
}

if(isset($_GET['idSp'])) {
    deleteProduct($_GET['idSp']);
    header('location: ../?action=add_products');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu gửi từ máy khách
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true); 

    
    if (isset($data['idSpArr']) && is_array($data['idSpArr'])) {
       
        $productIds = $data['idSpArr'];
        foreach ($productIds as $id) {
            deleteProduct($id);
        }
    } else {
        
        echo "Dữ liệu không hợp lệ.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}

header("Content-Type: application/json");
echo json_encode($responseData);
?>
