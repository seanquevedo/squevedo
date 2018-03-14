<?php

// Write  SQL SELECT statements to generate the following reports:
// 1) How many users bought something in February?
$sqlite1 = "SELECT COUNT(1) totalPur
            FROM purchase 
            WHERE purchaseDate >= '2018-02-01' AND purchaseDate <= '2018-02-28'";

// 2) What products were bought by users who have an aol account?
$sqlite2 = "SELECT productName
FROM product
NATURAL JOIN purchase
LEFT JOIN user
ON user.userId = purchase.user_id
WHERE user.email LIKE '%aol%'";

// 3) What is the total quantity of products bought by male and female users?
$sqlite3 = "SELECT sex, sum(quantity) together
FROM user 
LEFT JOIN purchase
ON user.userId = purchase.user_id
GROUP by sex";

// 4) What product categories were bought in February? (eg. Books, Sports)
$sqlite4 = "SELECT catName FROM `category` NATURAL JOIN product pro NATURAL JOIN purchase pur WHERE purchaseDate BETWEEN '2018-02-01' AND '2018-02-28' GROUP BY catName 
";

//to get data from database
$host = "localhost";
 $dbname = "ottermart";
 $username = "root";
 $password = "";
 $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 $stmt = $dbConn->prepare($sqlite1);     //query you want to execute
 $stmt->execute();
 $records = $stmt->fetch();      //get stored into associative array
 
//  print_r($records);
 echo "sqlite1 <br />";
 echo "Total Purchases in Feb: " . $records['totalPur'] . "<br/>";
 
 $stmt = $dbConn->prepare($sqlite2);     //query you want to execute
 $stmt->execute();
 $records = $stmt->fetchAll(PDO::FETCH_ASSOC);      //you are expecting MANY records compared to 1
 
 //goal: tell program to fetch associate array
//  print_r($records);
 echo "sqlite2 <br />";
 //print nicely
 foreach($records as $r) {
     echo $r['productName'] . "<br />";
 }
 
 
 //exercise 3
 $stmt = $dbConn->prepare($sqlite3);     //query you want to execute
 $stmt->execute();
 $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
 
 foreach($records as $r) {
     echo $r['together'] . "<br />";
 }
 
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
    </body>
</html>