<?php
include 'connectAD.php';


echo "<br/>  insertion de données : <br/> <br/>";


//recup des variables :
$date=trim($_GET['date']);

$TRNNUM=trim($_GET['trnnum']);

$chfnom=trim($_GET['chfnom']);
echo $chfnom."<br/>";

$immat=trim($_GET['immat']);

$commentaire=trim($_GET['commentaire']);

	
$sql= "select CHFID from chauffeur where chfnom='".$chfnom."';";
echo $sql."<br/>";
$result=tableSQL($sql);
foreach ($result as $row){
		$chfid[]=$row['CHFID'];
	}
	print_r ($chfid);
	
	//on valide l'information :
	echo $commentaire." / ".$date." / ".$chfnom." / ".$immat." / ".$chfid[0]."	 <br/>";


	//requete de remplissage de la table tournée (partie AC12, donc incomplete) :
	$sql= "UPDATE tournee SET 
			`VEHIMMAT`='".$immat."',
			`CHFID`=".$chfid[0].",
			`TRNCOMMENTAIRE`='".$commentaire."',
			`TRNPECCHAUFFEUR`= null,
			`TRNDTE`='".$date."'
			WHERE TRNNUM=".$TRNNUM.";";
	echo $sql."<br/>";
	$result= executeSQL($sql);



	//redirection vers la page de creation de tournée :

	if ($result){
		echo "<meta http-equiv='refresh' 
		   content='0;url=/AC11_OrganiserUneTourneeListe.php'>";
	}
	
	//http://127.0.0.1/www/PPE%20Mesguen
	?>