
<?php

    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("tp");
    include 'addCart.php';
    
    function displayAuthor(){
        global $conn;
        
        $sql = "SELECT authorID, authorName FROM `author` ORDER BY authorName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
        
        foreach ($records as $record) {
            
            echo "<option " . ($_GET["bookAuthor"] == $record["authorID"] ? "selected" : "") .
            " value='".$record["authorID"]."' >" . $record["authorName"] . "</option>";
            
        }
        
    }
    
    function displayCategories(){
        global $conn;
        
        $sql = "SELECT catId, catName FROM `category` ORDER BY catName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
        
        foreach ($records as $record) {
            
            echo "<option " . ($_GET["bookCategory"] == $record["catId"] ? "selected" : "") .
             " value='".$record["catId"]."' >" . $record["catName"] . "</option>";
            
        }
        
    }

    function displaySearchResults(){
        global $conn;
        
        if (isset($_GET['searchButton'])) { //checks whether user has submitted the form
            
            echo "<br> <h3>Books Found: </h3> "; 
            
            //following sql works but it DOES NOT prevent SQL Injection
            //$sql = "SELECT * FROM om_product WHERE 1
            //       AND productName LIKE '%".$_GET['product']."%'";
            
            //Query below prevents SQL Injection
            
            //$namedParameters = array();
            
            // $sql = "SELECT * FROM book "; //dont need WHERE 1?
            $sql = "SELECT * FROM book INNER JOIN author a ON book.authorID = a.authorID INNER JOIN category c ON book.categoryID = c.catID WHERE 1 ";
            $catId = "";
            $authorId = "";
            if(!empty($_GET["bookAuthor"])) {
                // $sql .= "INNER JOIN author a ON book.authorID = a.authorID ";
                $authorId = $_GET["bookAuthor"];
                $sql .= " AND book.authorID = $authorId ";
                
            }
            
            if(!empty($_GET["bookCategory"])) {
                // $sql .= "INNER JOIN category c ON book.categoryID = c.catID "; 
                $catId = $_GET["bookCategory"];
                $sql .= " AND categoryID = $catId";
                
            }
            
            if(!empty($_GET["bookName"])) {    //where 1 OR?
                $bookName = $_GET["bookName"];
                $sql .= " AND bookName LIKE '%$bookName%' ";
            }
                
            
            if(!empty($_GET["priceFrom"])) {    //where 1 OR?
                $price = $_GET["priceFrom"];
                $sql .= " AND price >= $price ";
            }
            
            if(!empty($_GET["priceTo"])) {    //where 1 OR?
                $price2 = $_GET["priceTo"];
                $sql .= " AND price <= $price2 ";
            }
            
                //join the categoryID to category table
                
                // SELECT * 
                // FROM book 
                // NATURAL JOIN category
                // ON book.categoryID = catID
                // if($_GET['orderBy'] == "category") {
                //     $sql .= " ORDER BY category ";
                // }
                
                $sql .= " ORDER BY bookName " ;
                
                if($_GET["orderBy"] == "desc") {
                            $sql .= " DESC";
                        }
                // echo "<h1> $sql </h1>"; //for debugging purposes
                
                $stmt = $conn->prepare($sql);
             $stmt->execute();
             $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
             
             //pull before add
        
        //when displayed, post book name: bookDescription
            foreach ($records as $record) { 
                //add category //add 
                // <a href = "\information.php?bookId=1> </a>"?
                 echo "<a href =\"information.php?bookId=" . $record["bookID"] . "\"> More Info </a> <br> "; //THIS IS THE ONE
                
                 
                //  echo "<a href='addCart.php?bookId=" . $record["bookID"] . "'>Add to cart </a>";
                 echo  "<a style='color:black; background-color:white;'> <strong> " . $record["bookName"] . " by " . $record["authorName"] . ":</strong> <br>" . " " . $record["bookDescription"] . "</a><br>Price: $" . $record["price"] . "<br />";
                //  echo "<a href='#' class='bookLink' value='" .
                //     $record["bookID"] . "name = " . $record["bookID"] . " id='".$record['bookID']."'  > More Info </a> <br>"; //this is the ajax one
                 echo "<form method='post'><input type='hidden' name='bookId' value='" .
                    $record["bookID"] . "'><input type='submit' value='Add to cart' name='addBook'></form> <br><br>";
            }
        }
            
            
            
             
        
        
        }
        
//     SELECT * FROM `book` 
// INNER JOIN category c ON book.categoryID = c.catID
// INNER JOIN author a ON book.authorID = a.authorID
// WHERE c.catID = 4 AND a.authorID = 7

    
?>




<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB Bookstore </title>
        <!--<link rel="stylesheet" href="css/styles.css">-->
        
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
          <a class="navbar-brand" href="index.php">CSUMB Bookstore</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="signin.php">Log In</a>
              </li>
              
              
            </ul>
          </div>
        </nav>
        
        
        
        <h1> CSUMB Bookstore </h1>
        <a href="cart.php"> Cart </a>
        
        <form method="GET">
        
            <label for="bookName">Name: </label>
            <input type="text" name="bookName" id="bookName" placeholder="Search Book Title"
                value="<?= $_GET["bookName"] ?>">
            
            <br>
                
            <label for="bookCat">Category: </label>
            <select id="bookCat" name="bookCategory">
              <option value="" >  Select One </option> 
              <?php displayCategories(); ?> 
              
               <!--We need to get the list from the DB to be displayed.-->
               <!--  Something like getCategory() function may be needed.-->
            </select>
            <br>
            
            
            <label for="bookAuthor">Author: </label> 
            <select id="bookAuthor" name="bookAuthor">
              <option value="" > Select One </option> 
                  <?php displayAuthor(); ?> 
            </select>
            <br>
            
            <label for = "price">Price Range: </label>
            <input type="text" name="priceFrom" value = "<?php echo $_GET['priceFrom'] ;?>" size="7"/> - 
            <input type="text" name="priceTo"  value = "<?php echo $_GET['priceTo']; ?>" size="7"/>
             
             <p>Order by: </p>
             <input <?= $_GET["orderBy"] == "asc" ? "checked" : ""; ?> 
                type="radio" name="orderBy" id = "asc" value = "asc"> <label for="asc"> A-Z</label> <br>
             <input <?= $_GET["orderBy"] == "desc" ? "checked" : ""; ?> 
                 type="radio" name="orderBy" id = "desc" value = "desc"> <label for="desc"> Z-A</label> <br>
             <!--<input type="radio" name="orderBy" id = "cat" value = "cat"> <label> Category</label> <br>-->

              
              <!--We need to get the list from the DB to be displayed.-->
              <!--Something like getAuthor() function may be needed.-->
            <!--</select>-->
            <br>
            
            <input type="submit" name="searchButton" value="Search"/> 
            
        </form>
            <?= displaySearchResults(); ?>
            
          <script>
    
        //     $(document).ready(function(){
            
        //             // $("#adoptionsLink").addClass("active");
                    
        //             $(".bookLink").click(function(){
                        
        //                 // alert( "in here" );
                        
        //                 $('#bookModal').modal("show");
        //                 $("#bookInfo").html("<img src='img/loading.gif'>");
                              
                        
        //                 $.ajax({
        
        //                     type: "GET",
        //                     url: "api/getBookInfo.php",
        //                     dataType: "json",
        //                     data: { "bookID": $(this).attr("bookID")},
        //                     success: function(data,status) {
        //                       //alert(data.breed);
        //                       //log.console(data.pictureURL);
                               
        //                       if(!data) {
        //                           alert("nothing here");
        //                       }
        //                       $("#bookModalLabel").html("<h2>" + data.bookName +"</h2>");
        //                       $("#bookInfo").html("");
        //                     //   $("#bookInfo").append("Age: " + data.age + " years <br>");
        //                     //   $("#bookInfo").append(data.breed + "<br>");
        //                       $("#bookInfo").append(data.bookDescription + "<br>");
        //                       $("#bookInfo").append("<img src='img/" + data.bookImage +"' width='200'>");
                               
                            
        //                     },
        //                     complete: function(data,status) { //optional, used for debugging purposes
        //                     // alert("done");
        //                     }
                            
        //                 });//ajax
                        
                        
        //             });
                
                
        //     }); //document ready
            
            
        //  </script>
        
            <!-- Modal -->
    <div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bookModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              
            <div id="bookInfo"></div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    </body>
    
    
</html>
