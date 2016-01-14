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
    <title>Inscription</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/films.ico" />
</head>

<?php
            include 'includes/en-tete.php';
        ?>


    <?php 
            if (isset($_POST['login']))
            {
                include 'includes/fonctions.php';
                
                $login = $_POST['login'];
                $mdp = $_POST['pass'];
                
                ajoutMembre($login, $mdp);
                echo "Le membre $login a été ajouté avec succès.";
				echo "<br/>";    
            } 
    ?>

        <body>
            <h1>Inscription à l'espace membre :</h1>
            <div class="jumbotron">
                <form method="post" action="inscription.php" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="login" class="col-sm-3 control-label">Login</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="login" placeholder="Login" required name="login">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="pass" class="col-sm-3 control-label">Mot de Passe</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="pass" placeholder="pass" required name="pass">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="pass_confirm" class="col-sm-3 control-label">Confirmation du mot de passe</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" id="pass_confirm" placeholder="pass_confirm" required name="pass_confirm">
                            </div>
                    </div>
                    <div class="col-sm-6">
                    </div>
                    <input type="submit" name="inscription" value="Inscription">
                </form>
            </div>
            <?php
if (isset($erreur)) echo '<br />',$erreur;
?>

                <?php
            include 'includes/footer.php';
        ?>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        </body>

</html>