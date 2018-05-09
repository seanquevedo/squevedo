<?php

 include 'dbConnection.php';
    
 $connection = getDatabaseConnection("tp");
    
 $sql = "DELETE FROM book WHERE bookId =  " . $_GET['bookId'];
 echo $sql;
 $statement = $connection->prepare($sql);
 $statement->execute();
 
 header("Location: admin.php");
?>