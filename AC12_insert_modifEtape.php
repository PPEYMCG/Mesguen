<?php
include 'connectAD.php';
$trnnum = 1;

$etpid=trim($_GET['etpid']);

$TRNNUM=trim($_GET['trnnum']);

$nomlieu=trim($_GET['nomlieu']);

$heuremin=trim($_GET['heuremin']);

$heuremax=trim($_GET['heuremax']);

$commentaire=trim($_GET['commentaire']);

$result = tableSQL("select lieuid from lieu where lieunom='".$nomlieu."';");
foreach ($result as $row){
	$lieuid=$row['lieuid'];
}
$sql="UPDATE `etape` SET `LIEUID`='".$lieuid."',`ETPHREMIN`='".$heuremin."',`ETPHREMAX`='".$heuremax."',`ETPCOMMENTAIRE`='".$commentaire."'
	  WHERE trnnum=".$TRNNUM." and etpid=".$etpid.";";

executeSQL($sql);

if ($result){
	echo "<meta http-equiv='refresh' 
		   content='0;url=/AC11_OrganiserUneTourneeListe.php'>";
}
//http://127.0.0.1/www/PPE%20Mesguen

?>
