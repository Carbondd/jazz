<? 
	//web service to get all contacts for a certain band
	error_reporting(E_ALL);
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-driver.php");
	$drivers = new jazz_driver();
	
	//load the contacts database object and allocate to save in an array
	//to be encoded later
	$drivers = $drivers->get_driver($_POST['name']);
	$rows = array();
	
	while($row = $drivers->fetch_assoc()){
		$rows[] = array('driver' => $row);
	}
	
	// now all the rows have been fetched, it can be encoded
	echo json_encode($rows);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
