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
    <body>
        <!-- BARRE NAVIGATION !!! -->
        <?php
            include 'includes/en-tete.php';
        ?>
        

        <!-- CONTENU -->
		<div class="container">
        <?php 
            if (isset($_POST['titre']))
            {
                include 'includes/fonctions.php';
                if (isset($_FILES['affiche']) && $_FILES['affiche']['size'] != 0)
                {
					$img = 'images/' . basename($_FILES['affiche']['name']);
					if (move_uploaded_file($_FILES['affiche']['tmp_name'], utf8_decode($img))) {
						
					} else {
						echo "L'affiche n'a pas été ajoutée";
						echo "<br/>";
					}
                }			
                else { $img='';}
                $titre = $_POST['titre'];
                $desc1 = $_POST['descc'];
                $desc2 = $_POST['descl'];
                $real = $_POST['real'];
                $annee = $_POST['annee'];
                
                ajoutfilm($titre, $desc1, $desc2, $real, $annee, $img);
                echo "Le film $titre a été ajouté avec succès.";
				echo "<br/>";
            }
        ?>
        
            <h3 class="text-center">Ajouter un film</h3>
			<div class="jumbotron">
				<form method="post" action="addmovie.php" enctype="multipart/form-data"  class="form-horizontal">
				  <div class="form-group">
					<label for="titre" class="col-sm-2 control-label">Titre</label>
					  <div class="col-sm-8">
						<input type="text" class="form-control" placeholder="Titre du film" id="titre" required name="titre">
					  </div>
				  </div>
				  <div class="form-group">
					<label for="descc" class="col-sm-2 control-label">Courte description</label>
					  <div class="col-sm-8">
						<textarea class="form-control" id="descc" placeholder="Courte description du film" required name="descc"></textarea>
					  </div>
				  </div>
				  <div class="form-group">
					<label for="descl" class="col-sm-2 control-label">Description complète</label>
					  <div class="col-sm-8">
						  <textarea rows="7" class="form-control" id="descl" placeholder="Longue description du film" required name="descl"></textarea>
					  </div>
				  </div>
				  <div class="form-group">
					<label for="real" class="col-sm-2 control-label">Réalisateur</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="real" placeholder="Réalisateur du film" required name="real">
					</div>
				  </div>
				  <div class="form-group">
					<label for="annee" class="col-sm-2 control-label">Année de sortie</label>
					  <div class="col-sm-8">
						<input type="number" class="form-control" id="annee" placeholder="Année de sortie du film" required name="annee">
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
        
        
        <!-- FOOTER !!! -->
        <?php
            include 'includes/footer.php';
        ?>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>