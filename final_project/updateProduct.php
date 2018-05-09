<?php
    include 'dbConnection.php';
    
    $connection = getDatabaseConnection("tp");
    
    function getCategories($catId) {
    global $connection;
    
    $sql = "SELECT catId, catName from category ORDER BY catName";
    
    $statement = $connection->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo "<option  ";
        echo ($record["catId"] == $catId)? "selected": ""; 
        echo " value='".$record["catId"] ."'>". $record['catName'] ." </option>";
    }
}
    
    function getProductInfo()
    {
        global $connection;
        $sql = "SELECT * FROM book WHERE bookID = " . $_GET['bookId'];
    
        //echo $_GET["productId"];
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    
    if (isset($_GET['updateProduct'])) {
        
        //echo "Trying to update the product!";
        
        $sql = "UPDATE book
                SET bookName = :productName,
                    bookDescription = :productDescription,
                    bookImage = :productImage,
                    price = :price,
                    categoryID = :catId
                WHERE bookID = :productId";
        $np = array();
        $np[":productName"] = $_GET['bookName'];
        $np[":productDescription"] = $_GET['description'];
        $np[":productImage"] = $_GET['productImage'];
        $np[":price"] = $_GET['price'];
        $np[":catId"] = $_GET['catId'];
        $np[":productId"] = $_GET['productId'];
                
        // echo "<h2> " . $sql . "</h2>";
        $statement = $connection->prepare($sql);
        $statement->execute($np);        

        
    }
    
    
    if(isset ($_GET['bookId']))
    {
        $product = getProductInfo();
    }
    
    // print_r($product);
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Product </title>
        
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
        <h1>Update Product</h1>
        
        <form>
            <input type="hidden" name="productId" value= "<?=$product['bookID']?>"/>
            Product name: <input type="text" value = "<?=$product['bookName']?>" name="bookName"><br>
            Description: <textarea name="description" cols = 50 rows = 4><?=$product['bookDescription']?></textarea><br>
            Price: <input type="text" name="price" value = "<?=$product['price']?>"><br>
    
            Category: <select name="catId">
                <option>Select One</option>
                <?php getCategories( $product['categoryID'] ); ?>
            </select> <br />
            Set Image Url: <input type = "text" name = "productImage" value = "<?=$product['bookImage']?>"><br>
            <input type="submit" name="updateProduct" value="Update Product">
            
        </form>
    </body>
</html>