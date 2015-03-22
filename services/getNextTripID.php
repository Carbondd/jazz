<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	
	$query = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'trip'";
	try{$result=$db->query($query);}catch(Exception $e){return false;}
	while($row = $result->fetch_assoc()){
		//get the trip id
		$nextTripID = $row['auto_increment'];	
	}
	

	echo $nextTripID;	
	//echo '{"1": "1", "2": "2"}'   
	
	
?>
