<?php

    function displaySymbol($randomValue, $pos) {
            // if($randomValue == 0) {
            //     echo '<img src = "img/seven.png" alt= "issa seven" title = "Seven" width="70" />';
            // }else if($randomValue == 1) {
            //     echo '<img src = "img/cherry.png" alt= "issa cherry" title = "Cherry" width="70" />';
            // }else {
            //     echo '<img src = "img/lemon.png" alt= "issa lemon" title = "Lemon" width="70" />';
            // }
            
            switch($randomValue) {
                case 0: $symbol = "seven";
                        break;
                case 1: $symbol = "cherry";
                        break;
                case 2: $symbol = "lemon";
                        break;
                case 3: $symbol = "grapes";
                        break;
                case 4: $symbol = "orange";
                        break;
                case 5: $symbol = "bar";
                        break;
            }
            
            echo "<img id = 'reel$pos' src = 'img/$symbol.png' alt= 'issa $symbol' title='". ucfirst($symbol) . "' width='70' />";
        }
        
    function displayPoints($randomValue1, $randomValue2, $randomValue3) {
        echo "<div id='output'";
           if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
               switch($randomValue1) {
                   case 0: $totalPoints = 1000;
                        echo "<h1>Jackpot!!</h1>";
                        break;
                    case 1: $totalPoints = 500;
                            break;
                    case 2: $totalPoints = 250;
                            break;
                    case 3: $totalPoints = 900;
                            //jackpot sound effect here
                            break;
                    case 4: $totalPoints = 750;
                            break;
                    case 5: $totalPoints = 250;
                            break;
            }
            
            echo "<h2>You won $totalPoints points!</h2>";
        } else {
            echo "<h3> Try Again mate </h3>";
            
        }
        echo "</div>";
        }
        
    function play() {
        for($i=1; $i<4; $i++) {
            ${"randomValue" . $i } = rand(0,5);
            displaySymbol(${"randomValue". $i}, $i);
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
    }

?>