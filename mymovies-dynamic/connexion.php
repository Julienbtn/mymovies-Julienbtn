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
    
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

	$base = mysql_connect ('serveur', 'login', 'password');
	mysql_select_db ('nom_base', $base);

	// on teste si une entrée de la base contient ce couple login / pass
	$sql = 'SELECT count(*) FROM membre WHERE login="'.mysql_escape_string($_POST['login']).'" AND pass_md5="'.mysql_escape_string(md5($_POST['pass'])).'"';
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	$data = mysql_fetch_array($req);

	mysql_free_result($req);
	mysql_close();

	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: membre.php');
		exit();
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($data[0] == 0) {
		$erreur = 'Compte non reconnu.';
	}
	// sinon, alors la, il y a un gros problème :)
	else {
		$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>

    <body>
        <h1> Connexion à l'espace membre : </h1>
        <div class="jumbotron">
            <form method="post" action="connexion.php" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <label for="real" class="col-sm-3 control-label">Login</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="login" placeholder="Login" required name="login">
                    </div>
                </div>
                <div class="form-group">
                    <label for="real" class="col-sm-3 control-label">Mot de Passe</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="pass" placeholder="Mot de Passe" required name="pass">
                    </div>
                </div>
                <div class="col-sm-5">
                </div>
                <input type="submit" name="connexion" value="Connexion">
                <a href="inscription.php">Vous inscrire</a>
            </form>
        </div>

        <?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
            <?php
            include 'includes/footer.php';
        ?>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    </body>


</html>