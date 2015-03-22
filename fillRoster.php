<?php

	$driver	= $_POST['name'];
	$rdate	= $_POST['runDate'];
	$stime	= $_POST['startTime'];
	$etime	= $_POST['endTime'];

	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	
	//what you need to log.
	require_once($_SERVER['DOCUMENT_ROOT']."/includes/KLogger.php");
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	//get the driver ID
	$query = "select driverID from driver where name = '$driver'" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	//echo $query;

	while($row = $result->fetch_assoc())
		$did=$row['driverID'];
	//echo $did;
	//see if this rundate exists for this driver
	
	$query = "select driverID from roster where driverID=$did and runDate = '$rdate'" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	//echo $query;
	$found=false;
	while($row = $result->fetch_assoc()){
		$did=$row['driverID'];
		$found=true;
	}
	
	if (!$found){
		$query = "insert into roster values ($did,'$rdate','$stime','$etime')" or die("Error in the query");
		//echo $query;
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	}
	else{
		$query = "update roster set startTime='$stime', endTime='$etime' where driverID=$did and runDate='$rdate'" or die("Error in the query");
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	}
	
	//rollback changes on fail
	if(!$db->commit())
		$db->rollback();
	else
		echo "Roster updated";

?>
