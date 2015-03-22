<? 	
	//web service to get all contacts for a certain band
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-location.php");
	$locations = new jazz_location();
	
	//load the locations database object and allocate to save in an array
	//to be encoded later

	$locations = $locations->get_location();
	$rows = array();

	while($row = $locations ->fetch_assoc()){
		$rows[] = array('location' => $row);
	}
	
	// now all the rows have been fetched, it can be encoded
        echo $rowes;
	echo json_encode($rows);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
