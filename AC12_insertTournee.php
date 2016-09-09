<?php
include 'connectAD.php';


echo "<br/>  insertion de données : <br/> <br/>";


//recup des variables :
$date=trim($_GET['date']);

$chfnom=trim($_GET['chfnom']);
echo $chfnom."<br/>";

$immat=trim($_GET['immat']);

$commentaire=trim($_GET['commentaire']);


//recuperation des lieux et lieuid :
$sql= "select TRNNUM from tournee;";
echo $sql."<br/>";
$result=tableSQL($sql);
$num_rows = compteSQL($sql);
if ($num_rows != 0)
{
	foreach ($result as $row){
		$trnnum[]=$row['TRNNUM'];
	}
	
	print_r($trnnum);
	$maxtrnnum=trim(max($trnnum)+1);
	echo "<br/>".$maxtrnnum."<br/>";
}else {
	$maxtrnnum=trim(1);
}
	
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
	$sql= "INSERT INTO tournee(`TRNNUM`, `VEHIMMAT`, `CHFID`, `TRNCOMMENTAIRE`, `TRNPECCHAUFFEUR`, `TRNDTE`)
				VALUES ($maxtrnnum,'".$immat."',".$chfid[0].",'".$commentaire."',null,'".$date."');";
	echo $sql."<br/>";
	$result= executeSQL($sql);



	//redirection vers la page de creation de tournée :

	if ($result){
		echo "<meta http-equiv='refresh' 
				content='0;url=http://127.0.0.1/www/PPE%20Mesguen/AC11_OrganiserUneTourneeListe.php'>";
	}
	

	?>