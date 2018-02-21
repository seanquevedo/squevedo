<?php
    
    $cards[] = "jack";
    array_push($cards, "queen", "king", "ace", "jack", "ten");
    
    $cards[2] = "ten";
    print_r($cards);
    echo "<hr>";
    $lastCard = array_pop($cards);
    displayCard($lastCard);
    echo "<hr>";
    print_r($cards);
    
    unset($cards[1]);
    echo "<hr>";
    print_r($cards);
    
    $cards = array_values($cards);
    echo "<hr>";
    print_r($cards);
    
    shuffle($cards);
    echo "<hr>";
    print_r($cards);
    echo "<hr>";
    
    $randomIndex = rand(0,count($cards) - 1);
    
    displayCard($cards[$randomIndex]);
    
    function displayCard($card) {
    
        //global $cards;

        echo "<img src = 'img/cards/clubs/$card.png' alt = '$card' width='100' />";
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
