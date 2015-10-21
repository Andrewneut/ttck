<?php
include("includes/Haut_de_page.php");
include("includes/connexion_inc.php");
include('includes/verif_connexion.php');
    
if($connect)
 {
     
?>
    
    
<html>
    <link href="assets/css/tchat.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="assets/js/tchat.js"></script>
    <script type="text/javascript">
    <?php 
                  $sql = "SELECT id from messages ORDER BY id DESC LIMIT 1";
                  $req = mysql_query($sql) or die(mysql_error());
                  $data = mysql_fetch_assoc($req);
    ?>
        var lastid = <?php echo $data['id']; ?>
    </script>
    <head><title>Tchat</title></head>
    <body>
        <h1>Bievenue sur notre tchat <?php echo $pseudo;?></h1>
        <div id="connected"></div>
        <div id="tchat">
				<?php 
					$sql = "SELECT * from messages ORDER BY date DESC LIMIT 10";
					$req = mysql_query($sql) or die(mysql_error());
					$tab = array();
					while($data = mysql_fetch_assoc($req))
					{
						$tab[] = $data;
					}
					for($i=count($tab)-1;$i>=0;$i--){ /* Pour afficher les messages dans l'ordres le plus récents*/ 
                                                echo "<p><strong>".$tab[$i]['pseudo']." </strong> [<span style='font-size: 8pt;'>". date("d/m/Y H:i:s",$tab[$i]['date']) . "</span>]: " . htmlentities($tab[$i]['message'])."</p>";
					}
                                            
                                            
				?>
                                    
                                    
        </div>
        <div id="monTchat">
            <form method="post" action="#">
                <textarea id="textareamsg" name="message" placeholder="Votre message.."></textarea>
                <input class="btn btn-info" type="submit" value="Envoyer" id="submit">
            </form>
        </div>
            
    </body>
</html>
    
<?php
} 
else
	echo "Veuillez vous connecter";
include("includes/Bas_de_page.php");
    
?>