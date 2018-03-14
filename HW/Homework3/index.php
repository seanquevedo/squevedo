<?php 
    if ( isset($_GET["fullName"])) {
        echo 'hello there';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> What kind of cake are you? </title>
    </head>
    <body>
        <h1> What kind of cake are you? </h1>
        <form method = "GET">
            Please enter your name: <input type="text" size="20" name="keyword" placeholder="Insert Full Name" value = "<?=$_GET['keyword']?>"/>
            
            <br>
            
            Choose your favorite color: <input type="color" value="#c04019">
            
            <br> <br>
            
            <legend>What kind of music do you like?</legend>
            <input id="top" type="radio" name="music" value="top">
            <label for="top">Top 40</label><br>
            
            <input id="hiphop" type="radio" name="music" value="hiphop">
            <label for="hiphop">Hip Hop/Rap</label><br>
            
            <input id="edm" type="radio" name="music" value="edm">
            <label for="edm">EDM</label><br>
            
            <input id="rock" type="radio" name="music" value="rock">
            <label for="rock">Rock</label> <br>
            
            <input id="kpop" type="radio" name="music" value="kpop">
            <label for="kpop">K-Pop</label> <br>
                
            <br> <br>
            
            Check your favorite toppings: <br>    
            <input type="checkbox" id="basic"  name="toppings" value="basic">
            <label for="basic"> None, I'm basic </label> <br>
            
            <input type="checkbox" id="buttercream"  name="toppings" value="buttercream">
            <label for="buttercream"> Buttercream </label> <br> 
            
            <input type="checkbox" id="chocolate"  name="toppings" value="fudge">
            <label for="chocolate"> Chocolate Fudge </label> <br> 
            
            <input type="checkbox" id="fruit"  name="toppings" value="fruit">
            <label for="fruit"> Fruit </label> <br>  
            
            <input type="checkbox" id="icecream"  name="toppings" value="icecream">
            <label for="icecream"> Ice Cream </label> <br>
            
            <input type="checkbox" id="sprinkles" name="toppings" value="sprinkles">
            <label for="sprinkles"> Sprinkles </label> <br>
            
            <input type="checkbox" id="whipped" name="toppings" value="cream">
            <label for="whipped"> Whipped Cream </label> <br>
            
            <br> 
            
            Do you like the base of the cake or the frosting? <br>
            <select id="base">     
            <option value="base">I prefer the base of the cake!</option>      
            <option value="frosting">The frosting is definitely the best!</option>    
            </select>    <br /><br />
            
            
            <legend>If you could only choose one of these, what would it be?</legend>
            
            <input id= "reading" type="radio" name = "activity" value ="reading">
            <label for="reading">Reading</label><br>
            
            <input id="lmusic" type="radio" name="activity" value="lmusic">
            <label for="lmusic">Listening to Music</label><br>
            
            <input id="socialmedia" type="radio" name="activity" value="socialmedia">
            <label for="socialmedia">Social Media</label><br>
            
            <input id="videogames" type="radio" name="activity" value="videogames">
            <label for="videogames">Video Games</label><br>
            
            <input id="youtube" type="radio" name="activity" value="youtube">
            <label for="youtube">Youtube Videos</label><br>
            
            <br>
            
            <input type="submit" value="Submit!" onclick="displayData()"/>
         </form>
    </body>
</html>