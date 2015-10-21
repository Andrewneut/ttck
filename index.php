<?php 
include("includes/Haut_de_page.php");
include("includes/connexion_inc.php");
include('includes/verif_connexion.php');
    
?>
    
    
<div class="jumbotron" style="background-color: white;">
    <div class="Banniere">
        <h1 id="welcome">Bienvenue</h1>
    </div>
    <!-- Carousel
================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="Img/bienvenue.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h3></h3>
                        <p>Bienvenue sur le site du club de tennis de table TTCK Coudekerque-Branche</p>
                        <?php
                        if ($connect == false) {
                        ?>
                        <p><a class="btn btn-lg btn-info" href="#"  id='lookinscription' role="button">Enregistrez-vous maintenant !</a></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="Img/videos.jpg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption whitetext">
                        <h1>Vidéos</h1>
                        <p>Evoluant en classement régional, nos matchs sont d'une importance capitale pour le club</p>
                        <p><a class="btn btn-lg btn-info" href="#" role="button" id='lookvideo'>Regarder les vidéos</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="Img/news.jpg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption whitetext">
                        <h1>Actualités</h1>
                        <p>Pour tout savoir sur le club</p>
                        <p><a class="btn btn-lg btn-info" href="#" role="button" id='lookactu'>Accéder à l'actualité</a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="Img/classements.jpg" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Classements</h1>
                        <p>Voici le classement du club et des joueurs au niveau régional... et national !</p>
                        <p><a class="btn btn-lg btn-info" href="#" role="button" id='lookclass'>Voir le classement</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- /.carousel -->
</div>
    
</div> <!-- /container -->
    
    
<?php
    
include("includes/notification.inc.php");
include("includes/Bas_de_page.php");