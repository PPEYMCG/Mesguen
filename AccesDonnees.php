<?php
///////////// CONFIGURATION DE L'ACCES AUX DONNEES ////////////////////

// nom du moteur d'accès à la base : mysql - mysqli
$modeacces = "mysqli";

// enregistrement des logs de connexion : true false
$logcnx = FALSE;


//////////////////////////////////////////////////////////////////////



$mysql_data_type_hash = array(
		1=>'tinyint',
		2=>'smallint',
		3=>'int',
		4=>'float',
		5=>'double',
		7=>'timestamp',
		8=>'bigint',
		9=>'mediumint',
		10=>'date',
		11=>'time',
		12=>'datetime',
		13=>'year',
		16=>'bit',
		//252 is currently mapped to all text and blob types (MySQL 5.0.51a)
		252=>'blob',
		253=>'varchar',
		254=>'string',
		246=>'decimal'
);




function connexion($host,$port,$dbname,$user,$password) {
	
	global $modeacces, $logcnx, $connexion;
	

	
	if ($modeacces=="mysql") {
			
		@$link = mysql_connect("$host:$port", "$user", "$password");
		
		if (!$link) {
			
			$chaine = "Connexion PB - ".date("j M Y - G:i:s - ").$user." - ". mysql_error()."\r\n";	
			
		} else {
			
			@$connexion = mysql_select_db("$dbname");
			if (!$connexion) {
				$chaine = "Selection base PB - ".date("j M Y - G:i:s - ").$user." - ". mysql_error()."\r\n";	
			} else {
				$chaine = "Connexion OK - ".date("j M Y - G:i:s - ").$user."\r\n";	
			}
			
		}
		
		if ($logcnx)
			ecritFichier($chaine);
		else
			echo $chaine."<br />";		
		
		return $connexion;
		
	}

	
	if ($modeacces=="mysqli") {
		
		@$connexion = new mysqli("$host", "$user", "$password", "$dbname", $port);
		if ($connexion->connect_error) {
			
			$chaine = "Connexion PB - ".date("j M Y - G:i:s - ").$user." - ". $connexion->connect_error."\r\n";
			$connexion = FALSE;
			
		} else {
			
			 $chaine = "Connexion OK - ".date("j M Y - G:i:s - ").$user."\r\n";
			 
		}
		
		if ($logcnx)
			ecritFichier($chaine);
		else
			echo $chaine."<br />";		
		
		return $connexion;
	}		

}


function ecritFichier($uneChaine) {
	$handle=fopen("log.txt","a");
		fwrite($handle,$uneChaine);
	fclose($handle);
}



function deconnexion() {
	
	global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		mysql_close();
	}

	if ($modeacces=="mysqli") {
		$connexion->close();
	}

}




function executeSQL($sql) {

	global $modeacces, $connexion;

	if ($modeacces=="mysql") {
		$result = mysql_query($sql)		
		or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />
			 Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".
				mysql_error().
				"<br /><br />
				<b>REQUETE SQL : </b>$sql<br />");		
		return $result;
	}

	if ($modeacces=="mysqli") {
		$result = $connexion->query($sql)		
		or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />
			 Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".
				mysqli_error_list($connexion)[0]['error'].      //$mysqli->error_list;
				"<br /><br />
				<b>REQUETE SQL : </b>$sql<br />");				
		return $result;
	}
}




function compteSQL($sql) {

	global $modeacces, $connexion;
	
	$result = executeSQL($sql);

	if ($modeacces=="mysql") {
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}

	if ($modeacces=="mysqli") {
		$num_rows = $connexion->affected_rows;
		return $num_rows;
	}

}




function tableSQL($sql) {

	global $modeacces, $connexion;
	
	$result = executeSQL($sql);
	$rows=array();

	if ($modeacces=="mysql") {
		while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
			array_push($rows,$row);
		}
		return $rows;
	}

	if ($modeacces=="mysqli") {
		while ($row = $result->fetch_array(MYSQLI_BOTH)) {
			array_push($rows,$row);
		}
		return $rows;
	}

}




function champSQL($sql) {

	global $modeacces, $connexion;
	
	$result = executeSQL($sql);
	
	if ($modeacces=="mysql") {
		$rows = mysql_fetch_array($result, MYSQL_NUM);
		return $rows[0];
	}

	if ($modeacces=="mysqli") {
		$rows = $result->fetch_array(MYSQLI_NUM);
		return $rows[0];
	}

}




function nombrechamp($sql) {

	global $modeacces, $connexion;
	
	$result = executeSQL($sql);

	if ($modeacces=="mysql") {
		return mysql_num_fields($result);
	}

	if ($modeacces=="mysqli") {
		return  $result->field_count;
	}

}




function typechamp($sql, $field_offset) {

	global $modeacces, $connexion, $mysql_data_type_hash;

	$result = executeSQL($sql);
	
	if ($modeacces=="mysql") {
		return mysql_field_type($result, $field_offset);
	}

	if ($modeacces=="mysqli") {
		return  $mysql_data_type_hash[$result->fetch_field_direct($field_offset)->type];	
	}

}



?>
