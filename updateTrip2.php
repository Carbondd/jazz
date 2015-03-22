<?php
	//echo "in updateTrip2";
	
	$bName = $_POST['bName'];
	$tid	= $_POST['tripID'];
	$tDate	= $_POST['tripDate'];
	$puTime	= $_POST['pickUpTime'];
	$pu	= $_POST['pickUp'];
	$do	= $_POST['dropOff'];
	$numpax	= $_POST['numOfPax'];
	$dur	= $_POST['duration'];
	$dName	= $_POST['name'];
	$vName	= $_POST['vehicleName'];
	$newnt	= $_POST['tripNotes'];
	$newdrnt	= $_POST['driverNotes'];
	$nwfpu	= $_POST['flightPU'];
	$nwfdo	= $_POST['flightDO'];
	$bID = $_POST['bID'];
	$status = $_POST['status'];

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/KLogger.php');
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	//needed to find band ID
	//$trip = ($_POST['tripID']);
	
	if ($bName=="")
		$bid = $bID;
	else
	{	
		//get the band ID
		$query = "select bandID from band where bandName = '$bName'" or die("Error in the query");
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

		while($row = $result->fetch_assoc())
			$bid=$row['bandID'];
	}
	
	
	//get driver name 
	$query = "select driverID from driver where name = '$dName'" or die("Error in the query" );
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		$did=$row['driverID'];
	}
	
	$query = "select vehicleID from vehicle where vehicleName = '$vName'" or die("Error in the query");
	//echo "driver - ". $query;
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	
	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		$vid=$row['vehicleID'];
		
	}	
	$query = "update trip set tripDate='$tDate', pickUpTime='$puTime', pickUp='$pu', flightPU='$nwfpu', dropOff='$do', flightDO='$nwfdo', numOfPax=$numpax, duration=$dur, driverID=$did, vehicleID=$vid, tripNotes='$newnt', driverNotes='$newdrnt', statusID='$status' where tripID=$tid";

	try{$result=$db->query($query);}catch(
		Exception $e){echo "There was an error loading data";	
		$log = new KLogger ( "/logs/log.txt" , KLogger::DEBUG );
 
		// Do database work that throws an exception
		$log->LogError("There was an error logging with. User: ".$_POST['user_name']);
	}
	
	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Updating Trip $tid failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Trip Updated.";
	}

		
?>