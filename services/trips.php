<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	//needed to find band ID
	$band = ($_POST['bandName']);
	$bandID2 = $_POST['bandID'];
	
	
	//get the band ID
	$query = "select bandID from band where bandName='$band'";
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	while($row = $result->fetch_assoc())
		$bandID = $row['bandID'];

	//setup an array to hold the trips
	$trips = array();
	
	if($_POST['date'] != null && $_POST['bandName'] != null){
		$date = $_POST['date'];
		$query = "select * from trip, driver, vehicle where bandID=$bandID and tripDate='$date' and trip.driverID=driver.driverID and trip.vehicleID=vehicle.vehicleID order by tripDate, pickUpTime";		
	}else if($_POST['bandName'] == null){
		$date = $_POST['date'];
		$query = "select * from trip, driver, vehicle where tripDate='$date' and trip.driverID=driver.driverID and trip.vehicleID=vehicle.vehicleID order by tripDate, pickUpTime";
	}else
		$query = "select * from trip, driver, vehicle where bandID=$bandID and trip.driverID=driver.driverID and trip.vehicleID=vehicle.vehicleID order by tripDate, pickUpTime";

	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	$i = 0;
	while($row = $result->fetch_assoc()){
		//put all of the rows into the 2d trips array
		$trips[] = ($row);
		$i++;
	}

	// now all the rows have been fetched, it can be encoded
	echo json_encode($trips);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
