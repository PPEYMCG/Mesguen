<?php
//stockage de variables / fonctions / autres :
function GeraHash($qtd){
	//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
	$Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ';
	$QuantitedeCaracteres = strlen($Caracteres);
	$QuantitedeCaracteres--;


	$Hash=NULL;
	for($x=1;$x<=$qtd;$x++){
		$Posicao = rand(0,$QuantitedeCaracteres);
		$Hash .= substr($Caracteres,$Posicao,1);
	}
	return $Hash;
}

function GeraHash2($qtd){
	//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
	$Caracteres2 = '0123456789';
	$QuantitedeCaracteres2 = strlen($Caracteres2);
	$QuantitedeCaracteres2--;


	$Hash=NULL;
	for($x=1;$x<=$qtd;$x++){
		$Posicao2 = rand(0,$QuantitedeCaracteres2);
		$Hash .= substr($Caracteres2,$Posicao2,1);
	}
	return $Hash;
}


set_time_limit(180);

$tablecode=file('GENERATEUR\code.txt');
$tablenom=file('GENERATEUR\nom.txt');


$tablecodeville = file('GENERATEUR\codeville.txt');
$tableville = file('GENERATEUR\nomvilles.txt');
$nbvilles=count($tableville);


$tableadresse=file('GENERATEUR\ADRESSE.txt');
$nblieus=count($tableadresse);


$tablemarques=file('GENERATEUR\marquesCamion.txt');



echo "<br/>";
// on se connecte à notre base
include 'connection.php';


//boucle for de remplissage de la premiere table...
for ($i=1;$i<50;$i++){
$garsoufille=rand(0,1);
if ($garsoufille=0) {
	$prenom=file('GENERATEUR\fille.txt');
					}
else 				{
	$prenom=file('GENERATEUR\garcon.txt');
					}

$code=trim($tablecode[$i]);
$nom=trim($tablenom[rand(0, 50)]);
$chainemail= trim($nom.$prenom[rand(1, 50)]);
$tabletel=array(0,6,rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),rand(0,9),);
$tel=trim(implode("", $tabletel));
$sql='INSERT INTO chauffeur (CHFID, CHFNOM, CHFPRENOM, CHFTEL, CHFMAIL)
					VALUES	("'.$i.'",
							 "'.$nom.'",
							 "'.trim($prenom[rand(1, 50)]).'",
							 "'.$tel.'",
							 "'.$chainemail.'@mesguen.fr")';

$req = mysql_query($sql)or die ('erreur sql!<br/>' .$sql. '<br/>' .mysql_error())							 		
;} 


//remplissage de la table commune :
for ($i=1;$i<$nbvilles;$i++){
	
	$ville=trim($tableville[$i]);
	$codeville=trim($i);
	$sql='insert into commune (VILID, VILNOM)
						VALUES("'.$codeville.'","'.$ville.'")';
	
	$req = mysql_query($sql)or die ('erreur sql!<br/>' .$sql. '<br/>' .mysql_error())
	
	;} 

//remplissage de la table lieu :
for ($i=1;$i<$nblieus;$i++) {
	
	$VILID=trim(rand(1,$nbvilles));
	$LIEUNOM=trim($tableadresse[$i]);
	$sql='insert into lieu (LIEUID,VILID,LIEUNOM,LIEUCOORDGPS)
						VALUES("'.$i.'","'.$VILID.'","'.$LIEUNOM.'","location inconnue")';

	$req = mysql_query($sql)or die ('erreur sql!<br/>' .$sql. '<br/>' .mysql_error())
	
;} 


//remplissage de la table vehicule :
for ($i=1;$i<50;$i++) {

$immatcamion=array(GeraHash(2),Gerahash2(3),GeraHash(2));
$immat=trim(implode("-", $immatcamion));
$marque=trim($tablemarques[rand(1,6)]);
$sql="insert into vehicule (VEHIMMAT, VEHNOM) VALUES('".$immat."','".$marque."')";


$req = mysql_query($sql)or die ('erreur sql!<br/>' .$sql. '<br/>' .mysql_error());
}

//mysql_close($link);
?>