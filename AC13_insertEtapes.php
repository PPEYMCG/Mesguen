<?php
include 'connectAD.php';


	echo "<br/>  insertion de données : <br/>";

	
//recup des variables :
		$nomlieu=trim($_GET['nomlieu']);
		
		$TRNNUM=trim($_GET['trnnum']);

		$heuremin=trim($_GET['heuremin']);

		$heuremax=trim($_GET['heuremax']);

		$commentaire=trim($_GET['commentaire']);


	
//recuperation des lieux et lieuid :
		$sql= "select LIEUID from lieu where LIEUNOM='".$nomlieu."'";
	echo $sql."<br/>";
		$result=tableSQL($sql);
		foreach ($result as $row){
		$lieuid=$row['LIEUID'];
	}


	
//recuperation du plus grand ETPID pour la tournée en question :
		$sql="select ETPID from etape where TRNNUM =".$TRNNUM."; ";
	echo $sql."<br/>";
		$result=tableSQL($sql);
		$num_rows =compteSQL($sql);
	if ($num_rows != 0){
		foreach ($result as $row){
			$arrayetpid[]=$row['ETPID'];
		}
		
		print_r($arrayetpid);	
		$etpid=max($arrayetpid)+1;
		echo "<br/>".$etpid."<br/>";
	}else {
	$etpid=trim(1);
}
	
//on valide l'information :
	echo $commentaire." ".$nomlieu." ".$heuremin." ".$heuremax."  	 <br/>";

	
//requete de remplissage de la table etape (partie AC13, donc incomplete) :
		$sql= "INSERT INTO etape(`TRNNUM`, `ETPID`, `LIEUID`, `ETPHREMIN`, `ETPHREMAX`, `ETPCOMMENTAIRE`) 
				VALUES (".$TRNNUM.",".$etpid.",".$lieuid.",'".$heuremin."','".$heuremax."','".$commentaire."');";
	echo $sql."<br/>";
		$result=executeSQL($sql);

	
	
//redirection vers la page de creation de tournée :	

	if ($result){
		echo "<meta http-equiv='refresh'content='0;url=/AC11_OrganiserUneTourneeListe.php'>";
	}
	//http://127.0.0.1/www/PPE%20Mesguen
?>