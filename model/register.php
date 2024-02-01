<?php
    if (isset($_POST['sm-regis'])) {
        include "pdo.php";

        $user = $_POST['user'];
        $pass = $_POST['password'];
        $email = $_POST['email'];



        $sql = "INSERT INTO `userdata`(`userName`, `passwordUser`,`mail`) 
                        VALUES ('$user','$pass','$email')";
        executeSQL($sql);
        
        header("location: ../index.php?action=login");

    } else {
        header("location: ../index.php?action=register");
    }
?>