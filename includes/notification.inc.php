<?php
    
if(isset($_SESSION['inscription']))
{
	switch($_SESSION['inscription'])
	{
		case 'inscris':
			echo "<div class='alert alert-success' role='alert'>Vous avez été correctement enregistré !</div>";			
			break;
		case 'EmptyPseudo':		
			echo "<div class='alert alert-danger' role='alert'>Pseudo incorrect ! </div>";
			break;
		case 'EmptyPassword':
			echo "<div class='alert alert-danger' role='alert'>Pseudo incorrect ! </div>";
			break;
		case 'invalidMail':
			echo "<div class='alert alert-danger' role='alert'>Email incorrect ! </div>";
			break;
		case 'TropPetit':
			echo "<div class='alert alert-danger' role='alert'>Mot de passe trop court ! </div>";
			break;
		case 'erreur':
                    
			break;
		$_SESSION['inscription'] ='';
	}
}
    
if(isset($_SESSION['connexion']))
{
switch ($_SESSION['connexion']) {
	case 'connect':
	echo "laalalalal";
		echo "<div class='alert alert-success'> Vous êtes connecté ! </div>";
		break;
	case 'deconnexion':
		echo "<div class='alert alert-success'> Vous vous êtes déconnecté !/div>";
		break;
	case 'erreur_Cookie':
			echo  "<div class='alert alert-danger'> Erreur Cookie ! $croix</div>";
			break;
	case 'invalid_set':
			echo  "<br><br><div class='alert alert-danger'>Email ou mot de passe incorrect !  </div>";
			break;
	default:
		# code...
		break;
		$_SESSION['connexion'] ='';
	}
}
?>