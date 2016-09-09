<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>formulaire de creation des tournées :</title>
</head>
<body>

<?php 

//je me connecte a la DB :
	include 'connectAD.php';
//stockage de variable :
	$TRNNUM=trim($_GET['TRNNUM']);
//operations diverses :
echo $TRNNUM;
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
?>


<form id='formulaire' action='AC12_Insert_ModifTournee.php' method='get'>
	<fieldset>

<?php 
	echo "<label> Date : </label>
			<br/>
				<input name='date' id='date' type='datetime-local' min=$date>
				";?>
			<p>Noms des chauffeurs : 
			<br/>
			<select name='chfnom'>
			
<?php 
	//champs du lieu :		
	for ($i=0;$i<=count($tablenom);$i++){
		$chfnom = $tablenom[$i];
		$chfprenom = $tableprenom[$i];
		echo "<option value='".$chfnom."'>".$chfnom."</option>";
	}
?>
		</select> <br/> </p>	
			
		<p>Immat des vehicules : 
		<br/>
			<select name='immat'>
	
<?php 
	//champs du lieu :		
	for ($i=0;$i<=count($tableimmat);$i++){
		$vehimmat = $tableimmat[$i];
		echo "<option value='".$vehimmat."'>".$vehimmat."</option>";
	}
	
?>
</select> <br/> </p>
			<label> heure de prise en charge : </label>
		<br/>
			<input name="heurepec" id="heurepec" type="datetime" value="<?php echo date("d-m-Y H:i:s");?>" 	 disabled>

		<br/>
		<br/>
			<label> commentaire pour la tournée : </label>
		<br/>
			<textarea name='commentaire'> </textarea>
		<br/>
			<input name='trnnum' id='trnnum' type=hidden value=<?php echo $TRNNUM; ?> >
	
	<input name='reset' id='reset' type='reset' size=50>
			<input name='envoyer' id='envoyer' type='submit' size=50 value='Modifier'>
		<br/>
		
		<br/>
		
	</fieldset>
</form>

	
	
	<?php 
		$sql="select LIEUNOM,lieu.LIEUID, ETPID from etape,lieu where etape.lieuid=lieu.lieuid and trnnum=".$TRNNUM." order by ETPHREMIN;";
		$result=tableSQL($sql);
		$num_rows = compteSQL($sql);
		
	if ($num_rows != 0){
		echo "<fieldset>
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
		echo "</fieldset>";
	}	
	
	
	
		
		echo "<a href='AC13_Etapes.php?TRNNUM=".$TRNNUM."'> <input name='ajouter' id='ajouter' type='button' size=50 value='ajouter une etape'> </a> ";
?>
</body>
</html>