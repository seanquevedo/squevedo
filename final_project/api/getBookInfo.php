<?php
    include "../dbConnection.php";
    
    $conn = getDatabaseConnection("tp");
        
    $sql = "SELECT * FROM book WHERE bookName LIKE '%:bookName%'";
    
    $stmt = $conn->prepare($sql);  
    $stmt->execute(array(":bookName"=>$_GET["bookName"]));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($records);
    
    echo json_encode($record);
    //when creating API it must be in JSON format
?>