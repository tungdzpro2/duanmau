<?php 
    if(isset($_COOKIE['user'])) {
        setcookie("user", "", time() + -3600, "/");
    }
    header("location: ../index.php");
?>