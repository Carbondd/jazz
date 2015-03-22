<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	
	$query = "SELECT max(bandID) FROM band";
	try{$result=$db->query($query);}catch(Exception $e){return false;}
	while($row = $result->fetch_assoc()){
		//get the trip id
		$id = $row[max(bandID)];	
	}
	

	echo json_encode($rows);	  
	
	
?>
