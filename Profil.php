    
    
<?php
include("includes/connexion_inc.php");
include("includes/verif_connexion.php");
    
$tab = array();
extract($_POST);
if(isset($_POST['nom']) && !empty($_POST['nom']))
{
	$name = htmlentities($_POST['nom']);
	$sql = "UPDATE utilisateurs set Nom='$name' WHERE login='" . $pseudo . "'";
	$query = mysql_query($sql) or die(mysql_error());
}
    
    
if(isset($_POST['prenom']) && !empty($_POST['prenom']))
{
	$prenom = htmlentities($_POST['prenom']);
	$sql = "UPDATE utilisateurs set Prenom='$prenom' WHERE login='" . $pseudo . "' ";
	$query = mysql_query($sql) or die(mysql_error());
	$tab["result"] = "valider";
}
    
if(isset($_POST['password']) && !empty($_POST['password']))
{
	$mdp =htmlentities($_POST['password']);
	$longMdp = strlen($mdp);
	if($longMdp<6)
	{
		$tab["result"] = "invalid_short";
	}
	else
	{
		$mdp = md5($mdp);
		$sql = "UPDATE utilisateurs set mdp='$mdp' WHERE login='" . $pseudo . "'";
		$query = mysql_query($sql) or die(mysql_error());
		if($query>0)
		{
			$tab["result"] = "valider";
		}
                    
	}
}
    
if(isset($_POST['ville']) && !empty($_POST['ville']))
{
    
		$ville = htmlentities($_POST['ville']);
		$sql = "UPDATE utilisateurs set ville='$ville' WHERE login='" . $pseudo . "'";
		$query = mysql_query($sql) or die(mysql_error());
		$tab["result"] = "valider";	
                    
}
    
if(isset($_POST['age']) && !empty($_POST['age']))
{
    
		$age = htmlentities($_POST['age']);
		$sql = "UPDATE utilisateurs set age='$age' WHERE login='" . $pseudo . "'";
		$query = mysql_query($sql) or die(mysql_error());
		$tab["result"] = "valider";	
                    
}
echo json_encode($tab);
?>