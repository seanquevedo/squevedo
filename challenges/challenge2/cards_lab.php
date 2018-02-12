<?php
    
    $cards[] = "jack";
    array_push($cards, "queen", "king");
    
    $cards[2] = "ten";
    
    displayCard();
    
    function displayCard() {
    
        global $cards;

        echo "<img src = 'img/cards/clubs/$cards[2].png' alt = '$card' width='100' />";
    }
    
    
    
?>


<!DOCTYPE HTML>
<html>
    <head>
        <meta charset= "utf-8" />
        
    </head>
    <body>
        
    </body>
</html>
