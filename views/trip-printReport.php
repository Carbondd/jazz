<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>New Orleans Jazz Festival | Auto-Schedule Software</title>
    <link rel="stylesheet" href="<? echo "../css/style.css"; ?>" />
    <link media='screen' rel="stylesheet" href="<? echo "../css/print.css"; ?>" />
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->    
    <link rel="stylesheet" href="jquery-ui.min.css" type="text/css" /> 
	<link media='screen' rel="stylesheet" href="jquery-ui.min.css" type="text/css" />
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" /> 
    
    
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>  -->
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    
    
    <!-- Prerequisites: jQuery and jQuery UI Stylesheet -->
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/redmond/jquery-ui.css" />
	<link media='screen' rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/redmond/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="../css/timepicker.css" />

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/timepicker.js"></script>

    <!-- Start bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<link media='screen' rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link media='screen' rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- End bootstrap -->

    <link href='../js/full-calendar/fullcalendar.css' rel='stylesheet' />
    <link href='../js/full-calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='../js/full-calendar/lib/moment.min.js'></script>
    <script src='../js/full-calendar/lib/jquery-ui.custom.min.js'></script>
        
    <script src='../js/full-calendar/fullcalendar.min.js'></script>
    <!--<script src='../js/full-calendar/lib/jquery.min.js'></script> -->
    
    <!--Include this script last. Used for handling share ui functionality-->
     <script src='../js/ui-scripts.js'></script> 
     <script src='../js/database-scripts.js'></script>
	 <style>
		body{font-size:10px;}
	 </style>

</head>
<body>
<a><img src="../img/no_logo.png" style="" /></a>
<div class='container-fluid'>
<?

	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	
	//what you need to log.
	require_once($_SERVER['DOCUMENT_ROOT']."/includes/KLogger.php");
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();

	
	if(isset($_GET['choiceReport']))
		$choice = $_GET['choiceReport'];
	
	if(isset($_GET['searchName']))
		$seachName = $_GET['searchName'];

	if(isset($_GET['altTripDate']))
		$date = $_GET['altTripDate'];

	
	//echo "<h3>".$choice." Report</h3>";
	if($_GET['choiceReport']=='Band'){

				
		//get the band ID
		$query = "select bandID from band where bandName = '$seachName'" or die("Error in the query");
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
;
		while($row = $result->fetch_assoc())
			$bid=$row['bandID'];
		
		//echo $bid;
		$query = "select * from band, trip, driver, vehicle where band.bandID=$bid and trip.driverID=driver.driverID and trip.vehicleID=vehicle.vehicleID and band.bandID=trip.bandID order by tripDate, pickUpTime";		

		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
		
		echo "<h3>Report for Band: ".$seachName."</h3><br />";
		
	}else if($_GET['choiceReport']=='Date'){
		
		$query = "select * from trip, band, driver, vehicle where tripDate='$date' and trip.bandID=band.bandID and trip.driverID=driver.driverID and trip.vehicleID=vehicle.vehicleID order by tripDate, pickUpTime";
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
		
		$newdate = date('l\, F j\, Y',strtotime($date));
		echo "<h3>Report for Date: ".$newdate."</h3><br />";

		
	}else if($_GET['choiceReport']=='Driver'){
		//get the driverID
		$query = "select driverID from driver where name='$seachName'";
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

		while($row = $result->fetch_assoc())
			$did= $row['driverID'];

		$query = "select * from trip, band, vehicle where trip.driverID=$did and tripDate='$date' and trip.bandID=band.bandID and trip.vehicleID=vehicle.vehicleID order by tripDate, pickUpTime";
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

		echo "<h3>Report for Driver: ".$seachName."</h3><br />";
			
		
		
	}
	//echo $query;
	//try{$result=$db->query($query); echo "Contact Added!"; /* What you want to log*/$log->LogInfo("Contact: ".$name);}catch(Exception $e){echo "There was an error loading data";} 
	

		while($row = $result->fetch_assoc()): ?>
		<div style='width:100%'>
			<table style='width:60%; display:inline-block; vertical-align:top;'>
				<tr>
					<td style='width:700px;'>Band Name: <? echo $row['bandName']; ?></td>
					<td style='width:700px;'>Pickup: <? echo $row['pickUp']; ?>&nbsp;&nbsp;<? echo $row['flightPU']; ?></td> 
					<!--<td style='width:33%;'><? /*
							$trip = $row['tripID'];
							$query2 = "select * from tripContact,contact where tripContact.tripID=$trip and contact.contactID = tripContact.contactID";
							try{$result2=$db->query($query2);}catch(Exception $e){echo "There was an error loading data";}
							echo "Contacts:<br />";
							while($row2 = $result2->fetch_assoc()):
								echo $row2['contactName']." - ".$row2['contactPhone']."<br />";
							endwhile*/
					?></td>-->
				</tr>
				<tr>
					<td style='width:700px;'>Date: <? echo date('D\, M j\, Y',strtotime($row['tripDate'])); ?></td>
					<td style='width:700px;'>Drop off:<? echo $row['dropOff']; ?>&nbsp;&nbsp;<? echo $row['flightDO']; ?></td>
					
				</tr>
				<tr>
					
					<td style='width:700px;'>Pickup Time: <? echo date('g:i A',strtotime($row['pickUpTime'])); ?></td>
					<td style='width:700px;'>Vehicle:<? echo $row['vehicleName']; ?></td>
				</tr>
				<tr>
					<td style='width:700px;'>Duration: <? echo $row['duration']; ?></td>
					<td style='width:700px;'>Num Pass:<? echo $row['numOfPax']; ?></td>
				</tr>
				<tr>
					<td style='width:700px;'>Notes: <? echo $row['tripNotes']; ?></td>
				</tr><tr>
				<?
						if($choice=='Driver')
							echo "<td style='width:700px;'>Driver Notes: ".$row['driverNotes']."</td>";
					?></tr>
			</table>
			<table style='margin-left:50px; width:30%;display:inline-block; vertical-align:top;'>
				<tr>
<td><? 
							$trip = $row['tripID'];
							$query2 = "select * from tripContact,contact where tripContact.tripID=$trip and contact.contactID = tripContact.contactID";
							try{$result2=$db->query($query2);}catch(Exception $e){echo "There was an error loading data";}
							echo "Contacts:<br />";
							while($row2 = $result2->fetch_assoc()):
								echo $row2['contactName']." - ".$row2['contactPhone']."<br />";
							endwhile
					?></td>
				</tr>
			</table>
			</div>
			<hr />
		<? endwhile;
		
		if ($_GET['choiceReport']=='Band'){
		?>
			<div>			
				<center>
				<table width='900' height='90' border='1' cellpadding='6' cellspacing='4'>
					<tr>
					  <td align='center'>
						GROUND TRANSPORTATION DEPARTMENT IS OPEN ON FESTIVAL DAYS FROM 8AM-8PM.<br />
						CALL 504-656-6140  TO REQUEST CHANGES.
					  </td>
					</tr>
				</table>
				</center>
			</div>
			
			<div>		
				<center>
				<table width='900' height='90' border='1' cellpadding='6' cellspacing='4'>
					<tr>
					  <td align='center'>
							Driver will meet air passengers with a sign with their name on it at the baggage claim carousel for their flight.  Passengers should go to the baggage claim carousel for their flight even if they did not check a bag. Driver will contact passenger if he/she cannot locate passenger at baggage claim
					  </td>
					</tr>
				</table>
				</center>
			</div>
			
			<div>			
				<center>
				<table width='900' height='90' border='1' cellpadding='6' cellspacing='4'>
					<tr>
					  <td align='center'>
						*Mardi Gras Truck Stop - New Orleans Interstate 10 – Exit 236 B - 504.945.1000 - www.mardigrastruckstop.com  for directions .<br />
						 **Bus Coordinator, Carroll Conley (504.452.8249 ) will be available between 6am-9am at the truck stop to coordinate your escort to the festival site.
					  </td>
					</tr>
				</table>
				</center>
			</div>
			
		<?}

?>
</div>

</body>
</html>