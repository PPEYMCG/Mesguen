<?php
$dbname='mesguen_appli_chauffeur';
$link = mysql_connect("127.0.0.1", "root", "")
or die("Impossible de se connecter : " . mysql_error());
echo 'Connexion r�ussie';

echo "<br/>";

$connection = mysql_select_db($dbname)
or die("Impossible de se connecter : " . mysql_error());
echo "base $dbname connect�e";
?>