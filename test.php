<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>test html</title>
</head>
<body>
<?php 

//je me connecte a la DB :
include 'connection.php';

//operations diverses :
$tablelieu=file('GENERATEUR\selectNomLieu.txt');

//print_r($tablelieu);

//je met en place un formulaire :
?>
<form id='formulaire' action='005_html_php_sql.php' method='get'>
<fieldset>
<label> commentaire pour la tournée : </label>
<br/>
<textarea> </textarea>
<br/>
<label> heure de rdv : </label>
<br/>
<input name='rdv' id='rdv' type='text' size=50>
<br/>
<label> lieu : </label>
<br/>
<select name='lieu' >
<?php 
for ($i;$i<count($tablelieu);$i++){
$nomlieu = $tablelieu[i];
 $nomlieu; ?>
<option value='<?php $nomlieu ?>'>'<?php $nomlieu ?></option>


</select>
<br/>
<label> heure de rdv : </label>
<br/>
<input name='rdv' id='rdv' type='text' size=50>
<br/>




</fieldset>
<input name='reset' id='reset' type='reset' size=50>
<input name='envoyer' id='envoyer' type='submit' size=50>
<br/>
</form>

</body>
</html>