<?php
    function connectionbd()
    {
        //Connexion MySQL 
        //$bdd =new PDO('mysql:host=localhost;dbname=mymovies', 'mymovies_user', 'secret', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
        // MySQL config for OpenShift
        $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
        $dbName = getenv('OPENSHIFT_GEAR_NAME');
        $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
        $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
        $bdd =new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $bdd;
    }

function escape($valeur)
{
    // Convertit les caractères spéciaux en entités HTML
    return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
}


    function ajoutfilm($titre, $desc1, $desc2, $real, $annee, $img)
    {
        $stmtFilm = connectionbd()->prepare("INSERT INTO movie values ('', ? , ?, ?, ?, ?, ?);");
        $stmtFilm->execute(array($titre,$desc1,$desc2,$real,$annee,$img));
    }
	
	function editfilm($id, $titre, $desc1, $desc2, $real, $annee, $img)
    {
        $stmtFilmE = connectionbd()->prepare("UPDATE movie SET mov_title=?, mov_description_short=?, mov_description_long=?, mov_director=?, mov_year=?, mov_image=? WHERE mov_id=?;");
        $stmtFilmE->execute(array($titre,$desc1,$desc2,$real,$annee,$img,$id));
    }

function ajoutMembre($login,$mdp)
{
    $stmtMembre = connectionbd()->prepare("INSERT INTO membre values ('',?,?);");
    $stmtMembre->execute(array($login,$mdp));
}

?>