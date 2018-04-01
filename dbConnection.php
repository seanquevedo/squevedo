<?php

    function getDataBaseConnection($dbName) {
        
        $host = "localhost";
        $dbname = $dbName;
        $username = "root";
        $password = "";
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $dbConn;
    }
    
    function getDataBaseConnection2($dbName) {
        
        $host = "us-cdbr-iron-east-05.cleardb.net";
        $dbname = $dbName;
        $username = "b8d9b5c0dc7158";
        $password = "3b2fec90";
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $dbConn;
    }
    
    function getDataBaseConnection3($dbName) {
        
        $host = "localhost";
        $dbname = $dbName;
        $username = "root";
        $password = "";
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $dbConn;
    }
    
?>