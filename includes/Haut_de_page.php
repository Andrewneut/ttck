<?php 
include("includes/connexion_inc.php");
include('includes/verif_connexion.php');
?>
    
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="Img/icon.jpg">
            
        <title>Site TTCK</title>
            
        <!-- Bootstrap core CSS -->
        <link href="bootstrap-3.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            
        <!-- Custom styles for this template -->
        <link href="assets/css/index.css" rel="stylesheet">
        <link href="bootstrap-3.3.0/docs/examples/sticky-footer/sticky-footer.css" rel="stylesheet">
        <link href="bootstrap-3.3.0/docs/examples/carousel/carousel.css" rel="stylesheet">
    </head>
        
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="resetMenu" href="index.php">TTCK</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav" id="links">
                    <li role="presentation" index="1"><a href="actualite.php">Actualité</a></li>
                    <li role="presentation" index="2"><a href="classement.php">Classement</a></li>
                    <li role="presentation" index="3"><a href="video.php">Vidéo</a></li>
                    <li class="dropdown" index="4">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Photos <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="photos.php?tournoi=0">Vie du club</a></li>
                            <li class="divider"></li>
                            <li><a href="photos.php?tournoi=1">Tournoi</a></li>
                        </ul>
                    </li>
                    
                    <?php
                        if ($connect == true) {
                    ?>
                    <li role="presentation" index="5"><a href="tchat.php">Tchat</a></li>
                    <?php
                        }
                        
                        if ($admin == true) {
                    ?>
                        <li role="presentation" index="6"><a href="membres.php">Membres</a></li>
                    <?php
                        }
                    ?>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                        <?php 
                            if ($connect == true) {
                        ?>
                    
                    <!-- Si on est connecté -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $pseudo ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="monProfil.php"><span class="glyphicon glyphicon-user glyphicon-navbar" aria-hidden="true"></span>Profil</a></li>
                            <li id="deconnexionBtn"><a href="#"><span class="glyphicon glyphicon-log-out glyphicon-navbar" aria-hidden="true"></span>Déconnexion</a></li>
                        </ul>
                    </li>
                    
                        <?php 
                            } else {
                        ?>
                    
                    <!-- Si on n'est pas connecté -->
                    <li id="inscriptionBtnLi"><button id="inscriptionBtn" class='btn btn-info navbar-btn'>Inscription</button></li>
                    
                    <!-- Si on n'est pas connecté -->
                    <li id="connexionBtnLi"><button id="connexionBtnConnect" class='btn btn-info navbar-btn'>Connexion</button></li>
                    
                        <?php
                            }
                        ?>
                </ul>
            </div>
        </nav>
            
        <div class="container1">
            
            <!-- Log In popup -->
            <div class="modal fade" id="logInPopupID">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                            <h4 class="modal-title"><span style="margin: 0;" class="glyphicon glyphicon-user"></span> &nbsp; Se connecter</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Message container -->
                            <div class="displayMsgErrorDad">
                                <div class="displayMsgError" id="displayMsgError"></div>
                            </div>
                            <div class="input-group fullWidth">
                                <span class="input-group-addon inputAddonModal">Nom d'utilisateur</span>
                                <input type="text" class="form-control" placeholder="Walter" id="logInUsername" />
                            </div>
                            <hr>
                            <div class="input-group fullWidth">
                                <span class="input-group-addon inputAddonModal">Mot de passe</span>
                                <input type="password" class="form-control" placeholder="Password" id="logInPassword" />
                            </div>
                            <br>
                            <input type="checkbox" id="rememberme" /> Se souvenir du Nom d'utilisateur
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btnModal" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-info btnModal" id="logInButtonInModal">Se connecter</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="inscriptionPopupID">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
                            <h4 class="modal-title"><span style="margin: 0;" class="glyphicon glyphicon-user"></span> &nbsp; Créer Un Compte</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Message container -->
                            <div class="displayMsgErrorDad">
                                <div class="displayMsgError label" id="displayMsgErrorInscription"></div>
                            </div>
                            <div class="input-group fullWidth inputInscription">
                                <span class="input-group-addon inputAddonModal">Nom d'utilisateur *</span>
                                <input type="text" class="form-control" placeholder="WalterDu59" id="loginInput" />
                            </div>
                            <hr>
                            <div class="input-group fullWidth inputInscription">
                                <span class="input-group-addon inputAddonModal">Nom *</span>
                                <input type="text" class="form-control" placeholder="White" id="nomInput" />
                            </div>
                            <div class="input-group fullWidth inputInscription">
                                <span class="input-group-addon inputAddonModal">Prénom *</span>
                                <input type="text" class="form-control" placeholder="Walter" id="prenomInput" />
                            </div>
                            <hr>
                            <div class="input-group fullWidth inputInscription">
                                <span class="input-group-addon inputAddonModal">Ville</span>
                                <input type="text" class="form-control" placeholder="Dunkerque" id="villeInput" />
                            </div>
                            <div class="input-group fullWidth inputInscription">
                                <span class="input-group-addon inputAddonModal">Age</span>
                                <input type="text" class="form-control" placeholder="19" id="ageInput" />
                            </div>
                            <hr>
                            <div class="input-group fullWidth inputInscription">
                                <span class="input-group-addon inputAddonModal">Mot de passe *</span>
                                <input type="password" class="form-control" placeholder="Password" id="passwordInput" />
                            </div>
                            <hr>
                            <p style="font-size: 8pt; font-weight: bold;">* Champs Obligatoire</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btnModal" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-info btnModal" id="inscriptionButtonInModal">Créer son compte</button>
                        </div>
                    </div>
                </div>
            </div>