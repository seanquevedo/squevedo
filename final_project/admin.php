<?php

session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:index.php");
}
include 'dbConnection.php';
$conn = getDatabaseConnection("tp");

function displayAllProducts(){
    global $conn;
    $sql="SELECT * FROM book";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // echo "<h2> " .$sql. "</h2>";
    //print_r($records);

    return $records;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
            
            form {
                display: inline;
            }
            
        </style>
        
        <script>
            
            function confirmDelete() {
                
                return confirm("Are you sure you want to delete it?");
                
            }
            
        </script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="index.php">CSUMB Bookstore</a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
        </nav>

        
        <h1> Admin Main Page </h1>
        
        <h3> Welcome <?=$_SESSION['adminName']?>! </h3>
        
        
        <input type="hidden" name="count" value="number">
        <input type="submit" value="# of Books">
        
        <input type="hidden" name="expensive" value="exp">
        <input type="submit" value="Most Expensive Book">
        
        <input type="hidden" name="cheap" value="chp">
        <input type="submit" value="Cheapest Book">
        
        <?php
          if (!empty($_GET['count'])) {
            echo "Hello worldCC!"; //Your code here
          } 
          
          if (!empty($_GET['expensive'])) {
            echo "Hello worldEE!"; //Your code here
          } 
          
          if (!empty($_GET['cheap'])) {
            echo "Hello worldCHP!!"; //Your code here
          } 
        ?>
        
        <br />
        <form action="addProduct.php">
            <input type="submit" name="addproduct" value="Add Product"/>
        </form>
        
        <form action="logout.php">
            <input type="submit"  value="Logout"/>
        </form>
        
        <br /> <br />
        <strong> Products: </strong> <br />
        
        <?php $records=displayAllProducts();
            foreach($records as $record) {
                echo "[<a href='updateProduct.php?bookId=".$record['bookID']."'>Update</a>]";
                //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
                
                echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='bookId' value= " . $record['bookID'] . " />";
                echo "<input type='submit' value='Remove'>";
                echo "</form>";
                
                echo $record['bookName'];
                echo '<br>';
            }
        
        ?>
        
        

    </body>
</html>