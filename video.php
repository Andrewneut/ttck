<?php
include("includes/Haut_de_page.php");
include("includes/connexion_inc.php");
include('includes/verif_connexion.php');
    
header('X-Frame-Options: GOFORIT');
    
?>
    
    
<html>
    <link href="assets/css/video.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="assets/js/video.js"></script>
    <script type="text/javascript">
    <?php 
        
        $sql = "SELECT * FROM video WHERE 1 ORDER BY id DESC";
            
        $req = mysql_query($sql) or die(mysql_error());
    ?>
    </script>
    <head><title>Vidéos</title></head>
    <body>        
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
            
        <div class="row daddyvideo">
            <div class="col-xs-10 col-md-10 daddyvideo2">
                <a href="#" class="thumbnail daddyvideo3">
                    <iframe class="daddyvideo4"
                            src="<?php echo $res["link"]; ?>">
                    </iframe>
                </a>
            </div>
            <div class="col-xs-2 col-md-2 quipostelavideo">
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
                    <div class="col-md-2"><span class="margin removeVideo glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                    <div class="col-md-10"><a class="deleteVideo" idvideo="<?php echo $res["id"]; ?>" href="#">Supprimer la vidéo</a></div>
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
                <h1 id="titreajoutvideo">Ajout de vidéo</h1>
                <div id="daddyShare">
                    <img src="Img/share.png" id="shareTuto" />
                </div>
                <table id="tableupload" class="table">
                    <tbody>
                        <tr>
                            <td id="tdfirst"><span class="badge">1</span> Ajoutez le lien de la vidéo (Youtube ou Dailymotion)</td>
                            <td id="tdsecond">
                                <input type="text" class="form-control" id="inputvideo" /> 
                            </td>
                        </tr>
                        <tr>
                            <td><span class="badge">2</span> Donnez-lui un titre</td>
                            <td><input type="text" id="titrevideo" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td><span class="badge">3</span> Cliquez pour ajouter</td>
                            <td><button class="btn btn-info" id="ajoutVideo">Ajouter la vidéo</button></td>
                        </tr>
                    </tbody>
                </table>
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