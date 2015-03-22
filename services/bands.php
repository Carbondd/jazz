<? 
	//web service to get all contacts for a certain band
	error_reporting(E_ALL);
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-band.php");
	$bands = new jazz_band();
	
	//load the contacts database object and allocate to save in an array
	//to be encoded later
	$bands = $bands->get_ID($_POST['bandName']);
	$rows = array();
	
	while($row = $bands->fetch_assoc()){
		$rows[] = array('band' => $row);
	}
	
	// now all the rows have been fetched, it can be encoded
	echo json_encode($rows);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
