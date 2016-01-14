<?php
session_start();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>MyMovies</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/films.ico" />
</head>

<body>
    <?php
            include 'includes/fonctions.php';
        ?>
        <!-- BARRE NAVIGATION !!! -->
        <?php
            include 'includes/en-tete.php';
        ?>
            <!-- CONTENU -->
            <div class="container">
                <?php
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=mymovies;charset=utf8', 'mymovies_user', 'secret');
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
                ?>

                    <h1>Mes films</h1>
                    </br>
                    <?php
                    foreach(connectionbd()->query('SELECT mov_id, mov_title, mov_description_short from movie order by mov_year DESC') as $row) {
                        echo "<div class='jumbotron'>";
                        echo "<div class='container'>";
                        echo "<h2><a href='movie.php?film=$row[0]'>$row[1]</a></h2>";
                        echo "<p>$row[2]</p>";
                    echo "</div>";
                echo "</div>";
                }
                ?>

                        <!-- FOOTER !!! -->
                        <?php
            include 'includes/footer.php';
        ?>

                            
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>            
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>