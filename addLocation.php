<?php


	$lName	= $_POST['addlocationName'];
	$lType	= $_POST['addlocationType'];
	
	echo $lName;
	echo $lType;  
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/KLogger.php');
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();

	
	$query = "insert into location (locationName, locationType) values ('$lName', '$lType')" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	//rollback changes on fail
	if(!$db->commit()){
		$db->rollback();
		$log->LogError("Adding Location $lName failed... Rolling Back");
	}
	else{
		echo "Location Added";
		$log->LogInfo("Location Added: $lName");
	}
?>
