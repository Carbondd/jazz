<?php

$tid		= $_POST['tripID'];
$cid		= $_POST['contactID'];

echo($tid);
echo($cid);


//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	$query = "delete from tripContact where tripID=$tid and contactID=$cid" or die("Error in the query");
	//echo($query);
	try{$result=$db->query($query);echo 'Contact dropped from run';}catch(Exception $e){echo "There was an error loading data";}
	

?>
