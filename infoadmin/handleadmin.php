<?php
    $admin = "tung";
    $passadmin = "tung";

        
    function isAdmin($ad, $pass) {
        // echo $ad; 
        return ($GLOBALS['admin'] == $ad  && $GLOBALS['passadmin'] == $pass ? true : false);
    }

    function getInforAdmin() {
        $ad = $GLOBALS['admin'];
        $sql = "select * from userdata where userName = '$ad'";
        return queryOneSQL($sql);
    }

?>