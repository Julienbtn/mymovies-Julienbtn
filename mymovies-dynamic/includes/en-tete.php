<html>
<Header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="glyphicon glyphicon-th-list"></span>
                </button>
                <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-film"></span> MyMovies</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="addmovie.php"><span class="glyphicon glyphicon-plus"></span> Ajouter un film</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="administration.php"> Administration</a></li>
                    <li>
                        <?php if (isset($_SESSION['login'])) {?>
                            <a href="#">
                                <?php echo $_SESSION['login']; ?>
                            </a>
                            <?php }
              else { ?>
                                <a href="connection.php"> Se connecter</a></li>
                    <?php
            }
                  ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            </ul>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
</Header>

</html>