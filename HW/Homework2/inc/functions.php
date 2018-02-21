<?php
    function compare($word1, $word2) {
        if($word1 == $word2) {
            return true;
        }
        return false;
    }
    
    function displayStrumming($beats) {
        $result = "";
        for($k = 0; $k < $beats; ++$k) {
            $val = rand(0,1);
            $result .= ($val == 0) ? "D" : "U";
        }
        
        for($k = 0; $k < strlen($result); ++$k) {
            if(compare($result[$k], 'D')) {
                echo "<img id = 'arrows' src = 'img/down.png' alt= 'Strum Down' title='". ucfirst('up') . "' width='70' />";
            } else {
                echo "<img id = 'arrows' src = 'img/up.png' alt= 'Strum Up' title='". ucfirst('up') . "' width='70' />";
            }
        }
        
        echo "<h1 id = 'pattern'>Strumming Pattern: $result</h1>";
        
    }
    
    function displayChord($randomValue, $pos) {
        $chords = ["a","aminor","c","d","dminor","e","eminor","f"];
        array_push($chords, "g");
        
        switch($randomValue) {
            case 0: $chord = $chords[0];
                    break;
            case 1: $chord = $chords[1];
                    break;
            case 2: $chord = $chords[2];
                    break;
            case 3: $chord = $chords[3];
                    break;
            case 4: $chord = $chords[4];
                    break;
            case 5: $chord = $chords[5];
                    break;
            case 6: $chord = $chords[6];
                    break;
            case 7: $chord = $chords[7];
                    break;
            case 8: $chord = $chords[8];
                    break;
        }
        echo "<img id = 'position$pos' src = 'img/$chord.png' alt= '$chord Chord' title='". ucfirst($chord) . "' width='70' />";
    }
    
    function pickFourChords() {
        $chords = ["a","aminor","c","d","dminor","e","eminor","f","g"];
        $used = [];
        for($k = 0; $k < 4; $k += 1) {     //0-1 2-3 4-5 6-8
            $val = rand(0,count($chords) - 1);
            if(in_array($val, $used, FALSE)) {
                $val = rand(0,count($chords) - 1);
            }
            
            displayChord($val, $k);
            $used[$k] = $val;
        }
    }
?>