<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();

	//needed to find driver ID
	$tdate = ($_POST['tripDate']);  
	//echo $tdate;
	//setup an array to hold the driver info
	$driverinfo = array();
	
    $query = "select tripDate, pickUpTime, duration, trip.driverID, name, addtime(TRIM(Concat(tripDate, ' ', pickUpTime)),SEC_TO_TIME( MOD( duration *60, 86400 ))) as availableTime, DATE(addtime(TRIM(Concat(tripDate, ' ', pickUpTime)),SEC_TO_TIME( MOD( duration *60, 86400 )))) as availableDate
from trip, driver
where trip.driverID=driver.driverID and tripDate='$tdate'
order by tripDate, pickUpTime";

	//echo $query;

	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	$i = 0;
	while($row = $result->fetch_assoc()){
		//put all of the rows into the driverinfo array 
		$driverinfo[] = ($row);
		$i++;
	}

	// now all the rows have been fetched, it can be encoded

	echo json_encode($driverinfo);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
