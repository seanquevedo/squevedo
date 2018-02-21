<?php
include 'inc/functions.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Chord Generator </title>
        <meta charset="utf-8" />
        <style>
            @import url("css/styles.css");
        </style>
        <style>
            
        </style>
    </head>
    <body>
            <h1 id = "ma">Chord Progression Generator</h1>
            <p id = "welcome"> Hello! Try out these chords with the given strum pattern. If you don't like it, generate another!</p>
            <br/> 
            <form>
                <input type="submit" value="New Progression!"/>
            </form>
            <?php
                pickFourChords();
                echo "<br/>";
                displayStrumming(4);
            ?>
            <h2><ul>KEY:</ul></h2>
            <p>D - Downstrum</p>
            <p>U - Upstrum</p>
            
            <!-- This is the footer -->
        <!-- The footer goes inside the body but not always -->
        <footer>
            <hr>
             Internet Programming. 2018&copy; Quevedo <br />
             <strong>Disclaimer:</strong> The information in this webpage is fictitious. <br />
             It is used for academic purposes only.
             <br /> <br />
             <img src = "img/csumb_logo.jpg" alt="CSUMB logo" />
             <!--<figure id ="buddy">-->
             <!--  <img src = "img/buddy_verified.png" alt="Buddy system sticker" />-->
             <!--</figure>-->
        </footer>
        <!-- closing footer -->
    </body>
</html>