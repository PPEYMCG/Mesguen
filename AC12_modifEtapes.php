<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
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
$sql="select lieunom from lieu;";
$result=tableSQL($sql);
foreach ($result as $row){
	$tablelieu[]=$row['lieunom'];
}
?>



<form id='formulaire' action='AC12_insert_modifEtape.php' method='get'>
	<fieldset>



		<p>lieu: 
		<br/>
			<select name='nomlieu'>
			<?php //champs de l'heure :		
				for ($i=0;$i<=count($tablelieu);$i++){
					$nomlieu = $tablelieu[$i];
					echo "<option value='".$nomlieu."' default='".$lieu."'>".$nomlieu."</option>";
				}
					echo "</select> <br/> </p>"; 
			?>
			</select>


		<br/>
		<br/>
			<label> Rendez-vous entre : </label>
		<br/>
			<input name="heuremin" id="heuremin" type="datetime-local">

		<br/>		
			<label> et : </label>		
		<br/>	
			<input name="heuremax" id="heuremax" type="datetime-local">



		<br/>
		<br/>
			<label> heure de prise en charge : </label>
		<br/>
			<input name="heurepec" id="heurepec" type="datetime" value="<?php echo date("d-m-Y H:i:s");?>" 	 disabled>



		<br/>
		<br/>
			<label> commentaire pour la tournée : </label>
		<br/>
			<textarea name='commentaire'> </textarea>
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