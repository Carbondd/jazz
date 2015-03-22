<?
	//post variables
	$date = $_POST['tripDate'];
	$puLoc = $_POST['addPULocation'];
	$doLoc = $_POST['addDOLocation'];
	$fpu = $_POST['addFlightNo'];
	$fdo = $_POST['dropOffFlightNo'];
	$dur = $_POST['duration'];
	$bandName = $_POST['bandName']; //need to get bandID
	$driver = $_POST['name']; //need to get driverID
	$vehicle = $_POST['vehicleName']; //need to get vehicleID
	$pax = $_POST['numOfPax'];
	$notes = $_POST['tripNotes'];
	$puTime = $_POST['pickUpTime'];
	
	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/includes/KLogger.php");
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	//IMPORTANT! Need to get band ID, DriverID, vehicleID
	//IMPORTNAT: Get the band ID
	//DRIVERS SHOULD BE LOADED VIA ID!
	$query = "select bandID from band where bandName='$bandName'";
	try{$result=$db->query($query);}catch(Exception $e){return false;}

	while($row = $result->fetch_assoc()){
		//get the trip id
		$bandID = $row['bandID'];	
	}

	$query = "select driverID from driver where driverID='$driver'";
	try{$result=$db->query($query);}catch(Exception $e){return false;}

	while($row = $result->fetch_assoc()){
		$driverID = $row['driverID'];	
	}
	//echo $query."\n";
	$query = "select vehicleID from vehicle where vehicleName='$vehicle'";
	try{$result=$db->query($query);}catch(Exception $e){return false;}

	while($row = $result->fetch_assoc()){
		//get the trip id
		$vehicleID = $row['vehicleID'];	
	}
	

	//insert the trip
	$query = "insert into trip(tripID,tripDate,numOfPax,duration,pickUpTime,pickUp,flightPU,dropOff,flightDO, bandID,driverID,vehicleID,tripNotes) values('','$date',$pax,$dur,'$puTime','$puLoc','$fpu','$doLoc','$fdo',$bandID,$driver,$vehicleID,'$notes')";
	//echo $query."\n";
	try{$db->query($query);}catch(Exception $e){return false;}

	
	//foreach loop going into tripContact table
	foreach($contacts as $contact){
		//this will handle putting contacts into the tripContact table
		//first get ID of the given contact according to name and band
		$query = "select * from contact where contactName='$contact' AND bandID='$bandID'";
		try{$result=$db->query($query);}catch(Exception $e){print('failed'); /*exit;*/}	//take exit; out so rollback can be done
		
		while($row = $result->fetch_assoc()){ 
			//get the trip id
			$contactID = $row['contactID'];	
		}		
		$query = "insert into tripContact(tripID,contactID) values('$tripID', '$contactID');";
		try{$result=$db->query($query);}catch(Exception $e){print('failed'); /*exit;*/}	

	}
	
	//rollback changes on fail
	if(!$db->commit()){
		$log->LogError("Processing Run: $tripID failed... Rolling Back");
		$db->rollback();
	}
	else{
		echo "Run Processed";
	}

?>