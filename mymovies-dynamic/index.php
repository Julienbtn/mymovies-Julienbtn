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

            <?php
            include 'includes/en-tete.php';
        ?>

                <div class="container">
                    <h1>Mes films</h1>
                    </br>
                    <?php
                    foreach(connectionbd()->query('SELECT mov_id, mov_title, mov_description_short from movie order by mov_year DESC') as $row) {
                        $row[0]=escape($row[0]);
						$row[1]=escape($row[1]);
						$row[2]=escape($row[2]);
						echo "<div class='jumbotron'>";
                        echo "<div class='container'>";
                        echo "<h3><a href='movie.php?film=$row[0]'>$row[1]</a></h3>";
                        echo "<p>$row[2]</p>";
                    echo "</div>";
                echo "</div>";
                }
                ?>

                        <?php     
    include 'includes/footer.php';
    ?>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                            <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>