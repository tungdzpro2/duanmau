<?php
    function getInfoUser($user) {
        $sql = "select * from userdata where userName = '$user'";
        
        return queryOneSQL($sql);
    }
    function checkMailEx($email) {
        $sql = "select * from userdata where mail = '$email'";
        if(queryOneSQL($sql)) {
           
            return true;
        }else {
            
            return false;
        }
    }
    function updateIdCodeUser($idCode,$email) {
        $sql = "UPDATE `userdata` SET `idCode`=$idCode WHERE mail = '$email'";
        return queryOneSQL($sql);
    }
    function CreateCodeID() {
        
        $sql = "SELECT idCode FROM `resetcode` ORDER BY idCode desc LIMIT 1";
        $idTT = 1;
        if(queryOneSQL($sql)) {
            $idTT = queryOneSQL($sql)['idCode'] + 1;
        } 
        return $idTT;
    }
    function createCodeRsUser($idCode, $code) {
        
        $sql = "INSERT INTO `resetcode`(`idCode`, `contentCode`) VALUES ($idCode, '$code')";
        executeSQL($sql);
    } 

    function getIfUserFlMail($email) {
        $sql = "select * from userdata where mail = '$email'";
        return queryOneSQL($sql);
    }
?>