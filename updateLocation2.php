<?php

$lName		= $_POST['locationName'];
$loctype	= $_POST['locationType'];
$oldLName	= $_POST['oldLocation'];

//$lName = str_replace("+", " ", $lName);
//echo $lName;
//echo $loctype;
//echo $oldLName;

//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/KLogger.php');
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	$query = "select locationID from location where locationName = '$oldLName'" or die("Error in the query"); 
	//echo $query;
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	while ($row = $result->fetch_assoc()) {
		$lid=$row['locationID'];
				
	}
	
	$query = "update location set locationName='$lName', locationType='$loctype' where locationID=$lid" or die("Error in the query");
	//$result = $mysqli->query($query);
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Updating Location $oldLName - $lid to $lName failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Location Updated";
	}

?>
