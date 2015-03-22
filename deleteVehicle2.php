<?php

$vName	= $_POST['vehicleName'];
//echo $vName;

//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	$query = "select vehicleID from vehicle where vehicleName = '$vName'" or die("Error in the query");
	//echo $query;
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
		
	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		$vid=$row['vehicleID'];
				
	}

	
	$query = "delete from vehicle where vehicleID=$vid" or die("Error in the query");
	//echo $query;
	try{$result=$db->query($query);echo 'Vehicle Deleted';}catch(Exception $e){echo "There was an error loading data";}
	

?>
