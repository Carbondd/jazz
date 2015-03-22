<?php

$bName	= $_POST['bandName'];

//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/KLogger.php');
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	$query = "select bandID from band where bandName = '$bName'" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		$bid=$row['bandID'];
				
	}
	
	$query = "delete from contact where bandID=$bid" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	$query = "delete from trip where bandID=$bid" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	$query = "delete from band where bandID=$bid" or die("Error in the query");
	//print($query);
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Deleting $bName failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Band Deleted";
	}

?>
