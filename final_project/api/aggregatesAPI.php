<?php
    include '../dbConnection.php';
    $conn = getDatabaseConnection("tp");
    
    // $sql = "SELECT CAST(AVG(price) AS DECIMAL(10,2)) AS avg, CAST(MIN(price) AS DECIMAL(10,2)) AS min, CAST(MAX(price) AS DECIMAL(10,2)) AS max FROM `xbox` WHERE 1";
    $sql = "SELECT COUNT(*) AS count, CAST(MIN(price) AS DECIMAL(10,2)) AS min, CAST(MAX(price) AS DECIMAL(10,2)) AS max FROM `book` WHERE 1";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    print json_encode($record);
    
?>