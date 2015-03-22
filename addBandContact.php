<?php


	$bName	= $_POST['bandName'];
	$hotel	= $_POST['locationName'];
	$stage	= $_POST['locName'];
	$date	= $_POST['newperfDate'];
	$time	= $_POST['newperfTime'];
	$note	= $_POST['not'];
	
	
	//echo $_POST['addBandName'];


	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/KLogger.php');
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	$query = "insert into band (bandName, hotel, stage, perfDate, perfTime, note) values ('$bName', '$hotel', '$stage', '$date', '$time', '$note')" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Adding Band $bName failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Band Added";
	}

?>
