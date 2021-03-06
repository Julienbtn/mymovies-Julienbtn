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

    <?php
            include 'includes/en-tete.php';
        ?>

        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <?php
						include 'includes/fonctions.php';
                        $req = connectionbd()->prepare("SELECT mov_title, mov_description_long, mov_image, mov_director, mov_year from movie where mov_id=?;");
						$req->execute(array($_GET['film']));
						$donnees = $req->fetchAll();
						foreach($donnees as $row) {
							$row[0]=escape($row[0]);
							$row[1]=escape($row[1]);
							$row[2]=escape($row[2]);
							$row[3]=escape($row[3]);
							$row[4]=escape($row[4]);
							echo "<div class='col-md-4'>";
                            echo "<div class='thumbnail'>";
                              echo "<img src='$row[2]'>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='col-md-8'>";
                            echo "<h2>$row[0]</h2>";
							echo "<p>$row[3], $row[4]</p>";
                            echo "<p>$row[1]</p>";
                            echo "<a href='edit.php?film=$_GET[film]'><button type='button' class='btn btn-default'>Editer</button></a>";
                        echo "</div>";
                        }
                        ?>
                </div>
            </div>
            </br>
        </div>

        <?php
            include 'includes/footer.php';
        ?>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="lib/bootstrap/js/bootstrap.min.js"></script>
            </body>

    </html>