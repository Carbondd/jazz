<?php

$dName	= $_POST['name'];
$dPhone	= $_POST['phone'];

//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	$query = "select driverID from driver where name = '$dName' and phone = '$dPhone'" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		$did=$row['driverID'];
				
	}


	$query = "delete from driver where driverID=$did" or die("Error in the query");
	//print($query);
	try{$result=$db->query($query);echo 'Driver Deleted';}catch(Exception $e){echo "There was an error loading data";}
	


?>
