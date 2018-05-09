<?php
    include "../dbConnection.php";
    
    $conn = getDatabaseConnection("tp");
        
    $sql = "SELECT * FROM book WHERE bookID = :bookId";
    
    $np = array();
    $np[":bookId"] = $_GET["bookID"];
    // echo $sql;
    $stmt = $conn->prepare($sql);  
    // $stmt->execute(array(":bookId"=>$_GET["bookID"]));
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($record);
    
    // echo $_GET["bookID"];
    echo json_encode($record);
    //when creating API it must be in JSON format
?>