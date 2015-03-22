<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();

	//needed to find driver ID
	$bid = ($_POST['bandID']);  
	
	//setup an array to hold the band
	$band = array();
	
    $query = "select * from band where bandID=$bid";
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	$i = 0;
	while($row = $result->fetch_assoc()){
		//put all of the rows into the band array
		$band[] = ($row);
		$i++;
	}

	// now all the rows have been fetched, it can be encoded

	echo json_encode($band);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
