<?php
session_start();
if(!isset( $_SESSION['adminName']))
{
  header("Location:index.php");
}
include "dbConnection.php";
$conn = getDatabaseConnection("tp");

function getCategories() {
    global $conn;
    
    $sql = "SELECT catId, catName from category ORDER BY catName";
    
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo "<option value='".$record["catId"] ."'>". $record['catName'] ." </option>";
    }
}

if (isset($_GET['submitProduct'])) {
    $productName = $_GET['productName'];
    $productDescription = $_GET['description'];
    $productImage = $_GET['productImage'];
    $productPrice = $_GET['price'];
    $catId = $_GET['catId'];
    
    $sql = "INSERT INTO book
            ( `bookName`, `bookDescription`, `bookImage`, `price`, `categoryId`, `authorID`) 
             VALUES ( :productName, :productDescription, :productImage, :price, :catId, :authorID)";
    
    $namedParameters = array();
    $namedParameters[':productName'] = $productName;
    $namedParameters[':productDescription'] = $productDescription;
    $namedParameters[':productImage'] = $productImage;
    $namedParameters[':price'] = $productPrice;
    $namedParameters[':catId'] = $catId;
    $namedParameters[':authorID'] = 19;
     $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Add a product </title>
    
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="index.php">CSUMB Bookstore</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="admin.php">Admin <span class="sr-only">(current)</span></a>
              </li>
              
              
              
            </ul>
          </div>
        </nav>
        
        
        <h1> Add a Book</h1>
        <form>
            Product name: <input type="text" name="productName"><br>
            Description: <textarea name="description" cols = 50 rows = 4></textarea><br>
            Price: <input type="text" name="price"><br>
            Category: <select name="catId">
                <option value="">Select One</option>
                <?php getCategories(); ?>
            </select> <br />
            Set Image Url: <input type = "text" name = "productImage"><br>
            <input type="submit" name="submitProduct" value="Add Book">
            
        </form>
    </body>
    
    <footer>
            <hr>
             Internet Programming. 2018&copy; Quevedo <br />
             <strong>Disclaimer:</strong> The information in this webpage is fictitious. <br />
             It is used for academic purposes only.
             
    </footer>
</html>