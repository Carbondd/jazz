<? 
	//web service to get all contacts for a certain band
	error_reporting(E_ALL);
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-vehicle.php");
	$vehicles = new jazz_vehicle();
	
	//load the locations database object and allocate to save in an array
	//to be encoded later

	$vehicles = $vehicles ->get_vehicle();
	$rows = array();

	while($row = $vehicles ->fetch_assoc()){
		$rows[] = array('vehicle' => $row);
	}
	
	// now all the rows have been fetched, it can be encoded
	echo json_encode($rows);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
