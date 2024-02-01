<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>admin</title>

        <!-- Boxiocns CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/adminst.css">   
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body>

        <?php $adminIF = getInforAdmin();
        ?>
        <div id="modal-background">
            <div class="modal">
                <h3>Thông báo</h3>
                <div class="content">Bạn có muốn xóa không?</div>
                <div class="action">
                    <button id="modal-cancel">Hủy bỏ</button>
                    <button id="modal-confirm">Xóa</button>
                </div>
            </div>
        </div>
        <!-- sidebar -->
        <div class="sidebar">

            <div class="logo-details">
                <i class='bx bx-menu'></i>
                <span class="logo_name">ADMIN</span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="#">
                        <i class='bx bx-grid-alt'></i>
                        <span class="link_name">Dashboard</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Category</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bxs-package'></i>
                            <span class="link_name">Sản phẩm</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Sản phẩm</a></li>
                        <li><a href="?action=create_categories">Tạo danh mục</a></li>
                        <li><a href="?action=add_products">Thêm sản phẩm</a></li>
                        <li><a href="?action=listsanpham">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bxs-user-account'></i>
                            <span class="link_name">Tài khoản</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Tài khoản</a></li>
                        <li><a href="?action=qli_tk">Quản lí tài khoản</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-message-dots'></i>
                            <span class="link_name">Bình luận</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Bình luận</a></li>
                        <li><a href="#">Quản lí bình luận</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                        <i class='bx bxs-truck'></i>
                            <span class="link_name">Đơn hàng</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Đơn hàng</a></li>
                        <li><a href="?action=orders">Quản lí đơn hàng</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-book-alt'></i>
                            <span class="link_name">Posts</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Posts</a></li>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Login Form</a></li>
                        <li><a href="#">Card Design</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="link_name">Analytics</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Analytics</a></li>
                    </ul>
                </li>
                <li>
                    <!-- <a href="#">
                        <i class='bx bx-line-chart'></i>
                        <span class="link_name">Chart</span>
                    </a> -->
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Chart</a></li>
                    </ul>
                </li>
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-plug'></i>
                            <span class="link_name">Plugins</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Plugins</a></li>
                        <li><a href="#">UI Face</a></li>
                        <li><a href="#">Pigments</a></li>
                        <li><a href="#">Box Icons</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-compass'></i>
                        <span class="link_name">Explore</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Explore</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-history'></i>
                        <span class="link_name">History</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">History</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bx-cog'></i>
                        <span class="link_name">Setting</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Setting</a></li>
                    </ul>
                </li>
                <li>
                    <div class="profile-details">
                        <div class="profile-content">
                            <img src="../imgs/<?= $adminIF['imgUser'] ?>" alt="profileImg">
                        </div>
                        <div class="name-job">
                            <div class="profile_name">
                                <?= $adminIF['userName'] ?>
                            </div>
                            <div class="job">Web Desginer</div>
                        </div>
                        <a href="./model/logout.php"><i class='bx bx-log-out'></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- content -->
        <section class="home-section">