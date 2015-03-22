<?php
	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();

	echo("<option>--Location Name --</option>");
	//select all of the locations
	$query = "SELECT locationName FROM location" or die("Error in the consult..");
	//echo $query;
	//echo("<option>--Location 2 Name --</option>");
	//exexute
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	while($row = mysqli_fetch_array($result)) {
	  echo("<option>".$row['locationName'] ."</option>");
	} 

?>