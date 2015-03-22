<?php

	$bname	= $_POST['bandName'];
	$newbname	= $_POST['newbandName'];
	$hotel	= $_POST['hotel'];
	$stage	= $_POST['stage'];
	$date	= $_POST['perfDate'];
	$time	= $_POST['perfTime'];
	$note	= $_POST['note'];
	$contEm	= $_POST['contactEmail'];

	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	
	//what you need to log.
	require_once($_SERVER['DOCUMENT_ROOT']."/includes/KLogger.php");
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	//get the band ID
	$query = "select bandID from band where bandName = '$bname'" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	while($row = $result->fetch_assoc())
		$bid=$row['bandID'];
	
	
	$query = "update band set bandName='$newbname', hotel='$hotel', stage='$stage', perfDate='$date', perfTime='$time', note='$note', contactEmail='$contEm' where bandID = $bid";
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	//rollback changes on fail
	if(!$db->commit())
		$db->rollback();
	else
		echo "Band Updated";

?>
