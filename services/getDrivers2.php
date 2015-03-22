<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	//needed to find band ID
	$driver = ($_POST['driverID']);
	
	$query = "select * FROM driver WHERE driverID = $driver";		

	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	$rows = array();
	
	while($row = $result->fetch_assoc()){
		$rows[] = array('driver' => $row);
	}

	// now all the rows have been fetched, it can be encoded
	echo json_encode($rows);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
