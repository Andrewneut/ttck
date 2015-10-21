<?php
include("includes/connexion_inc.php");
include('includes/verif_connexion.php');
$tab = array();


if($connect)
{
	extract($_POST);
	/**
	* Action : addMessage
	* Permet l'ajout du message
	*/
	$date = time();
	if($_POST['action']=="addMessage"){
		
		$message = mysql_real_escape_string($message);
		$sql = "INSERT INTO messages(pseudo,message,date) VALUES ('$pseudo','$message','$date')";
		mysql_query($sql) or die (mysql_error());
		$tab["erreur"] = "ok";
	}

	/**
	* Action : getMessage
	* Permet de récupérer les message
	*/
	if($_POST['action']=="getMessages"){
		
		$lastid = floor($lastid); // tronque un entier en cas de guillemet par ex,
		//$message = mysql_escape_string($message);
		$sql = "SELECT * from messages WHERE id>$lastid ORDER BY date ASC";
		$req = mysql_query($sql) or die (mysql_error());
		$tab["result"] = "";
		$tab["lastid"] = $lastid;
		while($data = mysql_fetch_assoc($req)){
			$tab["result"] .= "<p><strong>".$data['pseudo']." </strong> [<span style='font-size: 8pt;'>". date("d/m/Y H:i:s",$data['date']) . "</span>]: " . htmlentities($data['message'])."</p>";
			$tab["lastid"] = $data['id'];
		}	
		$tab["erreur"] = "ok";
	}	


	/**
	* Action : getConnected
	* Permet de récupérer les membres connecter
	*/
	if($_POST['action'] == "getConnected"){
		$now = time();
		$sql = "SELECT login from utilisateurs WHERE $now<expiration";
		$req = mysql_query($sql) or die (mysql_error());
		$tab["result"] = "Les personnes connectées : ";
		while($data = mysql_fetch_assoc($req)){
			$tab["result"] .= $data['login'].",";
		}
		$tab["result"] = substr($tab["result"],0,-1); // On vire la dernière virgule du dernier pseudo
		$tab["erreur"] = "ok";
	}


}
else
{
	$tab["erreur"] = "Vous devez etre connecté pour utilisé le tchat";
	header('location:index.php');
}

	echo json_encode($tab);