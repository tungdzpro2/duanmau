<?php
    if(isset($_GET['idUser'])) {
        include "../../model/pdo.php";
        include "user.php";
        vhhUser($_GET['idUser']);
    }
    header("location: ../?action=qli_tk");
?>