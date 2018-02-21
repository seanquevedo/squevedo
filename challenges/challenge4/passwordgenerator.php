<?php
    //session_start();
    
    
    function generatePassword() {
        //make the array of letters
        $limit = 0;
        $limitTwo = 0;
        
        $letters = [];
        for($k = 65; $k<= 90; $K++){
            $letters[$k - 65]=chr(k);
            
        }
        $digits = [];
        for($k = 0; $k <= 9; $k++){
            $digits[$k] = ($k); 
        }
        $passwordLength = rand(5,10);
        $result = "";
        
        for($k = 0; $k < $passwordLength; $k++) {
            //access a digit or a letter and add it to the result
            $letterOrDigit = rand(1,2);
            if(letterOrDigit == 1 || $limit < 1) {
                //spit out a letter
                $index = rand(0,25);
                $result = $result + $letters[$index];
                $limit++;
            } else if($limitTwo < 3){
                //spit out a digit
                $index = rand(0,9);
                $result = $result + $digits[$index];
                $limitTwo++;
            }
        }
        
        return $result;
    }
    
    
    function createTables(){
        for($i = 0; $i < 25; $i++){
            $newPassword = generatePassword();
            echo "<tr>$newPassword</tr>";
        }
    }
    
    
    
    //make sure it works
    //make sure theres at least one letter and 3 digits
    //store into table 
    
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Passwords </title>
        <meta charset = "utf-8"/>
    </head>
    <body>
        
        <table>
            <?php
                createTables();
            ?>
        </table>
    </body>
</html>