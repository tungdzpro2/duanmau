<?php

function getInfoUs($user) {
    include "pdo.php";
    $sql = "select * from userdata where userName = '$user'";
    
    return queryOneSQL($sql);
}
function checkVHH($user, $password)
{
    $sql = "select role from userdata where userName = '$user' and passwordUser = '$password'";

    $result = queryOneSQL($sql);

    if ($result != false) {
        if ($result['role'] == 0) {

            return 1;
        } else {
            return 0;
        }
    }
    return "sai user hoac password!";
}
function checkLogin($user, $password)
{
    $sql = "select * from userdata";
    return queryOneSQL($sql);

}

if (isset($_POST['sm-login'])) {
    include "pdo.php";
    include "users.php";
    include "../infoadmin/handleadmin.php";

    $user = $_POST['user'];
    $pass = $_POST['password'];

    $resultCheckVhhLog = checkVHH($user, $pass);

    if ($resultCheckVhhLog === 1) {

        echo "account bi vo hieu hoa";

    } else if ($resultCheckVhhLog === 0) {

        if (isAdmin($user, $pass)) {
            setcookie('admin', "$user", time() + 3600, "/");
            setcookie('passadmin', openssl_encrypt($pass, 'aes-256-cfb', '???'), time() + 3600, "/");
        } else {
        
            $getIfUser = getInfoUser($user);
            $idUser = $getIfUser['idUser'];
            setcookie('user', "$user", time() + 3600, "/");
            setcookie('idUser', "$idUser", time() + 3600, "/");
        }
        header("location: ../index.php");
    } else {
        echo $resultCheckVhhLog;
    }
} else {
    header("location: ../index.php?action=login");
}
?>