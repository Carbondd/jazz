<?php

$cName	= $_POST['contactName'];
$bName	= $_POST['bandName'];

$cName=trim($cName);
$bName=trim($bName);
//echo $cName;
//echo $bName;

//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/KLogger.php');
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	$query = "select bandID from band where bandName = '$bName'" or die("Error in the query");
	//echo $query;
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		$id=$row['bandID'];
				
	}
	//echo $id;
	
	$query = "select contactID from contact where contactName = '$cName' and bandID=$id" or die("Error in the query");
	//echo $query;
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		$cid=$row['contactID'];
				
	}
	//echo $cid;
	
    $query = "delete from tripContact where contactID = $cid" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	
	$query = "delete from contact where contactID=$cid" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
		

	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Deleting contact $cid failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Contact Deleted";
	}
?>
