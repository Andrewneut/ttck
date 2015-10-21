<?php
include("includes/Haut_de_page.php");
include("includes/connexion_inc.php");
include('includes/verif_connexion.php');
    
?>
    
    
<html>
    <link href="assets/css/actualite.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="assets/js/actualite.js"></script>
    <script type="text/javascript">
    <?php
        $sql = "SELECT * FROM actualite WHERE 1 ORDER BY id DESC";   
        $req = mysql_query($sql) or die(mysql_error());
    ?>
    </script>
    <head><title>Actualités</title></head>
    <body>
        <div id="conteneur">
            <span class="label label-danger" id="errDisplay"></span>
            <span class="label label-success" id="goodDisplay"></span>
            
            <br/><br/>
                
            <?php
            while ($res = mysql_fetch_assoc($req)) {
            ?>
                
            <div class="row">
                <div class="col-xs-10 col-md-10">
                    <div class="thumbnail">
                        <?php
                            if ($res["photo"] == true) {
                        ?>
                                <img style='border: 1px solid #ddd;' src="uploadedImg/<?php echo $res["cheminphoto"] ?>" />
                        <?php
                            }
                            else {
                        ?>
                                <img style='border: 1px solid #ddd;' src="Img/noimg.png" />
                        <?php
                            }
                        ?>
                        <hr>
                        <div class="caption">
                            <h3><?php echo $res["titre"]; ?></h3>
                            <p><?php echo $res["texte"]; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2 col-md-2 quipostelactu">
                    
                    <div class="row">
                        <div class="col-md-2"><span class="margin glyphicon glyphicon-time" aria-hidden="true"></span></div>
                        <div class="col-md-10"><?php echo date("d/m/Y H:i:s", $res["date"]); ?></div>
                    </div>
                        <?php
                            if ($connect === true && $admin == 1) {
                        ?>
                    <div class="row">
                        <div class="col-md-2"><span class="margin removeActu glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                        <a class="deleteActu" idactu="<?php echo $res["id"]; ?>" photo="<?php if ($res["photo"] == true) { echo "1"; } else { echo "0"; } ?>" pathphoto="<?php echo $res["cheminphoto"]; ?>" href="#">Supprimer l'actu</a>
                    </div>
                        <?php
                            }     
                        ?>
                </div>
                    
            </div>
            <?php
            }
            if ($admin == "1") {
            ?>
                
            <div class="row">
                <div class="col-xs-12 col-md-12 daddyupload">
                    <div class="daddyupload2">
                        <h1 id="titreajoutactu">Ajout d'actualité</h1>
                        <form id="formaddactu" name="formaddactuname" action="includes/uploadactu.php" method="post" enctype="multipart/form-data">
                            <table id="tableupload" class="table">
                                <tbody>
                                    <tr>
                                        <td id="tdfirst"><span class="badge">1</span> Ajoutez une photo pour l'actualité</td>
                                        <td id="tdsecond">
                                            <input name="fileToUpload" type="file" id="inputphoto" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge">2</span> Ajouter un titre à l'actualité</td>
                                        <td><input type="text" name="titreActu" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge">3</span> Ajouter un texte à l'actualité</td>
                                        <td><textarea name="texteActu" id='areaActu'></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><span class="badge">4</span> Cliquez pour ajouter l'actualité</td>
                                        <td><button class="btn btn-info" id="ajoutActu">Ajouter l'actualité</button></td>
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
        </div>
    </body>
</html>
    
<?php
    
include("includes/Bas_de_page.php");
    
?>