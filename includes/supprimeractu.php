<?php

include("connexion_inc.php");
include("verif_connexion.php");

$idactu = $_POST["idactu"];
$pathphoto = $_POST["pathphoto"];
$photo = $_POST["photo"];

if (!is_numeric($idactu)) {
    exit();
}

if (($connect === false) || ($admin == "0")) {
    exit();
}

// On supprime la photo en BDD
$requete = "DELETE FROM actualite WHERE id = '" . $idactu . "';";
$rs = mysql_query($requete) or die (mysql_error());

// On supprime la photo en vrai
if ($photo == "1") {
    unlink("../uploadedImg/" . $pathphoto);
}