<!DOCTYPE html>
<html>
<head>

        <link rel="stylesheet" href="cssForm.css" />


</style>  
<meta charset="ISO-8859-1">
<title>formulaire de création des tournées :</title>
</head>
<body>

<div class="centrage" id="global">

<?php 

//je me connecte a la DB :
	
	include 'connectAD.php';

//stockage de variable :

	$TRNNUM=trim($_GET['TRNNUM']);

//operations diverses :

	//on recupere les informations de la tournée en cours de modification :
	
	$sql="SELECT trndte,chfnom,vehimmat,trncommentaire
	  FROM tournee,chauffeur
	  WHERE tournee.chfid = chauffeur.chfid
	  AND trnnum = '".$TRNNUM."';";
	
	$result=tableSQL($sql);
	foreach ($result as $row){
		$trndate=$row['trndte'];
		$chauffeur=$row['chfnom'];
		$immat=$row['vehimmat'];
		$commentaire=$row['trncommentaire'];
	}
	
		//on separe la date retournée en deux parties :
		
		$trndate2 = explode(' ', $trndate);
		$trndate3 = $trndate2[0] . "T" . $trndate2[1];
	
	//on recupere les noms et prenoms des chauffeurs ainsi que les immat de vehicule :
	
	$sql="select chfnom,chfprenom from chauffeur;";
	$result=tableSQL($sql);
	foreach ($result as $row){
		$tablenom[]=$row['chfnom'];
		$tableprenom[]=$row['chfprenom'];		
	}
		
		$sql="select vehimmat from vehicule;";
		$result=tableSQL($sql);
		
	foreach ($result as $row){
		$tableimmat[]=$row['vehimmat'];
	}
	
//initialisation du compteur pour l'affichage des differentes etapes de la tournée :
	
$compteur = 1;

$date = date("d-m-Y H:i:s");
 echo "coucou";
?>


<form id='formulaire' action='AC12_Insert_ModifTournee.php' method='get'>
	<fieldset>
	<div class="centrage" id="globalfieldset">
	
		<label> Date : </label> <br/>
			<input name='date' id='date' type='datetime-local' 
			<?php echo "min='$date' value='$trndate3' "; ?>>
	
		<p>Noms des chauffeurs : <br/>
		
		<select name='chfnom' style="width:100px;">
			
			<optgroup label="chfnom">
			
		<?php 
			//champs du lieu :		
			
			for ($i=0;$i<=count($tablenom);$i++){
				$chfnom = $tablenom[$i];
				$chfprenom = $tableprenom[$i];
				echo "<option value='".$chfnom."' ";
				
				if ($tablenom[$i]== $chauffeur){
					echo "selected='selected' ";
				}
			
				echo ">".$chfnom."</option>";
			}
		?>
			
			</optgroup>
		
		</select> <br/> </p>	
			
		<p>Immat des vehicules : <br/>
		
		<select name='immat' style="width:100px;">
		
			<optgroup label="vehimmat">
	
		<?php 
		
			//champs du lieu :		
			for ($i=0;$i<=count($tableimmat);$i++){
			$vehimmat = $tableimmat[$i];
			echo "<option value='".$vehimmat."'";
		
			if ($tableimmat[$i]== $immat){
				echo "selected='selected' ";
			}
		
			echo ">".$vehimmat."</option>";
			}
	
		?>
			
			</optgroup>
		
		</select> <br/> </p>
		
		
		<label> heure de prise en charge : </label> <br/>
		
		<input name="heurepec" id="heurepec" type="datetime" value="<?php echo date("d-m-Y H:i:s");?>" 	 disabled> <br/> <br/>


		<label> commentaire pour la tournée : </label> <br/>
		
		<textarea name='commentaire' style="width:200px;"> <?php echo $commentaire; ?> </textarea> <br/>
		
		
		<input name='trnnum' id='trnnum' type=hidden value=<?php echo $TRNNUM; ?> >
	
	
		<input name='reset' id='reset' type='reset' size=50>
		
		<input name='envoyer' id='envoyer' type='submit' size=50 value='Modifier'> <br/> <br/>

	</div>
	</fieldset>

</form>

	
	
	<?php 
		$sql="select LIEUNOM,lieu.LIEUID, ETPID from etape,lieu where etape.lieuid=lieu.lieuid and trnnum=".$TRNNUM." order by ETPHREMIN;";
		$result=tableSQL($sql);
		$num_rows = compteSQL($sql);
		
	if ($num_rows != 0){
		echo "<div>
		<fieldset>
		Etapes : <br/>";
		foreach ($result as $row){
			$lieu[]=$row['LIEUNOM'];
			$lieuid[]=$row['LIEUID'];
			$etpid[]=$row['ETPID'];
		}
		for ($i=0;$i<count($lieu);$i++){
			echo "<br/> <table cellspacing=1>
			<tr><td> $compteur <td/> 
			<td> ".$lieu[$i]. "<td/> 
			<td> <a href='AC12_supprimeEtapes.php?etpid=".$etpid[$i]."&TRNNUM=".$TRNNUM."'>  <img src=\"css/delete.png\" title=\"Supprimer\" /> </a> <td/> 
			<td>  <a href='AC12_modifEtapes.php?etpid=".$etpid[$i]."&TRNNUM=".$TRNNUM."'> <img src=\"css/edittitre16.png\" title=\"Modifier\" /> </a> <td/> 
			<tr/> <table/> <br/>";
		$compteur += 1
		;}
		echo "</fieldset> </div>";
	}	
	
	
	
		
		echo "<a href='AC13_Etapes.php?TRNNUM=".$TRNNUM."'> <input name='ajouter' id='ajouter' type='button' size=50 value='ajouter une etape'> </a> ";
?>

</div>

</body>
</html>