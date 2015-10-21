<?php

include("connexion_inc.php");

$resp = Array();

if(isset($_COOKIE["MonCookie"]))
{
    $cook = $_COOKIE["MonCookie"];
    $requete = "UPDATE utilisateurs SET Sid = '', expiration='0' Where Sid='$cook'";
    $rs = mysql_query($requete) or die (mysql_error());
    unset($_COOKIE["MonCookie"]);                    
}
            
$resp["result"] = true;
echo json_encode($resp);
exit();