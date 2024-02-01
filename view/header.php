<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>duanmau</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="css/styleeeee.css">

</head>

<body>
    <header>
        <a href="../duanmau" class="logo">
            <img width="100px" src="imgs/logo1.png" alt="Logo">
        </a>
        <div class="search-box">
            <input type="text" class="search-input" placeholder="Tìm kiếm...">
            <div><i style="color: black; font-size: 30px;" class='bx bx-search-alt'></i></div>
        </div>
        
        <?php
            
            if(isset($_COOKIE['user'])) {?>

                <div class=" user">
                    Xin chao:
                    <a href=""><?=$_COOKIE['user']?></a>
                    <a href="model/logout.php">logout</a>
                </div>
                
            <?php } else if(isset($_COOKIE['admin'])) {?>
                <div class="admin">
                    Xin chao admin:
                    <a href=""><?=$_COOKIE['admin']?></a>
                    <a href="admin">Web quản trị</a>
                </div>
           <?php }
            else {?>

                <div class="lg-rigister">
                    <a href="?action=login">ĐĂNG NHẬP </a>
                    <a href="?action=register">ĐĂNG KÝ</a>
                </div>
            <?php }
        ?>
        
    
    </header>
    <nav>
            <ul>
                <li><a href="../duanmau">TRANG CHỦ</a></li>
                <li><a href="">SẢN PHẨM</a></li>
                <li><a href="">GÓP Ý</a></li>
                <li><a href="">HỎI ĐÁP</a></li>
                <li><a href="">LIÊN HỆ</a></li>
                <li> <a href="?action=cart">Giỏ hàng</a></li>
           

            </ul>
        </nav>

    