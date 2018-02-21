<?php
    session_start();   //starts or resumes a session
    
    // print_r($_SESSION);   //print_r prints an array
                            //really good for debugging all sessions
                            //use sessions to store how many times this game has been played
                            //use sessions to keep track of the elapsed time
                            //use sessions to keep track or average elapsed time

?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h2>My favorite class is <?=$_SESSION['course']?></h2>
    </body>
</html>