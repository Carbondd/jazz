<?php
	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
     
    if (isset($_GET['term'])){
		$return_arr = array();
		$query = "SELECT name FROM driver WHERE name LIKE '%".$_GET['term']."%'";		

		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

		while($row = $result->fetch_assoc()){
			$return_arr[] = $row['name'];
			
		}
		
     
     
     
		/* Toss back results as json encoded array. */
		echo json_encode($return_arr);
		return json_encode($return_arr);

    }
     
    ?>