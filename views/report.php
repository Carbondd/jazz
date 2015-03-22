<? 
	//list of report given a trip id 
	require_once($_SERVER['DOCUMENT_ROOT']."/elements/above-content.php"); 
	error_reporting(E_ALL);
	//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
	
	//needed to find band ID
	$trip = ($_GET['tripID']);
	
	//get all of the elements of the query for the report
	$query = "select trip.tripDate, trip.numOfPax, trip.pickUp, trip.pickUpTime, trip.atPULocation, trip.atDOLocation, trip.dropOff, vehicle.vehicleName, driver.name, band.note, band.bandName from band, trip, vehicle, driver where band.bandID=trip.bandID and trip.vehicleID=vehicle.vehicleID and driver.driverID=trip.driverID and trip.tripID = '$trip'";
	
	//try to run the query
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	//save vars 
	while($row = $result->fetch_assoc()):
		$date = $row['tripDate'];
		$dropOff = $row['dropOff'];
		$pickUp = $row['pickUp'];
		$pickUpTm = $row['pickUpTime'];
		$dropOffLoc = $row['atDOLocation'];
		$bandName = $row['bandName'];
		$numPassengers = $row['numOfPax'];
	endwhile; 
	
	//get all of the contacts to show in report
	$query = "select * from tripContact, contact where contact.contactID = tripContact.contactID and tripID=$trip";
	
	//try to run the query
	try{$result2=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	//array to hold contact info
	$contacts = [];	
	$i = 0;
	
	//save vars via while loop
	while($row = $result2->fetch_assoc())
		$i++;
	endwhile; 	
?>
<style>

</style>
	<a href="/Reports.php"><button type='button' class='btn btn-primary'><span class="glyphicon glyphicon-backward"></span> Go back to reports</button></a>
	<button onClick="printDiv('printable')" type='button' class='btn btn-primary'><span class="glyphicon glyphicon-print"></span> Print Report</button>
	<div class="printable" id='printable'>
		<h2>Run Report #<? echo $trip; ?></h2>
		<table class="table table-striped table-condensed">
			<tr><td>Name:</td><td><? echo $bandName; ?></td></tr>
			<tr><td>Date:</td><td><? echo date('l, F j, Y', strtotime($date)); ?></td></tr>
			<tr><td>Pick up:</td><td><? echo $pickUp." - at ". date('g:i A', strtotime($pickUpTm)); ?></td></tr>
			<tr><td>Drop Off:</td><td><? echo $dropOff; ?></td></tr>
			<tr><td>Num of Passengers:</td><td><? echo $numPassengers; ?></td></tr>
			<tr><td>Duration:</td><td><? echo "min"; ?></td></tr>
		</table>
		

		<h2> Contacts </h2>
		<table class="table table-striped">
		<? 
		foreach($contacts as $contact): ?>
			<tr><td><? echo $contact[name]; ?></td><td><? echo $contact[phone];  ?></td></tr>
		<? endforeach; ?>
		</table>
	</div>
	
<script type='text/javascript'>
	function printDiv(divName) {
		 var printContents = document.getElementById(divName).innerHTML;
		 var originalContents = document.body.innerHTML;

		 document.body.innerHTML = printContents;
		 window.print();

		 document.body.innerHTML = originalContents;
	}
</script>
<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/below-content.php"); ?>

