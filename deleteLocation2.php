<?php

$lName	= $_POST['locationName'];

//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	$query = "select locationID from location where locationName = '$lName'" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		$lid=$row['locationID'];
				
	}


	$query = "delete from location where locationID=$lid" or die("Error in the query");
	//print($query);
	try{$result=$db->query($query);echo 'Location Deleted';}catch(Exception $e){echo "There was an error loading data";}
	

?>
