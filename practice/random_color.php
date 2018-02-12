<?php
    function getRandomColor() {
        echo "rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Random Color</title>
        
        <style>
        
        
            body {
                <?php
                    $red = rand(0,255);
                    $green = rand(0,255);
                    $blue = rand(0,255);
                    $alpha = rand(0,100) / 100;
                    // echo "background-color: rgba($red, 20,250, .5);";
                    // echo "background-color: rgba($red, $green, $blue, $alpha);";
                    background-color: <?= getRandomColor() ?>
                    color: <?= getRandomColor() ?>
                ?>
                /*background-color:rgba(20,120,100,.7);*/
            }
            
            h2 {
                color: <?php getRandomColor() ?>;
                background-color: <?php getRandomColor() ?>;
            }
            
            
        </style>
    </head>
    <body>
        <h1> Welcome! </h1>
        
        <h2> Random Background Color! </h2>
    </body>
</html>