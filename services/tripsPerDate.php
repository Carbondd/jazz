<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	$dt = ($_POST['tripDate']);

	//setup an array to hold the trips
	$trips = array();
	
	$query = "select * from trip, band, driver, vehicle where tripDate='$dt' and trip.bandID=band.bandID and trip.driverID=driver.driverID and trip.vehicleID=vehicle.vehicleID order by tripDate, pickUpTime";
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
