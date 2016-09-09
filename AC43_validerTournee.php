<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="SI6_JavaScript/bibli_fonctions.js">
</script>
<!-- tentative de css... -->
<style> type='text/css'
	
	input.photos {
		background-image:url(css/iconephotoReduite.png);
		background-repeat:no-repeat;
		background-position:left;
	}	
	
	input, textarea, select, option {
 		background-color:#FFFFF3;
 	}
 
	input, textarea, select {
 		padding:3px;
 		border:1px solid #32CD32;
 		border-radius:5px;
 		width:200px;
 		box-shadow:1px 1px 1px #008000 inset;
 	}

 	fieldset {
 		padding:0 20px 20px 20px;
 		margin-bottom:10px;
 		border:1px solid #008000;
 		width : 35%;
 	}
 	
 	
</style>


<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<!-- passage en php pour recuperer les variables de la page precedente -->
<?php 
include 'connectAD.php';

$etpid=trim($_GET['etpid']);
$TRNNUM=trim($_GET['TRNNUM']);
$lieunom=trim($_GET['lieunom']);


?>

<!-- debut du formulaire -->
	<form id='validerTournee'  action='AC43_insert_validerTournee.php'  method=get>
	
		<fieldset>
		
		<!-- premiere partie : l'heure d'arrivée et de depart -->
		<div id='heureEtape'>
		arrivée sur l'etape : <?php echo $lieunom;?>
			<br/>
			<br/>
			
		<label for='heurearrivee'>le </label> <input name='heurearrivee' id='heurearrivee' type='datetime'> (A-M-J H:M) 
			<br/>
			<br/>
		Fin de l'etape : <br/>
		<label for='heurefin'>le </label> <input name='heurefin' id='heurefin' type='datetime'> (A-M-J H:M) 
		</div>
			<br/>
			<br/>
		
		<!-- deuxieme partie : gestion des palettes -->
		<div id='palettes'>
		Palette(s) :
			<br/>
		<label for='livrer'>Livrées :</label>  &nbsp;&nbsp; <input name='livrer' id='livrer' type='text' value=0 size=5 onkeypress="return isNumberKey (event)" />  &nbsp;&nbsp; 
		
		<label for='livrerEUR'>dont EUR :</label> <input name='livrerEUR' id='livrerEUR' type='text' value=0 size=5 onkeypress="return isNumberKey (event)" />
			<br/>
			<br/>
		
		<label for='charger'>Chargées :</label> <input name='charger' id='charger' type='text' value=0 size=5 onkeypress="return isNumberKey (event)" />  &nbsp;&nbsp; 
		
		<label for='chargerEUR'>dont EUR :</label> <input name='chargerEUR' id='chergerEUR' type='text' value=0 size=5 onkeypress="return isNumberKey (event)" />
			<br/>
			<br/>
		
		<!-- troisieme partie : gestion des cheques, du compteur et du commentaire -->
		<label for='cheque'>Cheque :</label> &nbsp;&nbsp; <input name='cheque' id='cheque' type='text' value=0 size=5 onkeypress="return isNumberKey (event)" />
			<br/>
			<br/>
		<label>Kms Compteur</label> <input name='kms' id='kms' type='text' onkeypress="return isNumberKey (event)" />
			<br/>
			<br/>
		Etat 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name='CONF'>
				<option value='CONFORME'>CONFORME</option>
				<option value='NONCONFORME'>NONCONFORME</option>
			</select>
		</div>
			<br/>
			<br/>
		
		<div id='commentaires'>
		
		<label for='commentaire'>Commentaire(s) : </label>
		<br/>
		<textarea rows="5" cols="20" name='commentaire' id='commentaire'></textarea>
		</div>
			<br/>
			<br/>
		
		<!-- ajout des champs hidden pour passer les variables non affichées a la page d'insertion, et boutons de photo, validation et retour -->
		<?php
		
		echo "<input name='TRNNUM' id='TRNNUM' type= hidden value='".$TRNNUM."' >";

		echo "<input name='etpid' id='etpid' type= hidden value='".$etpid."' >";
		
		?>
		<a href='AC11_OrganiserUneTourneeListe.php'> <input name='retour' id='retour' type='button' value='Retour' /> </a>
		
		<input name='photo' id='photo' type='button' value='prendre une photo' class='photos' />
		 
		<input name='valider' id='valider' type='submit' value='Valider'/> 
		</fieldset>
	
	</form>










</body>
</html>