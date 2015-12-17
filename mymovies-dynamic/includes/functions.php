<?php    
function connectionbd()
    {
    $bdd =new PDO('mysql:host=localhost;dbname=mymovies', 'mymovies_user', 'secret', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $bdd;
    }

    function ajoutfilm($titre, $desc1, $desc2, $real, $annee, $img)
    {
        $bd = connectionbd();
        $bd->query("INSERT INTO movie values ('','$titre', '$desc1', '$desc2', '$real', '$annee', '$img';");
    }
?>