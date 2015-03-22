<?php


	$vName	= $_POST['addVehicleName'];
	//echo $vName;

//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	$query = "insert into vehicle (vehicleName) values ('$vName')" or die("Error in the query" . mysqli_error($mysqli));
	try{$result=$db->query($query);echo 'Vehicle Added';}catch(Exception $e){echo "There was an error loading data";}
	

?>
