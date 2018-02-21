<?php 
session_start();

$_SESSION['course'] = "CST336 Internet Programming";

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        <?= $_SESSION['course'] ?>
        
    </body>
</html>