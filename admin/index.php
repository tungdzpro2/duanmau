<?php

include "../infoadmin/handleadmin.php";
include "../model/pdo.php";
include "model/listsp.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "model/user.php";
include "model/cart.php";



if (isAdmin($_COOKIE['admin'], openssl_decrypt($_COOKIE['passadmin'], 'aes-256-cfb', '???'))) {

} else {
    header("location: ../index.php");

}
ob_start();
include "view/header.php";


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'listsanpham':
            include "view/listsanpham.php";
            break;
        case 'editsppage':
            include "view/editsppage.php";
            break;
        case 'create_categories':
            include 'view/createcategories.php';
            break;
        case 'add_products':
            include 'view/addproduct.php';
            break;
        case 'qli_tk':
            include 'view/quanlitk.php';
            break;
        case 'orders':
            include 'view/listcart.php';
            break;


    }
} else {
    include "view/home.php";
}

include "view/footer.php";

?>