<?php
include("connexion_inc.php");
include("verif_connexion.php");
    
$login = htmlentities($_POST['login']);
$nom = htmlentities($_POST['nom']);
$prenom = htmlentities($_POST['prenom']);
$ville = htmlentities($_POST['ville']);
$age = htmlentities($_POST['age']);
$mdp = md5($_POST['mdp']);
    
$resp = Array();
    
$sql = "SELECT id FROM utilisateurs WHERE login = \"" . $login . "\";";
$requete = mysql_query($sql) or die (mysql_error());
    
if (mysql_num_rows($requete) > 0) {
    // Pseudo est déja pris
    $resp["ret"] = false;
    echo json_encode($resp);
    exit();
}
    
$sql = "INSERT into utilisateurs(login, mdp, ville, age, nom, prenom)
	values ('$login','$mdp','$ville','$age','$nom','$prenom')";
$requete = mysql_query($sql) or die (mysql_error());
$resp["ret"] = true;
echo json_encode($resp);
exit();            

?>