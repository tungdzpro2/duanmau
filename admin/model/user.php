<?php
    function getUserDtb() {
        $sql = "SELECT * FROM userdata";
        return queriesSQL($sql);
    }
    function vhhUser($idUser) {
        $sql = "UPDATE `userdata` SET `role`='0' WHERE idUser = $idUser";
        executeSQL($sql);
    }
    function cancelVhhUser($idUser) {
        $sql = "UPDATE `userdata` SET `role`='1' WHERE idUser = $idUser";
        executeSQL($sql);
    }
    function deleteUser($idUser) {
        $sql = "DELETE FROM `userdata` WHERE idUser = $idUser";
        executeSQL($sql);
    }
?>