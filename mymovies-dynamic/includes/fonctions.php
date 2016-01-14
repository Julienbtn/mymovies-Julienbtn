<?php
    function connectionbd()
    {
        // MySQL config for OpenShift
        $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
        $dbName = getenv('OPENSHIFT_GEAR_NAME');
        $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
        $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
        $bdd =new PDO($dbHost, $dbUser, $dbPassword,$dbName);
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