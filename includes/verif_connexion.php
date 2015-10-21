<?php
$admin = 0;
$connect = false;
if(isset($_COOKIE["MonCookie"]))
	{
		$cook = $_COOKIE["MonCookie"];
		$requete = "SELECT id,Sid,expiration,login,admin from utilisateurs Where Sid='$cook'";
		$rs = mysql_query($requete) or die (mysql_error());
		$result = mysql_num_rows($rs);
		if($result>0)
		{
			while($data = mysql_fetch_array($rs))
			{
                                $connectedID = $data["id"];
				$Sid = $data['Sid'];
				$expiration = $data['expiration'];
				$pseudo = $data['login'];
                                $admin = $data["admin"];
				$Somme =  $expiration - time();
				if($Somme<0)
				{
					$connect = false;
				}
				else
				{
                                    $expiration = time() + ((60 * 60) * 24);
                                    $requete2 = "UPDATE utilisateurs SET expiration = '$expiration' WHERE Sid='$cook'";
                                    $rs2 = mysql_query($requete2) or die (mysql_error());
					$connect = true;
				}
			}
		}
		else
		{
			$connect = false;
		}
                    
                    
	}
	else
	{
		$connect = false;
	}
            
?>