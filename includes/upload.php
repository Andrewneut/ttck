<?php
    
include("connexion_inc.php");
include("verif_connexion.php");

if ($connect === false) {
    echo "<script>document.location = '../photos.php?result=666';</script>";
    exit();
}
    
function generateRandomString($length = 10) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

if (!isset($_POST["titrephoto"])) {
   $titre = " - ";
} else {
    $titre = htmlentities($_POST["titrephoto"]);
}

if (isset($_POST["tournoi"])) {
    $tournoi = $_POST["tournoi"];
    if ($tournoi != 0) {
        $tournoiBool = true;
    } else {
        $tournoiBool = false;
    }
} else {
    $tournoi = 0;
    $tournoiBool = false;
}

$target_dir = "../uploadedImg/";
$name = "";
    
$err_code = 0;
$uploadOk = 1;
$imageFileType = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
    
// vérifie si l'image a bien été envoyé
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
        $requete = "SELECT id FROM photo WHERE cheminphoto = '" . $name . "'";
        $rs = mysql_query($requete) or die (mysql_error());
    } while (mysql_numrows($rs) > 0);
    
    $target_file = $target_dir . $name . "." . $imageFileType;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $requete = "INSERT INTO photo (uploadeur, cheminphoto, titre, date, tournoi) VALUES (" . $connectedID . ", \"" . $name . "." . $imageFileType . "\", \"" . $titre . "\", " . time() . ", \"" . $tournoiBool . "\");";
        $rs = mysql_query($requete) or die (mysql_error());   
    } else {
        $err_code = 4; // Sorry, there was an error uploading your file
    }
}
    
echo "<script>document.location = '../photos.php?result=" . $err_code . "&tournoi=" . $tournoi . "';</script>"
    
?>