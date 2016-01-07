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
    <?php
            include 'includes/fonctions.php';
        ?>
        <?php
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=mymovies;charset=utf8', 'mymovies_user', 'secret');
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    ?>
            <?php
    

// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
	// on teste les deux mots de passe
	if ($_POST['pass'] != $_POST['pass_confirm']) {
		$erreur = 'Les 2 mots de passe sont différents.';
	}
	else {
		mysqli_select_db ($bdd,'mymovies');

		// on recherche si ce login est déjà utilisé par un autre membre
		$sql = '"SELECT count(*) FROM membre WHERE login="'.mysql_real_escape_string($_POST['login']).'"';
		$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		$data = mysql_fetch_array($req);

		if ($data[0] == 0) {
		$sql = 'INSERT INTO membre VALUES("", "'.mysql_escape_string($_POST['login']).'", "'.mysql_escape_string(md5($_POST['pass'])).'")';
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: membre.php');
		exit();
		}
		else {
		$erreur = 'Un membre possède déjà ce login.';
		}
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>
                <body>
                    <h1>Inscription à l'espace membre :</h1>
                    <div class="jumbotron">
                        <form method="post" action="inscription.php" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <label for="real" class="col-sm-3 control-label">Login</label>
                                <?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="login" placeholder="Login" required name="login">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="real" class="col-sm-3 control-label">Mot de Passe</label>
                                <?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="pass" placeholder="pass" required name="pass">
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="real" class="col-sm-3 control-label">Confirmation du mot de passe</label>
                                <?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>
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