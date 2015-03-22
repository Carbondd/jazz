<? 
	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	//needed to find band ID
	$contact = ($_POST['contactID']);
	
	//get the band ID
	$query = "select * from contact where contactID='$contact'";
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	//setup an array to hold the trips
	$trips = array();
	
	while($row = $result->fetch_assoc())
		$trips[] = $row;

	echo json_encode($trips);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
