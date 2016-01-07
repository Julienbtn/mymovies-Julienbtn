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
session_start();
$titre="Enregistrement";
include 'includes/en-tete.php';
echo '<p><i>Vous êtes ici</i> : <a href="./index.php">Index du forum</a> --> Enregistrement';
if ($id!=0) erreur(ERR_IS_CO);
if (empty($_POST['pseudo'])) // Si on la variable est vide, on peut considérer qu'on est sur la page de formulaire
    {
    echo 'Inscription';
    ?>
    <div class="jumbotron">
        <form method="post" action="addmovie.php" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
                <label for="titre" class="col-sm-2 control-label">Titre</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Pseudo" id="pseudo" required name="pseudo">
                </div>
            </div>
            <div class="form-group">
                <label for="descc" class="col-sm-2 control-label">Mail</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="mail" placeholder="Mail" required name="ail"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="descl" class="col-sm-2 control-label">Mot de Passe</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="mdp" placeholder="Mot de Passe" required name="mdp"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="affiche" class="col-sm-2 control-label">Affiche</label>
                <div class="col-sm-8">
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
                    <input type="file" id="affiche" name="affiche">
                </div>
            </div>
            <div class="col-sm-3">
            </div>
            <button type="submit" class="btn btn-default">Enregistrer</button>
        </form>
    </div>
    </div>

    } //Fin de la partie formulaire*
<?php
    
    else //On est dans le cas traitement
{
    $pseudo_erreur1 = NULL;
    $mdp_erreur = NULL;
    $email_erreur1 = NULL;

    //On récupère les variables
    $i = 0;
    $temps = time(); 
    $pseudo=$_POST['pseudo'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
	
    //Vérification du pseudo
    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE membre_pseudo =:pseudo');
    $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
    $query->execute();
    $pseudo_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();
    if(!$pseudo_free)
    {
        $pseudo_erreur1 = "Votre pseudo est déjà utilisé par un membre";
        $i++;
    }

    if (strlen($pseudo) < 3 || strlen($pseudo) > 15)
    {
        $pseudo_erreur2 = "Votre pseudo est soit trop grand, soit trop petit";
        $i++;
    }

    //Vérification du mdp
    if ($pass != $confirm || empty($confirm) || empty($pass))
    {
        $mdp_erreur = "Votre mot de passe et votre confirmation diffèrent, ou sont vides";
        $i++;
    }

$query=$db->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE membre_pseudo =:pseudo');
$query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
$query->execute();
$pseudo_free=($query->fetchColumn()==0)?1:0;
?>
            <?php
    //Vérification de l'adresse email

    //Il faut que l'adresse email n'ait jamais été utilisée
    $query=$db->prepare('SELECT COUNT(*) AS nbr FROM forum_membres WHERE membre_email =:mail');
    $query->bindValue(':mail',$email, PDO::PARAM_STR);
    $query->execute();
    $mail_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();
    
    if(!$mail_free)
    {
        $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
        $i++;
    }
    //On vérifie la forme maintenant
    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
    {
        $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
        $i++;
    }
    //Vérification de l'adresse MSN
    if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $msn) && !empty($msn))
    {
        $msn_erreur = "Votre adresse MSN n'a pas un format valide";
        $i++;
    }
    //Vérification de la signature
    if (strlen($signature) > 200)
    {
        $signature_erreur = "Votre signature est trop longue";
        $i++;
    }
?>
                <?php
   if ($i==0)
   {
	echo'<h1>Inscription terminée</h1>';
        echo'<p>Bienvenue '.stripslashes(htmlspecialchars($_POST['pseudo'])).' vous êtes maintenant inscrit sur le forum</p>
	<p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d accueil</p>';
	
        //La ligne suivante sera commentée plus bas
	$nomavatar=(!empty($_FILES['avatar']['size']))?move_avatar($_FILES['avatar']):''; 
   
        $query=$db->prepare('INSERT INTO forum_membres (membre_pseudo, membre_mdp, membre_email,             
        membre_msn, membre_siteweb, membre_avatar,
        membre_signature, membre_localisation, membre_inscrit,   
        membre_derniere_visite)
        VALUES (:pseudo, :pass, :email, :msn, :website, :nomavatar, :signature, :localisation, :temps, :temps)');
	$query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
	$query->bindValue(':pass', $pass, PDO::PARAM_INT);
	$query->bindValue(':email', $email, PDO::PARAM_STR);
	$query->bindValue(':msn', $msn, PDO::PARAM_STR);
	$query->bindValue(':website', $website, PDO::PARAM_STR);
	$query->bindValue(':nomavatar', $nomavatar, PDO::PARAM_STR);
	$query->bindValue(':signature', $signature, PDO::PARAM_STR);
	$query->bindValue(':localisation', $localisation, PDO::PARAM_STR);
	$query->bindValue(':temps', $temps, PDO::PARAM_INT);
        $query->execute();

	//Et on définit les variables de sessions
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['id'] = $db->lastInsertId(); ;
        $_SESSION['level'] = 2;
        $query->CloseCursor();
    }
    else
    {
        echo'<h1>Inscription interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        echo'<p>'.$email_erreur1.'</p>';
        echo'<p>'.$email_erreur2.'</p>';
        echo'<p>'.$msn_erreur.'</p>';
        echo'<p>'.$signature_erreur.'</p>';
        echo'<p>'.$avatar_erreur.'</p>';
        echo'<p>'.$avatar_erreur1.'</p>';
        echo'<p>'.$avatar_erreur2.'</p>';
        echo'<p>'.$avatar_erreur3.'</p>';
       
        echo'<p>Cliquez <a href="./register.php">ici</a> pour recommencer</p>';
    }
}
?>
                    </div>
                    </body>

</html>