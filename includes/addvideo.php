<?php
    
include("connexion_inc.php");
include('verif_connexion.php');
    
$resp = Array();

if ($connect == false || !isset($_POST["link"]) || !isset($_POST["titre"])) {
    exit();
}

$link = $_POST["link"];
$titre = $_POST["titre"];
    
// on ajoute la vidéo
$requete = "INSERT INTO video (uploadeur, link, titre, date) VALUES (" . $connectedID . ", \"" . $link . "\", \"" . $titre . "\"," . time() . ");";
$rs = mysql_query($requete) or die (mysql_error());  

