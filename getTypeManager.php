<?php

//$group = $_POST["bandName"];
$contact=$_POST['contactName'];

$contact=trim($contact);

//echo $group+'\n';
//echo $contact;

//$group = 'Allen Toussaint';
//contact = 'Amadee Castenell';


//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();

	//select all of the vetss
	$query = "SELECT typeMgr FROM contact WHERE contactName = '$contact'" or die("Error in the query");
	//echo $query;
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	/* fetch associative array */
	while ($row = $result->fetch_assoc()) {
		$typemgr=$row['typeMgr'];
			
	}
	
	
	//echo json_encode($phone);
	//return json_encode($phone);
	
	//echo $typemgr;
	//return $typemgr;
	
	// take the square brackets and " quotes out, e.g. ["Allen Toussaint","Lee Ritenour"]. This becomes: Allen Tousaaint, Lee Ritenour
    //$list = json_decode($phone);
	//$comma_separated = implode(", ", $list);
	//print $comma_separated;
	//echo $comma_separated;
    //return $comma_separated;


	
?>