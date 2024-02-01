<?php 

    if(isset($_COOKIE['admin'])) {
        include "../../infoadmin/handleadmin.php";
        setcookie("admin", "", time() + -3600,"/"); 
        setcookie("passadmin", "", time() + -3600,"/"); 
    }
    header("location: ../../index.php");
?>