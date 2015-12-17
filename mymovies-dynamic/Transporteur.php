<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Le Transporteur</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/films.ico" />
</head>
    
    <?php 
    include('./includes/functions.php');

        $bd = connectionbd(); ?>

<body>

    <?php include("includes/en-tete.php"); ?>

<div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                          <img src="images/transporteur.jpg">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h2>Le Transporteur</h2>
						<h3>Louis Leterrier et Corey Yuen, 2002</h3>
                        <p>Pour les livraisons à haut risque, Franck est toujours là. Comme les autres, il obéit aux trois règles d'or :
						ne poser aucune question, ne pas ouvrir les colis et ne pas enfreindre les deux premières au risque d'y trouver la mort. 
						Mais cette fois-ci, Franck a ouvert le sac posé dans son coffre et a découvert une jeune femme se nommant Lai. 
						Face à ce cas de conscience et à une sombre affaire de trafic humain, il ne va plus pouvoir fermer les yeux et 
						décide d'aider ce "colis" un peu spécial.</p>
                        <button type="button" class="btn btn-primary"><span class= "glyphicon glyphicon-edit">Editer</button></a>
                    </div>
                </div>
            </div>
            </br>
        </div>
		
    <footer> 
       <?php include("includes/footer.php"); ?>
    </footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>