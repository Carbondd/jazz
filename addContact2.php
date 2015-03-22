<?php


	$cName	= $_POST['addcontName'];
	$tmgr	= $_POST['addcontType'];
	$cPhone	= $_POST['addcontPhone'];
	$bName	= $_POST['bandName'];
	
	//echo $cName;
	//echo $tmgr;
	//echo $cPhone;
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
 
		
	$query = "insert into contact (contactName, typeMgr, contactPhone, bandID) values ('$cName', '$tmgr', '$cPhone', $id)" or die("Error in the query"); 
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Adding contact $cName failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Contact Added";
	}

?>
