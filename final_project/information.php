
<?php
    
    function displayInfo() {
    include 'dbConnection.php';
    $conn = getDatabaseConnection("tp");

    $productId = $_GET['bookId'];

    $sql = "SELECT * FROM `book`
            INNER JOIN author  on book.authorID = author.authorID         
            INNER JOIN category on book.categoryID = category.catID
            WHERE bookId = :pId";    
    
    $np = array();
    $np[":pId"] = $productId;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    //title, description, author, category
        
        // echo $record['bookName'] . "<br>";
        echo "<br> <br>";
        echo "<h2> <u>" . $record["bookName"] . "</u></h2><br />";
        echo "<img src='" . $record['bookImage'] . "' width = '250' /></p><br>";
        echo "<p>Price: $" . $record["price"] . "</p><br />";
        
        echo "<p>Book Description: " . $record["bookDescription"] . "</p><br />";
        echo "<p>Author: " . $record["authorName"] . "</p><br />";       //how to get author name?
        echo "<p>Category: " . $record["catName"] . "</p><br />";
        echo "<p>Category Description: " . $record["catDescription"] . "</p><br />";
        
    
    // if(sizeof($records) == 0) {
    //     echo "No purchase information found, please direct back and choose another item!";
    // }
    }
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <!--<link href ="css/styles.css" rel ="stylesheet" type="text/css" />-->
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> 
        
        <style>
            body {
                text-align:center;
            }
        </style>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="http://csumb.edu">CSUMB Bookstore</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pets.php">Log In</a>
              </li>
              
              
            </ul>
          </div>
        </nav>
        
        <!--<h1><a href="index.php"> CSUMB Library </a></h1>-->
        <?php displayInfo(); ?>
    </body>
    
    <footer>
            <hr>
             Internet Programming. 2018&copy; Quevedo <br />
             <strong>Disclaimer:</strong> The information in this webpage is fictitious. <br />
             It is used for academic purposes only.
             
    </footer>
</html>
