<?php
    function connectionbd()
    {
     $bdd =new PDO('mysql:host=localhost;dbname=mymovies', 'mymovies_user', 'secret', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $bdd;
    }

    function ajoutfilm($titre, $desc1, $desc2, $real, $annee, $img)
    {
		$titre = str_replace("'", "\'",$titre);
		$desc1 = str_replace("'", "\'",$desc1);
		$desc2 = str_replace("'", "\'",$desc2);
		$real = str_replace("'", "\'",$real);
		$img = str_replace("'", "\'",$img);
        connectionbd()->query("INSERT INTO movie values ('','$titre', '$desc1', '$desc2', '$real', $annee, '$img');");
    }
	
	function editfilm($id, $titre, $desc1, $desc2, $real, $annee, $img)
    {
		$titre = str_replace("'", "\'",$titre);
		$desc1 = str_replace("'", "\'",$desc1);
		$desc2 = str_replace("'", "\'",$desc2);
		$real = str_replace("'", "\'",$real);
		$img = str_replace("'", "\'",$img);
        connectionbd()->query("UPDATE movie SET mov_title='$titre', mov_description_short='$desc1', mov_description_long='$desc2', mov_director='$real', mov_year=$annee, mov_image='$img' WHERE mov_id=$id;");
    }

function ajoutMembre($login,$mdp)
{
    $login = str_replace("'", "\'",$login);
    $mdp = str_replace("'", "\'",$mdp);
    connectionbd()->query("INSERT INTO membre values ('','$login','$mdp');");
}

function deconnection()
{
    
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
}
?>