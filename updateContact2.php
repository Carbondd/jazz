<?php

$cid	= $_POST['contactID'];
$cName	= $_POST['contactName'];
$tmgr	= $_POST['typeMgr'];
$cPhone	= $_POST['contactPhone'];
$bName	= $_POST['bandName'];


	if(!(isset($cName)) || !(isset($tmgr)) || !(isset($cPhone)) || !(isset($bName)))
	{
		echo "Fill out all fields";
	}

	
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
		$bid=$row['bandID'];
				
	}

	
	$query = "update contact set contactName='$cName', typeMgr='$tmgr', contactPhone='$cPhone', bandID=$bid where contactID=$cid" or die("Error in the query"); 
	//echo $query;

	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Updating Contact $cName failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Contact Updated";
	}

?>