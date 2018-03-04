<!DOCTYPE html>
<html>
   <head>
        <title> SilverJack </title>
    </head>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">
    </head>
    <style> 
        @import url(css/styles.css);
    </style>
    <body>
        <?php 
            include 'functions.php';
            play();
        ?>
        <div>
             
          <h1 id="seconds"> Total Seconds =  <?= displayElapsedTime(); ?></h1> 
          <h1 id="seconds"> Average time per play =  <?= ($_SESSION['totalTime']/$_SESSION['totalGames'])  ?> secs</h1> 
          <h1 id="games"> Numbers of games play = <?= $_SESSION['totalGames'] ?></h1> 
            <form>
         <input type="submit" value="Play" DOCTYPE/>
     </form>
        </div>
        <footer id="footer">
            <hr>
             CST336 Internet Programming. 2018 &copy <br />
            <strong> Disclaimer: </strong>
            The information in this website is fictitous. It's used for academic purposes.
            <a href="http://csumb.edu">CSUMB</a>
            <figure>
                <img src="img/Monterey.jpg" alt="School Logo" height="100" width="150" />
            </figure>
            </hr>
        </footer>
    </body>
</html>
