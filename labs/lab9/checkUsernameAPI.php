<?php
//check whether username is already in the database

include '../../dbConnection.php';

$conn = getDatabaseConnection("c9");

$username = $_GET["username"];

$sql = "SELECT * FROM lab9_user WHERE username = :username";

//replace single quotes with named parameter
$stmt = $conn->prepare($sql);
$stmt->execute( array(":username"=>$username));
$record = $stmt->fetch(PDO:: FETCH_ASSOC);

// print_r($record);

echo json_encode($record);
?>
