<?php
include("includes/Haut_de_page.php");
include("includes/connexion_inc.php");
include('includes/verif_connexion.php');
    
?>
    
    
<html>
    <link href="assets/css/photos.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="assets/js/photos.js"></script>
    <script type="text/javascript">
    <?php 
        
        if (isset($_GET["tournoi"]) && ($_GET["tournoi"] == "0")) {
            $tournoi = false;
        } else {
            $tournoi = true;
        }
            
        $sql = "SELECT id, uploadeur, cheminphoto, titre, date FROM photo WHERE tournoi = \"" . $tournoi . "\" ORDER BY id DESC";   
        $req = mysql_query($sql) or die(mysql_error());
    ?>
    </script>
    <head><title>Photos</title></head>
    <body>
        <span class="label label-danger" id="errDisplay"></span>
        <span class="label label-success" id="goodDisplay"></span>
            
        <?php
            while ($res = mysql_fetch_assoc($req)) {
                // On récupére le pseudo depuis le champ uploadeur
                $sql2 = "SELECT login FROM utilisateurs WHERE id = " . $res["uploadeur"] . ";";
                $req2 = mysql_query($sql2) or die(mysql_error());
                $login = "Anonyme";
                if (($res2 = mysql_fetch_assoc($req2))) {
                    $login = $res2["login"];
                }
        ?>
            
        <div class="row daddyphoto">
            <div class="col-xs-10 col-md-10 daddyphoto2">
                <a href="#" class="thumbnail daddyphoto3">
                    <img style='border: 1px solid #ddd;' src="uploadedImg/<?php echo $res["cheminphoto"] ?>" class="daddyphoto4" />
                </a>
            </div>
            <div class="col-xs-2 col-md-2 quipostelaphoto">
                    <div class="row" style="overflow: hidden; font-weight: bold;">
                        <div class="col-md-12"><?php if ($res["titre"] == "") { echo "-";} else { echo $res["titre"]; }; ?></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2"><span class="margin glyphicon glyphicon-user" aria-hidden="true"></span></div>
                        <div class="col-md-10"><?php echo $login; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><span class="margin glyphicon glyphicon-time" aria-hidden="true"></span></div>
                        <div class="col-md-10"><?php echo date("d/m/Y H:i:s", $res["date"]); ?></div>
                    </div>
                        <?php
                            if ($connect === true) {
                                if (($connectedID == $res["uploadeur"]) || ($admin == 1)) {
                        ?>
                    <div class="row">
                        <div class="col-md-2"><span class="margin removePhoto glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                        <a class="deletePhoto" idphoto="<?php echo $res["id"]; ?>" pathphoto="<?php echo $res["cheminphoto"]; ?>" href="#">Supprimer la photo</a>
                    </div>
                        <?php
                                }
                            }
                                
                        ?>
                    
            </div>
        </div>
            
        <?php
            }
                
        if ($connect == true) {
        ?>
        <div class="row">
            <div class="col-xs-10 col-md-10 daddyupload">
                <div class="daddyupload2">
                    <h1 id="titreajoutphoto">Ajout de photo</h1>
                    <form id="formaddphoto" name="formaddphotoname" action="includes/upload.php" method="post" enctype="multipart/form-data">
                        <table id="tableupload" class="table">
                            <tbody>
                                <tr>
                                    <td id="tdfirst"><span class="badge">1</span> Ajoutez une photo</td>
                                    <td id="tdsecond">
                                        <input name="fileToUpload" type="file" id="inputphoto" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="badge">2</span> Donnez-lui un titre</td>
                                    <td><input type="text" name="titrephoto" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td><span class="badge">3</span> Cliquez pour télécharger</td>
                                    <td><button class="btn btn-info" id="ajoutPhoto">Ajouter la photo</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </body>
</html>
    
<?php
    
include("includes/Bas_de_page.php");
    
?>