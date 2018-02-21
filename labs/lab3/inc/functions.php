<?php
    
    function getHand($shuffledDeck)
    {
        // $players = array(array("p1", 0, 0, 0, 0, 0, 0), array("p2", 0, 0, 0, 0, 0, 0), array("p3", 0, 0, 0, 0, 0, 0), array("p4", 0, 0, 0, 0, 0, 0));
        // $round = 1;
        // do
        // {
        //     for($i = 1; $i <= 4; $i++)
        //     {
        //         $lastCard = array_pop($shuffledDeck);
        //         $players[$i][$round] = $lastCard;
        //     }
        //     $round++;
        // }
        // while($round <= 6);
        // displayHands($players);
        $player1 = [];
        $player2 = [];
        $player3 = [];
        $player4 = [];
        $player1sum = 0;
        $player2sum = 0;
        $player3sum = 0;
        $player4sum = 0;
        while($player1sum < 42) {
            $lastCard = array_pop($shuffledDeck);
            array_push($player1, $lastCard);
            if(count($lastCard) == 4) {
                $player1sum += (int)substr($lastCard, 2,3);
            } else {
                $player1sum += (int)substr($lastCard, 2,2);
            }
        }
        while($player2sum < 42) {
            $lastCard = array_pop($shuffledDeck);
            array_push($player2, $lastCard);
            if(count($lastCard) == 4) {
                $player2sum += (int)substr($lastCard, 2,3);
            } else {
                $player2sum += (int)substr($lastCard, 2,2);
            }
        }
        while($player3sum < 42) {
            $lastCard = array_pop($shuffledDeck);
            array_push($player3, $lastCard);
            if(count($lastCard) == 4) {
                $player3sum += (int)substr($lastCard, 2,3);
            } else {
                $player3sum += (int)substr($lastCard, 2,2);
            }
        }
        while($player4sum < 42) {
            $lastCard = array_pop($shuffledDeck);
            array_push($player4, $lastCard);
            if(count($lastCard) == 4) {
                $player4sum += (int)substr($lastCard, 2,3);
            } else {
                $player4sum += (int)substr($lastCard, 2,2);
            }
        }
        displayHand($player1);
        displayHand($player2);
        displayHand($player3);
        displayHand($player4);
        
    }
?>
