<?php
session_start();
  if(!isset($_SESSION['totalGames']))
  {//checks if session exists 
  $_SESSION['totalGames'] = 0;
  $_SESSION['totalTime'] = 0;
  }
    function play()
    {
        $_SESSION['totalGames']++;
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
        //displayElapsedTime();
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
        echo "<img id='icon1' src=' img/icon1.png'>";
        echo "<img id='icon2' src=' img/icon2.png'>";
        echo "<h1>STAR WARS SILVERJACK</h1>";
        
            displayHands($players);
            //displayElapsedTime();
        echo "</div>"; 
    }
    function displayHands($game)
    {
        echo "<div id='charactersAndCards'>";     //  DIV FOR THE CHARACTERS & CARDS
        $score; 
        $player = 1;
        $orderArray = array(1, 2, 3, 4);    //   ARRAY TO CHANGE ORDER OF PLAYERS
        $orderIndex = 0;    //  TO MOVE THROUGH THE orderArray ARRAY
        shuffle($orderArray); 
        $charOrder = array(); 
        $charIndex = 0; 
        do
        {
            $sum = 0;
            //displayPlayer($orderArray[$orderIndex]);         //  FUNCTION TO DISPLAY CHARACTER IMAGES
            
        //  \/ \/ \/ \/ COPIED THE CODE FROM displayPlayer FUNCTION HERE \/ \/ \/ \/
            $character; 
            switch($orderArray[$orderIndex]){
                case 1: $character = "BB8";
                        $charOrder[$charIndex] = "BB8"; 
                        break; 
                case 2: $character = "Finn";
                        $charOrder[$charIndex] = "Finn";
                        break; 
                case 3: $character = "Kylo";
                        $charOrder[$charIndex] = "Kylo";
                        break;
                case 4: $character = "Poe";
                        $charOrder[$charIndex] = "Poe";
                        break; 
            }
            echo "<img src=' img/$character.png'>"; 
            echo "&emsp;&emsp;&emsp;";
        //  /\ /\ /\ /\  COPIED THE CODE FROM displayPlayer FUNCTION HERE /\ /\ /\ /\
            for($i = 1; $i <= 6; $i++)
            {
                $sum += displayCard($game[$player][$i]);
            }
            // echo "<br>";
            $score[$player-1] = $sum; 
            displayNameScore($orderArray[$orderIndex], $sum);
            $orderIndex++;
            $charIndex++; 
            $player++;
        }
        while($player <= 4);
        displayWinner($score, $charOrder);
       //displayElapsedTime();
        echo "</div>";
    }
    
    function displayWinner($score, $charOrder){
        
        $scoresCopy = $score;   //  MAKES A COPY OF THE score ARRAY
        $twoWinners = 0;        //  CHECKS FOR TWO WINNERS
        $winnersPoints = 0;     //  WILL SUBTRACT FROM $sumOfScores

        
        for($i = 0; $i < 4; $i++){      
            if($scoresCopy[$i] > 42){
                unset($scoresCopy[$i]);     //  REMOVES SCORE ELEMENT FROM $scoresCopy IF THEY ARE LARGER THAN 42
                unset($charOrder[$i]);      //  REMOVES CHARACTER ELEMENT FROM $charOrder IF THEY ARE LARGER THAN 42
            }
        }
        $scoresCopy = array_values($scoresCopy);    //  REINDEXES THE $scoresCopy ARRAY, NOW WITHOUT THE SCORES OVER 42
        $charOrder = array_values($charOrder);      //  REINDEXES THE $charOrder ARRAY, NOW WITHOUT THE CHARACTER'S WHOSE SCORE IS OVER 42
        
        $winnerScore = max($scoresCopy);            //  GETS THE HIGHEST SCORE FROM THE $scoresCopy, NOW 42 OR LESS 

        $winnerIndex = array_search($winnerScore, $scoresCopy);     //  SEARCHES THE $scoresCopy ARRAY FOR THE $winnerScore
        $winnersPoints += $scoresCopy[$winnerIndex];                //  ADDS THE WINNER'S SCORE TO $winnersPoints (TO SUBTRACT LATER FROM $sumOfScores)
        unset($scoresCopy[$winnerIndex]);                           //  REMOVES THE FIRST WINNER FROM THE $scoresCopy
        $winner2Index = array_search($winnerScore, $scoresCopy);    //  CHECKS IF THEIR IS A SECOND WINNER. 
        
        if($winner2Index != NULL){      // IF THEIR IS A SECOND WINNER IT ADDS THE WINNER'S SCORE TO $winnersPoints (TO SUBTRACT LATER FROM $sumOfScores) 
           $twoWinners++;
           $winnersPoints += $scoresCopy[$winner2Index]; 
        }
    
        
        $sumOfScores = 0;       
        for($i = 0; $i < 4; $i++){      //  ADDS ALL SCORES TOGETHER
            $sumOfScores += $score[$i]; 
        }
        $sumOfScores -= $winnersPoints; //  SUBTRACTS THE WINNER(S) SCORE(S) FROM THE SUM OF SCORES
        if($twoWinners > 0){            //  IF / ELSE TO PRINT TWO WINNERS OR ONE 
            echo "<h1>" . $charOrder[$winnerIndex] . " Wins " . $sumOfScores . "</h1>";
            echo "<h1>" . $charOrder[$winner2Index] . " Wins " . $sumOfScores . "</h1>";
            
        }else{
            echo "<h1>" . $charOrder[$winnerIndex] . " Wins " . $sumOfScores . "</h1>";
        }
    }
    function displayCard($card){
        echo "<img src='../cards/$card.png'>"; 
        list($suit, $value) = split('[/.-]', $card);
        if($value >= 10) {
            return 10;
        }
        return $value;
    }
    function displayPlayer($player){    // DISPLAYS CHARACTER IMAGE
        // $character; 
        // switch($player){
        //     case 1: $character = "BB8";
        //             break; 
        //     case 2: $character = "Finn";
        //             break; 
        //     case 3: $character = "Kylo";
        //             break;
        //     case 4: $character = "Poe";
        //             break; 
        // }
        // echo "<img src=' img/$character.png'>"; 
        // echo "&emsp;&emsp;&emsp;"; 
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
    
$start = microtime(true);
function displayElapsedTime() {
  global $start;
    $elapsedSecs = microtime(true) - $start;
    $_SESSION['totalTime'] += $elapsedSecs;
    echo $elapsedSecs . " seconds ";
    //$_SESSION['timeElapsed'] += $elpasedSecs;
}

?>
