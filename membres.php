<?php
include("includes/Haut_de_page.php");
include("includes/connexion_inc.php");
include('includes/verif_connexion.php');
    
?>
    
    
<html>
    <link href="assets/css/membres.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="assets/js/membres.js"></script>
    <?php 
        $sql = "SELECT id, nom, prenom, login FROM utilisateurs WHERE admin = 0 ORDER BY classement DESC";
        $req = mysql_query($sql) or die(mysql_error());
    ?>
    <head><title>Classement</title></head>
    <body>
        <div id="conteneur">      
            <table id="membres-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Pseudo</th>
                        <th>Réinitialiser le Mot de Passe<br>(Mot de passe = Pseudo)</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                    $result = mysql_num_rows($req);
                    if ($result > 0)
                    {
                        $i = 0;
			while ($data = mysql_fetch_array($req))
			{
                            echo "<tr>";
                                
                            echo "<td>" . $data["nom"] . "</td>";
                            echo "<td>" . $data["prenom"] . "</td>";
                            echo "<td>" . $data["login"] . "</td>";
                            echo "<td>" . '<span userid="' . $data["id"] . '" class="initPasswordMembre margin glyphicon glyphicon-repeat" aria-hidden=" true"></span>' . "</td>";
                            echo "<td>" . '<span userid="' . $data["id"] . '" class="removeMembre margin glyphicon glyphicon-remove" aria-hidden=" true"></span>' . "</td>";
                                
                            echo "</tr>";
                        }
                    }
                        
                    ?>
                </tbody>
            </table>
        </div>
            
        <!-- Suppr compte popup -->
        <div class="modal fade" id="checkPopupID">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Voulez vous supprimer ce compte?</h4>
                    </div>
                    <div class="modal-body">
                        <button type="button" id="noDelete" class="btn btn-default btnModal" data-dismiss="modal">Ne Pas Supprimer</button>
                        <button type="button" id="yesDelete" class="btn btn-danger btnModal">Supprimer</button>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
            
        <!-- Reinitialisé mot de passe -->
        <div class="modal fade" id="checkReinitPopupID">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Voulez vous réinitialiser le mot de passe? (Mot de passe = Pseudo)</h4>
                    </div>
                    <div class="modal-body">
                        <button type="button" id="noDelete2" class="btn btn-default btnModal" data-dismiss="modal">Ne Pas Réinitialiser</button>
                        <button type="button" id="yesDelete2" class="btn btn-danger btnModal">Réinitialiser</button>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
            
        <div class="modal fade" id="errorChangePassword">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <br/>
                        <strong>Warning!</strong> Une erreur est survenue, réesayez plus tard
                        <br/><br/><br/>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="modal fade" id="successChangePassword">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <br/>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <br/>
                        Le mot de passe à bien été changé, nouveau mot de passe : <strong id="successNewPassword"></strong>
                        <br/><br/><br/>
                    </div>
                </div>
            </div>
        </div>
            
    </body>
</html>
    
<?php
    
include("includes/Bas_de_page.php");
    
?>