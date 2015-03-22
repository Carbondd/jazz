<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	
	
	//get all distinguised trip dates

	//setup an array to hold the trips
	$dates= array();
	
	$query = "select * from trip group by tripDate";
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	$i = 0;
	while($row = $result->fetch_assoc()){
		$dates[] = ($row);
		$i++;
	}

	// now all the rows have been fetched, it can be encoded
        //echo $dates;
	echo json_encode($dates);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
