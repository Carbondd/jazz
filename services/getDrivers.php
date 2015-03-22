<? 	
	//web service to get all drivers
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-getDriver.php");
	$getDrivers= new jazz_getDriver();
	
	//load the locations database object and allocate to save in an array
	//to be encoded later

	$getDrivers= $getDrivers->get_getDriver();
	$rows = array();

	while($row = $getDrivers->fetch_assoc()){
		$rows[] = array('driver' => $row);
	}
	
	// now all the rows have been fetched, it can be encoded
	echo json_encode($rows);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
