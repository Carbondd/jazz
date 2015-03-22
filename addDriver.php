<?php


	$dName	= $_POST['addname'];
	$dphone	= $_POST['addphone'];
	$dvehicle	= $_POST['addvehicle'];
	$dlicense	= $_POST['addlicense'];

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/KLogger.php');
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
		
	$query = "insert into driver (name, phone, vehicleName, licenseNum) values ('$dName', '$dphone', '$dvehicle', '$dlicense')" or die("Error in the query"); 
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Adding Drivers $dName failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Driver Added";
	}//////
	
?>
