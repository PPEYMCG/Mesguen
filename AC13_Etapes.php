<?php 
//je me connecte a la DB :
include 'connectAD.php';
//stockage de variable :
$TRNNUM=trim($_GET['TRNNUM']);

//operations diverses :
$sql="select lieunom from lieu;";
$result=tableSQL($sql);
foreach ($result as $row){
	$tablelieu[]=$row['lieunom'];
}
?>



<form id='formulaire' action='AC13_insertEtapes.php' method='get'>
	<fieldset>



		<p>lieu: 
		<br/>
			<select name='nomlieu'>
			<?php //champs de l'heure :		
				for ($i=0;$i<=count($tablelieu);$i++){
					$nomlieu = $tablelieu[$i];
					echo "<option value='".$nomlieu."'>".$nomlieu."</option>";
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
			<input name="heurepec" id="heurepec" type="datetime-local" disabled>



		<br/>
		<br/>
			<label> commentaire pour la tourn�e : </label>
		<br/>
			<textarea name='commentaire'> </textarea>
		<br/>


		<br/>
	</fieldset>
		<input name='trnnum' id='trnnum' type=hidden value=<?php echo $TRNNUM; ?> >
		
			<input name='reset' id='reset' type='reset' size=50>
			<input name='envoyer' id='envoyer' type='submit' size=50>
		<br/>

</form>