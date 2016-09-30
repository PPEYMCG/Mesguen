<?php 
include 'connectAD.php';
$TRNNUM=trim($_GET['TRNNUM']);

$sql="delete from tournee where TRNNUM='".$TRNNUM."';";

executeSQL($sql);

echo "<meta http-equiv='refresh' 
		content='0;url=http://127.0.0.1/www/PPE%20Mesguen/AC11_OrganiserUneTourneeListe.php'>";





?>