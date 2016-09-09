<?php 
include 'connectAD.php';
$etpid=trim($_GET['etpid']);
$TRNNUM=trim($_GET['TRNNUM']);
echo $etpid;

$sql="delete from etape where etpid='".$etpid."' and trnnum='".$TRNNUM."';";

executeSQL($sql);

echo "<meta http-equiv='refresh' 
		content='0;url=http://127.0.0.1/www/PPE%20Mesguen/AC11_OrganiserUneTourneeListe.php?
		AC12_ModifTournee.php?TRNNUM=".$TRNNUM."'>";





?>