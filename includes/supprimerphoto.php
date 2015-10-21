<?php

include("connexion_inc.php");
include("verif_connexion.php");

$idphoto = $_POST["idphoto"];
$pathphoto = $_POST["pathphoto"];

if (!is_numeric($idphoto)) {
    exit();
}

if ($connect === false) {
    exit();
}

// On supprime la photo en BDD
$requete = "DELETE FROM photo WHERE id = '" . $idphoto . "';";
$rs = mysql_query($requete) or die (mysql_error());

// On supprime la photo en vrai
unlink("../uploadedImg/" . $pathphoto);