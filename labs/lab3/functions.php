<?php
    function play()
    {
        $deck = array(); // CREATES DECK
        for($i=0; $i<=3; $i++)
        {
            for($j=1; $j<=13; $j++)
            {
                array_push($deck, $i."/".$j); // STORES IN ARRAY AS "SUIT/CARD" ex. "0/1"
            }
        }
        shuffle($deck); // SHUFFLES DECK
        getHand($deck);
    }
    function getHand($shuffledDeck)
    {
        $players = array(array("p1", 0, 0, 0, 0, 0, 0), array("p2", 0, 0, 0, 0, 0, 0), array("p3", 0, 0, 0, 0, 0, 0), array("p4", 0, 0, 0, 0, 0, 0));
        $round = 1;
        do
        {
            for($i = 1; $i <= 4; $i++)
            {
                $lastCard = array_pop($shuffledDeck);
                $players[$i][$round] = $lastCard;
            }
            $round++;
        }
        while($round <= 6);
        echo "<div id='main'>";     //  MAIN DIV
            displayHands($players);
        echo "</div>"; 
    }
    function displayHands($game)
    {
        echo "<div id='charactersAndCards'>";     //  DIV FOR THE CHARACTERS & CARDS
        $player = 1;
        do
        {
            $sum = 0;
            displayPlayer($player);         //  FUNCTION TO DISPLAY CHARACTER IMAGES
            for($i = 1; $i <= 6; $i++)
            {
                $sum += displayCard($game[$player][$i]);
            }
            echo "<br>";
            displayNameScore($player, $sum);
            $player++;
        }
        while($player <= 4);
        
        echo "</div>";
    }
    function displayCard($card){
        echo "<img src='../lab3/cards/$card.png'>"; 
        list($suit, $value) = split('[/.-]', $card);
        if($value >= 10) {
            return 10;
        }
        return $value;
    }
    function displayPlayer($player){    // DISPLAYS CHARACTER IMAGE
        $character; 
        
        
        
        switch($player){
            case 1: $character = "BB8";
                    break; 
            case 2: $character = "Finn";
                    break; 
            case 3: $character = "Kylo";
                    break;
            case 4: $character = "Poe";
                    break; 
        }
        echo "<img src=' img/$character.png'>"; 
        echo "&emsp;&emsp;&emsp;"; 
    }
    function displayNameScore($player, $score){
        $character; 
        switch($player){
            case 1: $character = "BB8";
                    break; 
            case 2: $character = "Finn";
                    break; 
            case 3: $character = "Kylo";
                    break;
            case 4: $character = "Poe";
                    break; 
        }
        echo "<h5>" . $character . ": ". $score . "</h5>";
        // echo "<h5>" . $score . "</h5>";
        echo "<br />"; 
    }
?>