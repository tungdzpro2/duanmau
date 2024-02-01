<?php

    if(isset($_GET['iddm'])) {
        include "../../model/pdo.php";
        include "danhmuc.php";
        deleteDm($_GET['iddm']);
    }
    header('location: ../?action=create_categories');
?>