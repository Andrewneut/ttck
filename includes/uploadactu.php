<?php
    
include("connexion_inc.php");
include("verif_connexion.php");

if ($connect === false) {
    echo "<script>document.location = '../actualite.php?result=666';</script>";
    exit();
}
    
function generateRandomString($length = 10) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

if (!isset($_POST["titreActu"])) {
   $titre = " - ";
} else {
    $titre = htmlentities($_POST["titreActu"]);
}

if (!isset($_POST["texteActu"])) {
   $texte = " - ";
} else {
    $texte = htmlentities($_POST["texteActu"]);
}
// Si il n'y as pas de photo
if (!isset($_FILES["fileToUpload"]) || $_FILES["fileToUpload"]['error'] == 4) {
    $requete = "INSERT INTO actualite (uploadeur, titre, cheminphoto, date, texte, photo) VALUES (" . $connectedID . ",\"" . $titre . "\", \"\", " . time() . ",\"" . $texte . "\", false);";
    $rs = mysql_query($requete) or die (mysql_error());
    echo "<script>document.location = '../actualite.php?result=0';</script>";
    exit();
}

$target_dir = "../uploadedImg/";
$name = "";
    
$err_code = 0;
$uploadOk = 1;
$imageFileType = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
    
// vérifie si l'image est bien une image
if (isset($_POST["submit"])) { 
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $err_code = 1; // File is not an image
        $uploadOk = 0;
    }
}
    
// On vérifie la taille de l'image
if ($_FILES["fileToUpload"]["size"] > 5120000) {
    $err_code = 2; // Sorry, your file is too large
    $uploadOk = 0;
}

// On vérifie le formmat de l'image
if(strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg"
&& strtolower($imageFileType) != "gif" ) {
    $err_code = 3; // Sorry, only JPG, JPEG, PNG & GIF files are allowed
    $uploadOk = 0;
}
    
// Vérifie si il y a une erreur ou non
if ($uploadOk == 0) {
// Si tout va bien on essaye d'uploader l'image
} else {
    // On crée un nom de fichier unique
    do {
        $name = generateRandomString(15);
        $requete = "SELECT id FROM actualite WHERE cheminphoto = '" . $name . "'";
        $rs = mysql_query($requete) or die (mysql_error());
    } while (mysql_numrows($rs) > 0);
    
    $target_file = $target_dir . $name . "." . $imageFileType;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $requete = "INSERT INTO actualite (uploadeur, titre, cheminphoto, date, texte, photo) VALUES (" . $connectedID . ",\"" . $titre . "\", \"" . $name . "." . $imageFileType . "\", " . time() . ",\"" . $texte . "\", true);";
        $rs = mysql_query($requete) or die (mysql_error());   
    } else {
        $err_code = 4; // Sorry, there was an error uploading your file
    }
}
    
echo "<script>document.location = '../actualite.php?result=" . $err_code . "';</script>";
    
?>