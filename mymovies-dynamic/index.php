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
        include("./includes/en-tete.php");
        include('./includes/functions.php');

        $bd = connectionbd();

        foreach($bd->query('SELECT mov_id, mov_name, mov_description_short from movie') as $row) {
            echo "<div class='film'>
                    <div class='container'>
                        <h2><a href='#'>$row[1]</a></h2>
                        <p>$row[2]</p>
                    </div>
                </div>";
        }

    ?>
    
	<footer>
	<?php include("includes/footer.php"); ?>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>