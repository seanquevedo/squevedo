<?php
    include "../../../dbConnection.php";
    
    $conn = getDatabaseConnection("pets");
        
    $sql = "SELECT *, YEAR(CURDATE()) - yob age FROM pets WHERE id = :id";
    
    $stmt = $conn->prepare($sql);  
    $stmt->execute(array(":id"=>$_GET["id"]));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    // print_r($records);
    
    echo json_encode($record);
    //when creating API it must be in JSON format
?>