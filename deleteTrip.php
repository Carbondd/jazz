<?php

$tid		= $_POST['tripID'];

//echo($tid);



	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/KLogger.php');
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	$query = "delete from trip where tripID=$tid" or die("Error in the query");
	//echo($query);
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Deleting Trip: $tid failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Trip Deleted.";
	}

?>
