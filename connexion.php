    
<?php

        include("includes/connexion_inc.php");

        $resp = Array();
            
	if(isset($_POST['login']))
	{
		$login = htmlentities($_POST['login']);
		if(isset($_POST['mdp']))
		{
			$mdp = md5($_POST['mdp']);
			$requete = "SELECT login,mdp from utilisateurs Where login='$login' and mdp='$mdp'";
			$rs = mysql_query($requete) or die (mysql_error());
			$result = mysql_num_rows($rs);
			if($result>0)
			{
				$Sid = md5($login . time()); // Generation de l'id
				$expiration = time() + ((60 * 60) * 24); // 24h de cookie
				$requete = "UPDATE utilisateurs SET Sid='$Sid',expiration='$expiration' WHERE login='$login'";
				$rs = mysql_query($requete) or die (mysql_error());
				if(setcookie("MonCookie",$Sid,$expiration))
				{
					$_SESSION['connexion'] = 'connect';
					$resp["result"] = true;
                                        echo json_encode($resp);
                                        exit();    
				}
				else
				{
					$_SESSION['connexion'] = 'erreur_Cookie';
                                        $resp["result"] = false;
                                        echo json_encode($resp);
                                        exit();
				}
			}
			else
			{
                            
				$_SESSION['connexion'] = 'invalid_set';
                                $resp["result"] = false;
                                echo json_encode($resp);
                                exit();
			}
		}
	} else {
            $resp["result"] = false;
            echo json_encode($resp);
            exit();
        }
            
?>