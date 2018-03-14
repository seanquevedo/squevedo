<?php 
    // index 0 = BASIC , 1 = CHOCOLATE, 2 = ICE CREAM CAKE, 3 = RED VELVET CAKE, 4 = FUNFETTI
    $counts = array(0,0,0,0,0);
    
    // welcome name!
    if ( isset($_GET["fullName"])) {
        echo "<h2>Hi " . ucfirst($_GET["fullName"]) . "!</h2>";
    } else if($_GET["fullName"] == "") {
        echo "Welcome!";
    }
    
    
    //color tally vote
    $color = $_GET["color"];
    // $color = "#ffffff"; 547
    $sum = 0;
    for($k = 0; $k < strlen($color); $k++) {
        $sum += ord($color[$k]);
    }
    
    if($sum <= 109) {
        $counts[0] += 1;
    } else if($sum <= 218) {
        $counts[1] += 1;
    } else if($sum <= 327) {
        $counts[2] += 1;
    } else if($sum <= 436) {
        $counts[3] += 1;
    } else {
        $counts[4] += 1;
    }
    
    //tally music choice
    if(isset($_GET["music"])) {
        $genre = $_GET["music"];
        if($genre == "top") {
            $counts[0] += 1;
        }
        if($genre == "hiphop") {
            $counts[2] += 1;
        }
        if($genre == "edm") {
            $counts[4] += 1;
        }
        if($genre == "rock") {
            $counts[1] += 1;
        }
        if($genre == "kpop") {
            $counts[3] += 2;
        }
    }
    
    
    //tally toppings
    
    
    //tally category
    if(isset($_GET["base"])) {
        if($_GET["base"] == "base") {
            $counts[0] += 2;
        } else if($_GET["base"] == "frosting") {
            $counts[1]++;
            $counts[2]++;
            $counts[3]++;
            $counts[4]++;
        }
    }
    
    //tally activity
    if(isset($_GET["activity"])) {
        $genre = $_GET["activity"];
        if($genre == "reading") {
            $counts[3] += 1;
        }
        if($genre == "lmusic") {
            $counts[2] += 1;
        }
        if($genre == "videogames") {
            $counts[4] += 1;
        }
        if($genre == "socialmedia") {
            $counts[0] += 1;
        }
        if($genre == "youtube") {
            $counts[1] += 2;
        }
    }
    
    $index = findMaxIndex($counts);
    
   
    function checkCategory($category){
        if ($category == $_GET['base']) {
           echo " selected";
        }
    }
    
    function findMaxIndex($array) {
        if ($array = array(0,0,0,0,0)) {
            return 5;
        }
        $result = 0;
        $max = 0;
        for($k = 0; $k < sizeof($array); $k++) {
            if($array[$k] > $max) {
                $max = $array[$k];
                $result = $k;
            }
        }
        return $result;
    }
    
    function getCake($num) {
        $result = "";
        switch($num) {
            case 0:
                // echo img src of basic cake
                
                $result = "Basic!";
                break;
            case 1:
                
                $result = "Chocolate Cake!";
                break;
            case 2:
                
                $result = "Ice Cream Cake!";
                break;
            case 3:
                
                $result = "Red Velvet Cake!";
                break;
            case 4:
                
                $result = "Funfetti";
                break;
            case 5:
                $result = "nothing yet! Do the quiz!";
                break;
            default:
                $result = "No definitive answer. Try again!";
            echo "You got ". $result;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> What kind of cake are you? </title>
        
        <style>
            h1 {
                color: #f0c2e0;
                text-align: center;
            }
            
            div {
                float:right;
            }
            img {
                width:40%;
            }
            
            h2 {
                color: #faeaf5;
                text-align: center;
            }
            
            body {
                background-color:#d147a3;
                color:white;
            }
            
            form {
                /*width:40%;*/
                margin-left:400px;
                position: relative;
            }
        </style>
        
    </head>
    <body>
        <h1> What kind of cake are you? </h1>
        <form method = "GET">
            Please enter your name: <input type="text" size="20" name="fullName" placeholder="Insert Full Name" value = "<?=$_GET['keyword']?>"/>
            
            <br>
            
            Choose your favorite color: <input type="color" name = "color" value="#1111ff">
            
            <br> <br>
            
            <legend>What kind of music do you like?</legend>
            <input id="top" type="radio" name="music" value="top" <?=($_GET['music'] == "top") ? "checked":"" ?>>
            <label for="top">Top 40</label><br>
            
            <input id="hiphop" type="radio" name="music" value="hiphop" <?=($_GET['music'] == "hiphop") ? "checked":"" ?>>
            <label for="hiphop">Hip Hop/Rap</label><br>
            
            <input id="edm" type="radio" name="music" value="edm" <?=($_GET['music'] == "edm") ? "checked":"" ?>>
            <label for="edm">EDM</label><br>
            
            <input id="rock" type="radio" name="music" value="rock" <?=($_GET['music'] == "rock") ? "checked":"" ?>>
            <label for="rock">Rock</label> <br>
            
            <input id="kpop" type="radio" name="music" value="kpop" <?=($_GET['music'] == "kpop") ? "checked":"" ?>>
            <label for="kpop">K-Pop</label> <br>
                
            <br> <br>
            
            Check your favorite toppings: <br>    
            <input type="checkbox" id="basic"  name="basic" value="basic" <?php if(isset($_GET['basic'])) echo "checked='checked'"; ?>>
            <label for="basic"> None, I'm basic </label> <br>
            
            <input type="checkbox" id="buttercream"  name="buttercream" value="buttercream" <?php if(isset($_GET['buttercream'])) echo "checked='checked'"; ?>>
            <label for="buttercream"> Buttercream </label> <br> 
            
            <input type="checkbox" id="chocolate"  name="chocolate" value="fudge" <?php if(isset($_GET['chocolate'])) echo "checked='checked'"; ?>>
            <label for="chocolate"> Chocolate Fudge </label> <br> 
            
            <input type="checkbox" id="fruit"  name="fruit" value="fruit" <?php if(isset($_GET['fruit'])) echo "checked='checked'"; ?>>
            <label for="fruit"> Fruit </label> <br>  
            
            <input type="checkbox" id="icecream"  name="icecream" value="icecream" <?php if(isset($_GET['icecream'])) echo "checked='checked'"; ?>>
            <label for="icecream"> Ice Cream </label> <br>
            
            <input type="checkbox" id="sprinkles" name="sprinkles" value="sprinkles" <?php if(isset($_GET['sprinkles'])) echo "checked='checked'"; ?>>
            <label for="sprinkles"> Sprinkles </label> <br>
            
            <input type="checkbox" id="whipped" name="whipped" value="cream" <?php if(isset($_GET['whipped'])) echo "checked='checked'"; ?>>
            <label for="whipped"> Whipped Cream </label> <br>
            
            <br> 
            
            Do you like the base of the cake or the frosting? <br>
            <select id="base" name = "base">     
            <option value="">Select One</option>      
            <option value="base" <?=checkCategory('base')?>>I prefer the base of the cake!</option>      
            <option value="frosting" <?=checkCategory('frosting')?>>The frosting is definitely the best!</option>    
            </select>    <br /><br />
            
            
            <legend>If you could only choose one of these, what would it be?</legend>
            
            <input id= "reading" type="radio" name = "activity" value ="reading" <?=($_GET['activity'] == "reading") ? "checked":"" ?>>
            <label for="reading">Reading</label><br>
            
            <input id="lmusic" type="radio" name="activity" value="lmusic" <?=($_GET['activity'] == "lmusic") ? "checked":"" ?>>
            <label for="lmusic">Listening to Music</label><br>
            
            <input id="socialmedia" type="radio" name="activity" value="socialmedia" <?=($_GET['activity'] == "socialmedia") ? "checked":"" ?>>
            <label for="socialmedia">Social Media</label><br>
            
            <input id="videogames" type="radio" name="activity" value="videogames" <?=($_GET['activity'] == "videogames") ? "checked":"" ?>>
            <label for="videogames">Video Games</label><br>
            
            <input id="youtube" type="radio" name="activity" value="youtube" <?=($_GET['activity'] == "youtube") ? "checked":"" ?>>
            <label for="youtube">Youtube Videos</label><br>
            
            <br>
            
            <input type="submit" value="Submit!" onclick="displayData()"/>
         </form>
         
         <div>
             
             <h3>
                <?php
                 
                 if($index == 0) {
                     echo "<img src='img/basic.jpeg' alt='Basic Cake'>";
                     echo "You got Basic!";
                 }
                 if($index == 1) {
                     echo "<img src='img/chocolate.jpg' alt='Chocolate Cake'>";
                     echo "Chocolate Cake!";
                 }
                 if($index == 2) {
                     echo "<img src='img/icecreamcake.JPG' alt='Ice Cream Cake'>";
                     echo "You got Ice Cream Cake!";
                 }
                 if($index == 3) {
                     echo "<img src='img/redvelvetcake.jpg' alt='ily = i love yeri'>";
                     echo "You got Red Velvet Cake!";
                 }
                 if($index == 4) {
                     echo "<img src='img/funfetti.jpg' alt='Funfetti'>";
                     echo "You got Funfetti!";
                 }
                 if($index == 5) {
                     echo "Are you ready to know?";
                 }
                 
                 ?>
            </h3>
         </div>
    </body>
</html>