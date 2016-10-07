<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
        <link rel="stylesheet" href="cssForm.css" />

<title>Insert title here</title>
</head>
<body>
<?php 
//je me connecte a la DB :
include 'connectAD.php';
//stockage de variable :
$etpid=trim($_GET['etpid']);
$TRNNUM=trim($_GET['TRNNUM']);
echo $etpid;

//operations diverses :

	//on recupere les informations de la tournée en cours de modification :

	$sql="select lieunom from lieu;";
	$result=tableSQL($sql);
	foreach ($result as $row){
		$tablelieu[]=$row['lieunom'];
	}

	$sql="SELECT lieunom,etphremin,etphremax, etpcommentaire
		FROM etape,lieu 
		WHERE etape.lieuid = lieu.lieuid
		AND trnnum='".$TRNNUM."'
		AND etpid='".$etpid."'
	  	;";
	$result=tableSQL($sql);
	foreach ($result as $row){
		$lieu=$row['lieunom'];
		$hremin=$row['etphremin'];
		$hremax=$row['etphremax'];
		$commentaire=$row['etpcommentaire'];
	}

	//on modifie le format de la date pour pouvoir l'inserer dans le champ datetime-local plus bas :
	
	$hreminmodif = str_replace(' ', 'T', $hremin);
	$hremaxmodif = str_replace(' ', 'T', $hremax);

?>



<form id='formulaire' action='AC12_insert_modifEtape.php' method='get'>
	<fieldset>



		<p>lieu: 
		<br/>
			<select name='nomlieu' style="width:220px;">
			<?php //champs de l'heure :		
				for ($i=0;$i<=count($tablelieu)-1;$i++){
					$nomlieu = $tablelieu[$i];
					echo "<option value='".$nomlieu."'";
					
					if ($tablelieu[$i]== $lieu){
						echo "selected='selected' ";
					}
		
					echo ">".$nomlieu."</option>";
				}
					?>
					
			</select> <br/> </p>

 		<br/>
		<br/>
			<label> Rendez-vous entre : </label>
		<br/>
			<input name="heuremin" id="heuremin" type="datetime-local" <?php echo "value='$hreminmodif' "; ?>>

		<br/>		
			<label> et : </label>		
		<br/>	
			<input name="heuremax" id="heuremax" type="datetime-local" <?php echo "value='$hremaxmodif' "; ?>>



		<br/>
		<br/>
			<label> heure de prise en charge : </label>
		<br/>
			<input name="heurepec" id="heurepec" type="datetime" value="<?php echo date("d-m-Y H:i:s");?>" 	 disabled>



		<br/>
		<br/>
			<label> commentaire pour la tournée : </label>
		<br/>
			<textarea name='commentaire'> <?php echo $commentaire; ?> </textarea>
		<br/>


		<br/>
		<input name='etpid' id='etpid' type=hidden value=<?php echo $etpid; ?> >
	</fieldset>
		
		<input name='trnnum' id='trnnum' type=hidden value=<?php echo $TRNNUM; ?> >
			<input name='reset' id='reset' type='reset' size=50>
			<input name='envoyer' id='envoyer' type='submit' size=50>
		<br/>

</form>


</body>
</html>