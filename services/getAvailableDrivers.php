<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	//needed to find trips with given date
	$tdate = ($_POST['tripDate']);
	
	$query = "select trip.driverID, name, pickUpTime, TIME(addtime(TRIM(Concat(tripDate, ' ', pickUpTime)),SEC_TO_TIME( MOD( duration *60, 86400 )))) as availableAsOf, DATE(addtime(TRIM(Concat(tripDate, ' ', pickUpTime)),SEC_TO_TIME( MOD( duration *60, 86400 )))) as availableOnDate 
from trip, driver
where trip.driverID=driver.driverID and tripDate='$tdate'
order by trip.driverID, pickUpTime";
	
	//$query = "select name from driver, trip where tripDate='$date' and trip.driverID=driver.driverID order by tripDate, pickUpTime";
	
	//$query2 = "select * FROM driver order by driver";	 	

	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	$rows = array();
	
	while($row = $result->fetch_assoc()){
		$rows[] = array('driver' => $row);
	}

	// now all the rows have been fetched, it can be encoded
	echo json_encode($rows);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
