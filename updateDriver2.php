<?php

//$did		= $_POST['driverID'];
$dname		= $_POST['name'];
$dphone		= $_POST['phone'];
$dvehicle	= $_POST['vehicleName'];
$dlicense	= $_POST['licenseNum'];


//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/KLogger.php');
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();

	$query = "select driverID from driver where name = '$dname'" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	while ($row = $result->fetch_assoc()) {
		$did=$row['driverID'];
				
	}

	
	$query = "update driver set name='$dname', phone='$dphone', vehicleName='$dvehicle', licenseNum='$dlicense' where driverID=$did" or die("Error in the query"); 
	//echo $query;
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Updating Driver $dName failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Driver Updated";
	}

?>
