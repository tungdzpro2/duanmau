<?php
session_start();
    include "model/pdo.php";
    include "model/users.php";
    include "model/comment.php";    
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "model/getdatachitietsp.php";
    include "model/donhang.php";


    include "view/header.php";
    
    if(isset($_GET['action'])) {
        
        switch($_GET['action']) {

            case 'chitietsanpham':
                
                include "view/chitietsanpham.php";
            break;

            case 'danhmucsanpham':
                include "view/danhmucsp.php";
            break;

            case 'login':
                include "view/login.php";
            break;

            case 'register':
                include "view/register.php";
            break;

            case 'forgotpassword':
                include "view/forgotpassword.php";
            break;

            case 'handlereset':
                include "view/handleresetpass.php";
            break;

            case 'cart':
                if(isset($_GET['key'])) {
                    
                    unset($_SESSION['cart'][$_GET['key']]);
                }
                if(isset($_POST['order']) && isset($_COOKIE['idUser'])) {
                    $idUser = $_COOKIE['idUser'];

                    for($i = 0; $i <= $_POST['slCart']; $i++) {
                        $idDonHang = getIdDonHangNew() + 1;
                        echo $idDonHang;
                        $idSp = $_POST["idSp$i"];
                        $sl = $_POST["slSp$i"];
        
                        insertDonHang($idDonHang,$idUser);
                        insertCtDonHang($sl,$idSp,$idDonHang);
                    }
                } else {
                    echo "đăng nhập để đặt hàng";
                }
                include "view/cart.php";
            break;

    

            default: 
                include "view/banner.php";
                include "view/main.php";
            break;
        }
        
    } else {
        include "view/banner.php";
        include "view/main.php";
    }
    include "view/footer.php";
?>