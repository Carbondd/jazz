<? 

	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();

	//needed to find trips with given date
	$tdate = ($_POST['tripDate']);
	
	//setup an array to hold the band
	$driver = array();
	
    $query = "select distinct(name), driver.driverID
from trip, driver
where name not in (select name from trip, driver where trip.driverID=driver.driverID and tripDate='$tdate') order by name;";

	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
	$i = 0;
	while($row = $result->fetch_assoc()){
		//put all of the rows into the band array
		//$driver[] = ($row);
		$driver[] = array('driver' => $row);
		$i++;
	}

	// now all the rows have been fetched, it can be encoded

	echo json_encode($driver);	
	//echo '{"1": "1", "2": "2"}'
	
	
?>
