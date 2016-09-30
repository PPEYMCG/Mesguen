<?php
	include "AccesDonnees.php";
	
	$ip=explode(".",$_SERVER['SERVER_ADDR']);

	switch ($ip[0]) {

		case 31 :
			//connexion à hostinger
			$host = "mysql.hostinger.fr";
			$user = "u156178435_mappc";
			$password = "P@ssword";
			$dbname = "u156178435_mappc";
			$port='3306';
			break;
		case 127 :
			//local
			$host = "127.0.0.1";
			$user = "root";
			$password = "";
			$dbname = "mesguen_appli_chauffeur";
			$port='3306';
			break;
		case 192 :
		
			
		default :
			exit ("Serveur non reconnu...");
			break;
	}
	
	$connexion=connexion($host,$port,$dbname,$user,$password);
	
	
	 if ($connexion) {
		echo "Connexion reussie<br />";
		echo "Base $dbname selectionnee... <br />";
		echo "Mode acces : $modeacces<br />";
	}
	

?>

