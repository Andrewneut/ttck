<?php

include("connexion_inc.php");

if (!isset($_POST["iduser"]) || !isset($_POST["nouveauclassement"])) {
    exit();
} else {
    if (!is_numeric($_POST["nouveauclassement"]) || !is_numeric($_POST["iduser"])) {
        exit();
    }
    $requete = "UPDATE utilisateurs SET classement = '" . htmlentities($_POST["nouveauclassement"]) . "' Where id='" . htmlentities($_POST["iduser"]) . "'";
    $rs = mysql_query($requete) or die (mysql_error());           
}

