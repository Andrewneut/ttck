<?php
    
include("connexion_inc.php");
include('verif_connexion.php');
    
if ($connect == false || !isset($_POST["id"]) || !is_numeric($_POST["id"])) {
    exit();
}
    
$resp = Array();
    
// On supprime le compte dont l'id est $_POST["id"]
$id_a_modifier = $_POST["id"];
    
// on récupére le login
$requete = "SELECT login FROM utilisateurs WHERE id = " . $id_a_modifier . ";";
$req = mysql_query($requete) or die (mysql_error());
     
$result = mysql_num_rows($req);
if ($result > 0)
{
   $data = mysql_fetch_array($req);
   $loginCible = $data["login"];
} else {
    $resp["ret"] = false;
}
                        
$newMdp = md5($loginCible);
    
// On change 
$requete2 = "UPDATE utilisateurs SET mdp = \"" . $newMdp . "\" WHERE id = " . $id_a_modifier . ";";
$rs2 = mysql_query($requete2) or die (mysql_error());
    
$resp["ret"] = true;
$resp["newMdp"] = $loginCible; 

echo json_encode($resp);