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
        <title>Administration</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/films.ico" />
    </head>

    <body>
        <?php include("includes/en-tete.php"); 
    ?>

            <div class="container">
                <h1>Administration</h1>
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
                                    <td>
                                        <h3>Titre</h3></td>
                                    <td>
                                        <h3>Réalisateur(s)</h3></td>
                                    <td>
                                        <h3>Année</h3></td>
                                    <td>
                                        <h3>Actions</h3></td>
                                </tr>
                                <?php
						include 'includes/fonctions.php';
						if (isset($_GET['film']))
						{
							$req = connectionbd()->prepare("DELETE from movie where mov_id=?;");
							$req->execute(array($_GET['film']));
						}
						foreach(connectionbd()->query('SELECT mov_id, mov_title, mov_director, mov_year from movie order by mov_year DESC') as $row) {
							echo "<tr>";
								echo "<td><a href='movie.php?film=$row[0]'>$row[1]</a></td>";
								echo "<td>$row[2]</td>";
								echo "<td>$row[3]</td>";
								echo "<td><a href='edit.php?film=$row[0]'><span class='glyphicon glyphicon-edit'></span></a> <a href='#'><span class='glyphicon glyphicon-remove' data-toggle='modal' data-target='#myModal$row[0]'></span></a></td>";
							echo "</tr>";
							
							echo "<div class='modal fade' id='myModal$row[0]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>";
								echo "<div class='modal-dialog'>";
									echo "<div class='modal-content'>";
										echo "<div class='modal-header'>";
											echo "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>";
											echo "<h4 class='modal-title' id='myModalLabel'>Confirmation de suppresion</h4>";
										echo "</div>";
										echo "<div class='modal-body'>";
											echo "Voulez-vous vraiment supprimer le film $row[1]?";
										echo "</div>";
										echo "<div class='modal-footer'>";
											echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Annuler</button>";
											echo "<a href='Administration.php?film=$row[0]'><button type='button' class='btn btn-primary'>Supprimer \"$row[1]\"</button></a>";
										echo "</div>";
									echo "</div>";
								echo "</div>";
							echo "</div>";
						}
						?>
                            </table>
                        </div>

                        <div id="utilisateurs" class="tab-pane fade">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <td>
                                        <h3>Liste des membres</h3>
                                    </td>
                                </tr>
                                <?php
                            foreach(connectionbd()->query('SELECT login from membre') as $row1) {
                                echo "<tr>";
                                echo "<td>$row1[0]</td>";
                                echo "</tr>";
                            }
                                
                            ?>
                            </table>
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