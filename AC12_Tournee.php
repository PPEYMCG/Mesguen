<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>formulaire de creation des tourn�es :</title>
</head>
<body>

<?php 

//je me connecte a la DB :
	include 'connectAD.php';
//stockage de variable :

//operations diverses :

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
//initialisation du compteur pour l'affichage des differentes etapes de la tourn�e :
		$compteur = 1;

		$date = date("d-m-Y H:i:s");
?>


<form id='formulaire' action='AC12_insertTournee.php' method='get'>
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
			<label> commentaire pour la tourn�e : </label>
		<br/>
			<textarea name='commentaire'> </textarea>
		<br/>

	<input name='reset' id='reset' type='reset' size=50>
			<input name='envoyer' id='envoyer' type='submit' size=50>
		<br/>
		
		<br/>
		
	</fieldset>
</form>


</body>
</html>