
<?php

$bid	= $_POST['bandID'];
$bName	= $_POST['bandName'];

//echo $bid;
//echo $bName;

//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	
	$query = "update band set bandName='$bName' where bandID=$bid" or die("Error in the query"); 
	try{$result=$db->query($query);echo 'Band Name Updated';}catch(Exception $e){echo "There was an error loading data";}
	

?>
