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
        <title>Modifier un film</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/films.ico" />
    </head>

    <body>
        <!-- BARRE NAVIGATION !!! -->
        <?php
            include 'includes/en-tete.php';
    
        ?>
            <!-- CONTENU -->
            <div class="container">
                <?php 
			include 'includes/fonctions.php';
            if (isset($_POST['titre']))
            {
                if (isset($_FILES['affiche']) && $_FILES['affiche']['size'] != 0)
                {
					$img = 'images/' . basename($_FILES['affiche']['name']);
					if (move_uploaded_file($_FILES['affiche']['tmp_name'], utf8_decode($img))) {
						
					} else {
						echo "L'affiche n'a pas été ajoutée";
						echo "<br/>";
					}
                }			
                else { $img=$_POST['img'];}
                $titre = $_POST['titre'];
                $desc1 = $_POST['descc'];
                $desc2 = $_POST['descl'];
                $real = $_POST['real'];
                $annee = $_POST['annee'];
                
                editfilm($_GET['film'], $titre, $desc1, $desc2, $real, $annee, $img);
                echo "Le film $titre a été edité avec succès. ";
				echo "<a href='movie.php?film=$_GET[film]'>Revenir à la fiche du film</a>";
				echo "<br/>";
            }
			foreach(connectionbd()->query('SELECT * from movie where mov_id='.$_GET['film'].';') as $row) {
			}
				
        ?>

                    <h1>Modifier un film</h1>
                    <div class="jumbotron">
                        <form method="post" action="movie.php?film=$_GET[film]" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <label for="titre" class="col-sm-2 control-label">Titre</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Titre du film" id="titre" required name="titre" value="<?php echo $row[1]; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descc" class="col-sm-2 control-label">Courte description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="descc" placeholder="Courte description du film" required name="descc">
                                        <?php echo $row[2]; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descl" class="col-sm-2 control-label">Description complète</label>
                                <div class="col-sm-8">
                                    <textarea rows="7" class="form-control" id="descl" placeholder="Longue description du film" required name="descl">
                                        <?php echo $row[3]; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="real" class="col-sm-2 control-label">Réalisateur</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="real" placeholder="Réalisateur du film" required name="real" value="<?php echo $row[4]; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="annee" class="col-sm-2 control-label">Année de sortie</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="annee" placeholder="Année de sortie du film" required name="annee" value="<?php echo $row[5]; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="affiche" class="col-sm-2 control-label">Affiche</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
                                    <input type="file" id="affiche" name="affiche">
                                    <p>N'ajouter pas de fichier pour conserver l'image actuelle !</p>
                                </div>
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <button type="submit" class="btn btn-default">Enregistrer</button>
                            <input type="hidden" name="img" value="<?php echo $row[6]; ?>">
                        </form>
                    </div>
            </div>


            <!-- FOOTER !!! -->
            <?php
            include 'includes/footer.php';
        ?>


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                <script src="lib/bootstrap/js/bootstrap.min.js"></script>

    </body>

    </html>