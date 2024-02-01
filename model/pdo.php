<?php
function connectDTB($dbname, $username, $password) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;

    } catch(PDOException $e) {
        error_log("Error connecting to the database: " . $e->getMessage());
        die("Database connection error");
    }
}

function executeSQL($sql) {
    try {
        $conn = connectDTB("duanmau", "root", "");
        $sttm = $conn->prepare($sql);
        $sttm->execute();
    } catch(PDOException $e) {
        error_log("SQL error: " . $e->getMessage());
        die("SQL error");
    }
}

function queryOneSQL($sql) {
    try{

        $conn = connectDTB("duanmau", "root", "");
        $sttm = $conn->prepare($sql);
        $sttm->execute();

        $fetchDTB = $sttm->fetch(PDO::FETCH_ASSOC);
        if($fetchDTB != false) {
            return $fetchDTB;
        } else {
            return null;
        }
    } catch(PDOException $e) {
        error_log("SQL error: " . $e->getMessage());
        die("SQL error");
    }
}
function queriesSQL($sql) {
    try{

        $conn = connectDTB("duanmau", "root", "");
        $sttm = $conn->prepare($sql);
        $sttm->execute();

        $fetchDTB = $sttm->fetchAll(PDO::FETCH_ASSOC);
        if($fetchDTB != false) {
            return $fetchDTB;
        } else {
            return null;
        }
    } catch(PDOException $e) {
        error_log("SQL error: " . $e->getMessage());
        die("SQL error");
    }
}
?>
