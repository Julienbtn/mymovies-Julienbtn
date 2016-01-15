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
        <title>Connection</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/films.ico" />
    </head>

    <body>

        <?php  
        include 'includes/en-tete.php';       
        // on teste si le visiteur a soumis le formulaire de connexion
        if (isset($_POST['login']))        
        {
                
            include 'includes/fonctions.php';
            $bdd=connectionbd();
            $login = $_POST['login'];       
            {
                // on teste si une entrée de la base contient ce login 
                $stmtClient = $bdd->prepare("SELECT login FROM membre WHERE login=?");
                $stmtClient->execute(array($login));
                // si on obtient une réponse, alors l'utilisateur est un membre
                if ($stmtClient->rowCount() == 1) {
                    $authOK = true;
                    $_SESSION['login'] = $login;
                }
                // si on ne trouve aucune réponse, le visiteur s'est trompé dans son login
            
                else 
                {
                    $erreur = 'Compte non reconnu.';
                }
            } 
        }      
    
        if (isset($msgErreur)) {       
            echo "Erreur : $msgErreur";   
        }
    
        if (isset($_SESSION['login'])) {
            echo "Connecté en tant que, '$login'";
        }    
        else {
            echo "Hors ligne"; 
        }
            
        ?>


            <h1> Connection à l'espace membre : </h1>
            <div class="jumbotron">
                <form method="post" action="connection.php" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="real" class="col-sm-3 control-label">Login</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="login" placeholder="Login" required name="login">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real" class="col-sm-3 control-label">Mot de Passe</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="pass" placeholder="Mot de Passe" required name="pass">
                        </div>
                    </div>
                    <div class="col-sm-5">
                    </div>
                    <input type="submit" name="connection" value="Connection">
                    <a href="inscription.php">Vous inscrire</a>
                </form>
            </div>
        <?php
    
        if (isset($erreur)) echo '<br /><br />',$erreur;    
        include 'includes/footer.php'; 
        
        ?>
               
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>       
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    
        </body>
</html>