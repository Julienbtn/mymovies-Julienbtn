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
        $stmtFilm = connectionbd()->prepare("INSERT INTO movie values ('', ? , ?, ?, ?, ?, ?);");
        $stmtFilm->execute(array($titre,$desc1,$desc2,$real,$annee,$img));
    }
	
	function editfilm($id, $titre, $desc1, $desc2, $real, $annee, $img)
    {
		$titre = str_replace("'", "\'",$titre);
		$desc1 = str_replace("'", "\'",$desc1);
		$desc2 = str_replace("'", "\'",$desc2);
		$real = str_replace("'", "\'",$real);
		$img = str_replace("'", "\'",$img);
        $stmtFilmE = connectionbd()->prepare("UPDATE movie SET mov_title=?, mov_description_short=?, mov_description_long=?, mov_director=?, mov_year=?, mov_image=? WHERE mov_id=?;");
        $stmtFilmE->execute(array($titre,$desc1,$desc2,$real,$annee,$img,$id));
    }

function ajoutMembre($login,$mdp)
{
    $login = str_replace("'", "\'",$login);
    $mdp = str_replace("'", "\'",$mdp);
    $stmtMembre = connectionbd()->prepare("INSERT INTO membre values ('',?,?);");
    $stmtMembre->execute(array($login,$mdp));
}

?>