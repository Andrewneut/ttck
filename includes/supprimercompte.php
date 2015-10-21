<?php

include("connexion_inc.php");
include('verif_connexion.php');

if ($connect == false || !isset($_POST["id"]) || !is_numeric($_POST["id"])) {
    exit();
}

// On supprime le compte dont l'id est $_POST["id"]
$id_a_supprimer = $_POST["id"];

$requete = "DELETE FROM utilisateurs WHERE id = " . $id_a_supprimer . " AND admin != true;";
$rs = mysql_query($requete) or die (mysql_error());

// On supprime l'id de toutes les photos que le compte avait posté

$requete = "UPDATE photo SET uploadeur = -1 WHERE uploadeur = " . $id_a_supprimer . ";";
$rs = mysql_query($requete) or die (mysql_error());