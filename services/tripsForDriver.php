<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();


    //needed to find driver ID
	$driver= ($_POST['name']);
	$dt = ($_POST['tripDate']);
	
	//get the driverID
	$query = "select driverID from driver where name='$driver'";
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	while($row = $result->fetch_assoc())
		$did= $row['driverID'];

	//setup an array to hold the trips
	$trips = array();
	
    $query = "select * from trip, band, vehicle where trip.driverID=$did and tripDate='$dt' and trip.bandID=band.bandID and trip.vehicleID=vehicle.vehicleID order by tripDate, pickUpTime";
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
