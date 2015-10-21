<?php

include("connexion_inc.php");
include("verif_connexion.php");

$idvideo = $_POST["idvideo"];

if (!is_numeric($idvideo)) {
    exit();
}

if ($connect === false) {
    exit();
}

// On supprime la video en BDD
$requete = "DELETE FROM video WHERE id = '" . $idvideo . "';";
$rs = mysql_query($requete) or die (mysql_error());