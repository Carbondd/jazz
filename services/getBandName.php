<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();

	//needed to find band ID
	$tid = ($_POST['tripID']);
	
	//get the band ID
	$query = "select bandID from trip where tripID=$tid";
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	while($row = $result->fetch_assoc())
		$bid = $row['bandID'];
	
	//setup an array to hold the band
	$bandname = array();
	
    $query = "select bandName from band where bandID=$bid";
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	$i = 0;
	while($row = $result->fetch_assoc())
		//put all of the rows into the band array
		$bandname[] = $row['bandName'];
	

	// now all the rows have been fetched, it can be encoded

	echo json_encode($bandname);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
