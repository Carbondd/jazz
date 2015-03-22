<?

	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	
	//what you need to log.
	require_once($_SERVER['DOCUMENT_ROOT']."/includes/KLogger.php");
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();

	//needed to find band ID
	$bandID = ($_POST['bandID']);
	$name = ($_POST['name']);
	$phone = ($_POST['phone']);
	$type = ($_POST['type']);
	
	//get the band ID
	$query = "insert into contact values('null','$name', '$type', '$phone', '$bandID')";
	//echo $query;
	try{$result=$db->query($query); /* What you want to log*/$log->LogInfo("Contact: ".$name);}catch(Exception $e){echo "There was an error loading data";}

	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Adding Contact: $name failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Contact Deleted.";
	}

	// now all the rows have been fetched, it can be encoded 

	//echo json_encode($bandname);
 ?>