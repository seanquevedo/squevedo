<?php
include 'inc/functions.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Chord Generator </title>
        <meta charset="utf-8" />
        <style>
            footer {
                color:white;
            }
            body {
                /*background-color: black;*/
                background-image:url("img/rock_background.jpg");
            	background-size: 100% 100%;
                background-attachment: fixed;
                /*color: white;*/
            }
            ul {
                text-align:right;
                color: #ffe6e6;
            }
            p {
                text-align:right;
                color: yellow;
            }
            html, body {
                height: 100%;
            }
            
            #pattern {
                color:#ffff1a;
            }
            
            #arrows {
                height:7%;
                width: 50px;
            }
            #position1, #position2, #position3, #position0 {
                height: 12%;
            }
            body {
                padding: 150px;
                margin:0 auto;
                text-align:center;
            }
            #welcome {
                font-size: 2em;
                color:#cc0000;
                text-align:center;
            }
        </style>
    </head>
    <body>
            <h1>Chord Progression Generator</h1>
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