<?php
include("includes/Haut_de_page.php");
include("includes/connexion_inc.php");
include('includes/verif_connexion.php');
    
?>


<html>
    <link href="assets/css/classement.css" rel="stylesheet">
    <script type="text/javascript" src="assets/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="assets/js/classement.js"></script>
    <script type="text/javascript">
    <?php 
        $sql = "SELECT id, classement, nom, prenom FROM utilisateurs WHERE admin = 0 ORDER BY classement DESC";
        $req = mysql_query($sql) or die(mysql_error());
    ?>
    </script>
    <head><title>Classement</title></head>
    <body>
        <div id="conteneur">
            
            <table id="classement-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <?php
                        if ($admin == false) {
                            echo "<th>Classement</th>";
                        } else {
                            echo "<th>Ancien Classement</th>";
                            echo "<th>Nouveau Classement</th>";
                        }
                        ?>
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
                            ++$i;
                            echo "<tr>";
                            if ($i == 1) {
                                echo "<td>" . $i . "<span class='gold glyphicon glyphicon-certificate' aria-hidden='true'></span></td>";
                            } else if ($i == 2) {
                                echo "<td>" . $i . "<span class='silver glyphicon glyphicon-certificate' aria-hidden='true'></span></td>";
                            } else if ($i == 3) {
                                echo "<td>" . $i . "<span class='bronze glyphicon glyphicon-certificate' aria-hidden='true'></span></td>";
                            } else {
                              echo "<td>" . $i . "</td>";  
                            }
                            echo "<td>" . $data["nom"] . "</td>";
                            echo "<td>" . $data["prenom"] . "</td>";
                            if ($admin == false) {
                                echo "<td>" . $data["classement"] . "</td>";
                            } else {
                                echo "<td>";
                                echo $data["classement"];
                                echo "</td>";
                                echo "<td>";
                                echo '<div class="input-group">
                                    <input type="text" class="form-control" placeholder="0" value="' . $data["classement"] . '">
                                    <span class="input-group-btn">
                                        <button classementid="' . $data["id"] . '" class="btn btn-info changementClassement" type="button"><span class="margin glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                                    </span>
                                </div>';
                                echo "</td>";
                            }
                            echo "</tr>";
                        }
                    }
                        
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>

<?php
    
include("includes/Bas_de_page.php");
    
?>