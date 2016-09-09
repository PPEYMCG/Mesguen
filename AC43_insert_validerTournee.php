<?php
include 'connectAD.php';


echo "<br/>  insertion de données : <br/> <br/>";


//recup de TOUTES les variables :
$arriver=trim($_GET['heurearrivee']);

$fin=trim($_GET['heurefin']);

$livrer=trim($_GET['livrer']);

$livrerEUR=trim($_GET['livrerEUR']);

$charger=trim($_GET['charger']);

$chargerEUR=trim($_GET['chargerEUR']);

$cheque=trim($_GET['cheque']);

$kms=trim($_GET['kms']);

$etat=trim($_GET['CONF']);

$commentaire=trim($_GET['commentaire']);

$lieu=trim($_GET['etpid']);

$TRNNUM=trim($_GET['TRNNUM']);

//tentative de gestion des erreurs :
/*
if ($arriver<$fin){
	echo "<meta http-equiv='refresh'content='0;url=AC43_validerTournee.php?message=<font color=red> probleme d'heure... </font>'>'>";
	die;
}

if ($livrer<$livrerEUR){
	echo "<meta http-equiv='refresh'content='0;url=AC43_validerTournee.php?message=<font color=red> probleme sur le nombre de palettes livrées... </font>'>''>";
	die;
}

if ($charger<$chargerEUR){
	echo "<meta http-equiv='refresh'content='0;url=AC43_validerTournee.php?message='probleme sur le nombre de palettes chargées...''>";
	die;
}
*/
//on valide l'information :
echo $commentaire." / ".$arriver." / ".$fin." / ".$livrer." / ".$livrerEUR."	/ ".$charger. " / ".$chargerEUR. "	/ ".$cheque. " / ".$kms. " / ".$lieu." <br/>";


//requete de modification/remplissage de l'etape :

$sql= "UPDATE `etape` 
		SET `ETPHREDEBUT`='".$arriver."',
		`ETPHREFIN`='".$fin."',
		`ETPNBPALLIV`='".$livrer."',
		`ETPNBPALLIVEUR`='".$livrerEUR."',
		`ETPNBPALCHARG`='".$charger."',
		`ETPNBPALCHARGEUR`='".$chargerEUR."',
		`ETPCHEQUE`='".$cheque."',
		`ETPETATLIV`='".$etat."',
		`ETPCOMMENTAIRE`='".$commentaire."',
		`ETPKM`='".$kms."'
		 WHERE TRNNUM=".$TRNNUM."
		 AND   ETPID=".$lieu.";";
echo $sql."<br/>";
$result= executeSQL($sql);



//redirection vers AC11 :

if ($result){
	echo "<meta http-equiv='refresh'content='0;url=AC11_OrganiserUneTourneeListe.php'>";
}


?>