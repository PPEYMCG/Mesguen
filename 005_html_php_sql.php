<?php
include 'connectAD.php';


echo "insertion de données : <br/>";

//recup des variables : 
$info=$_GET['info'];
//on valide l'information :
$info = trim($info);
if (strlen($info)!=0) {

$sql= "INSERT INTO test (numero, info) values (NULL, '".$info."');";
//$sql= "DELETE from TEST WHERE numero = '.$numero.'";
echo "sql" .$sql. "<br/>";


$result= mysql_query($sql);

if ($result)
		
		echo "<meta http-equiv='refresh' content='0;url=http://127.0.0.1/www/DB/formDB.php?message=<font color=green> Ajout realise </font>'>";
else 
	 echo "<meta http-equiv='refresh' content='0;url=http://127.0.0.1/www/DB/formDB.php?message=<font color=red> Probleme durant insertion... </font>'>";

}
else {echo "<meta http-equiv='refresh' content='0;url=http://127.0.0.1/www/DB/formDB.php?message=<font color=red> un des champs est vide, veuillez renseigner une valeur </font>'>";
;}
?>