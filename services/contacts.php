<? 
	//web service to get all contacts for a certain band
	error_reporting(E_ALL);
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-contact.php");
	$contacts = new jazz_contact();
	
	//load the contacts database object and allocate to save in an array
	//to be encoded later

	$contacts = $contacts->get_contact($_POST['bandName']);
	$rows = array();
	
	while($row = $contacts->fetch_assoc()){
		$rows[] = array('contact' => $row);
	}

	// now all the rows have been fetched, it can be encoded
	echo json_encode($rows);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
