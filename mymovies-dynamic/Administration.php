	<!doctype html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Administration</title>
		<link rel="shortcut icon" type="image/x-icon" href="images/films.ico" />
	</head>

	<body class="container">
	   <header>
		<?php include("en-tete.php"); ?>
       </header>
			
			<div class="container">
				<h4>Administration</h4>
				</br>
				<div class="table-responsive">
					<ul class="nav nav-tabs">
					  <li class="active"><a data-toggle="pill" href="#Films">Films</a></li>
					  <li><a data-toggle="pill" href="#utilisateurs">Utilisateurs</a></li>
					</ul>
					<div class="tab-content">
						<div id="Films" class="tab-pane fade in active">
						  <table class="table table-bordered table-hover">
							<tr>
								<td><h3>Titre</h3></td>
								<td><h3>Réalisateur(s)</h3></td>
								<td><h3>Année</h3></td>
								<td><h3>Actions</h3></td>
							</tr>
							 <tr>
							<td><a href='Transporteur.php'>Le Transporteur</a></td>
							<td>Corey Yuen et Louis Leterrier</td>
							<td>2002</td>
							<td>
								<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit "></span> </button>
								<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove "></span> </button>
							</td>
				</tr>
							<tr>
					<td><a href="#"> Expendables </a></td>
					<td>Sylvester Stallone</td>
					<td>2010</td>
					<td>
						<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit "></span> </button>
						<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove "></span> </button>
					</td>
				</tr>
							 <tr>
					<td><a href="#"> La Vengeance dans la peau </a></td>
					<td> Paul Greengrass</td>
					<td>2007</td>
					<td>
						<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit "></span> </button>
						<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove "></span> </button>
					</td>
				</tr>
						   
						</table>
						</div>
						<div id="utilisateurs" class="tab-pane fade">
						  <table class="table table-bordered table-hover">
							<tr>
								<td><h3>Nom</h3></td>
								<td><h3>Prénom</h3></td>
								<td><h3>Pseudo</h3></td>
								<td><h3>Actions</h3></td>
							</tr>
							<tr>
								<td>Bontron</td>
								<td>Julien</td>
								<td>Administrateur</td>
					 <td>
						<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit "></span> </button>
						<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove "></span> </button>
					</td>
								</tr>
						
							<tr>
								<td>Pesquet</td>
								<td>Baptiste</td>
								<td>Enseignant</td>
								 <td>
						<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit "></span> </button>
						<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove "></span> </button>
					</td>
								</tr>
						</table>
						</div>
					  </div>
					
				</div>
				</br>
			</div>
			 
			   
			 <footer>
			<?php include("footer.php"); ?>
		</footer>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	</body>

	</html>