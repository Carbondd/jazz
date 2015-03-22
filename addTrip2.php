<html>

<head>
<title>Insert Record into Driver</title>
</head>

<body>

<?php


	$tDate		= $_POST['tripDate'];
	$tPUtime	= $_POST['pickUpTime'];
	$tbName		= $_POST['bandName'];
	$tcName		= $_POST['contactName'];
	$tmgr		= $_POST['typeMgr'];
	$tcPhone	= $_POST['contactPhone'];
	$tPU		= $_POST['pickUp'];
	$tDO		= $_POST['dropOff'];
	$tname		= $_POST['name'];
	$tvName		= $_POST['vehicleName'];
	
	$tbName=trim($tbName);
	$tcName=trim($tcName);
	$tmgr=trim($tmgr);
	$tPU=trim($tPU);
	$tDO=trim($tDO);
	$tname=trim($tname);
	$tvName=trim($tvName);

	//print($tDate);
	//print($tPUtime);
	//print($tbName);
	/*print($tcName);
	print($tcPhone);
	print($tPU);
	print($tDO);
	print($tname);
	print($tvName);*/
	
	//if (!empty($tDate))// and (!empty($tPUtime)) and (!empty($tbName)) and (!empty($tcName)) and (!empty($tcPhone)) and (!empty($tPU)) and (!empty($tDO)( and (!empty($tname)) and (!empty($tvName)))
	
	//if (($tbName === " "))// && ($tPUtime !== " ") && ($tbName !== " ") && ($tcName !== " ") && ($tcPhone !== " ") && ($tPU !== " ") && ($tDO!== " ") && ($tname !== " ") && ($tvName !== " "))
   /* (	
    	print("empty
		/*<script>
			window.alert('All fields need to be filled out. ');
			window.location='addTrip.php';
		</script>
		");
    }*/
	
//put in the database to handle connection
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();
			
	$query = "select bandID from band where bandName = '$tbName'" or die("Error in the query");
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
		
	while ($row = $result->fetch_assoc()) {
		$bid=$row['bandID'];
					
	}

		
		if (!isset($bid))
		{
			$query = "insert into band(bandName) values('$bandName')" or die("Error in the query");
			//print($query);
			try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
			
			$query = "select max(bandID) from band" or die("Error in the query");
			try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
			while ($row = $result->fetch_assoc()) {
					$bid=$row['max(bandID)'];
					
				}
		}

		//print($bid);
		
		$query = "select driverID from driver where name = '$tname'" or die("Error in the query");
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
		
		/* fetch associative array */
		while ($row = $result->fetch_assoc()) {
			$did=$row['driverID'];
				
		}
	
		//print($did);
		
		$query = "select vehicleID from vehicle where vehicleName = '$tvName'" or die("Error in the query");
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
		
		/* fetch associative array */
		while ($row = $result->fetch_assoc()) {
			$vid=$row['vehicleID'];
					
		}
		
		//print($vid);
		
		$query = "select contactID from contact where contactName = '$tcName'" or die("Error in the query");
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
		
		/* fetch associative array */
		while ($row = $result->fetch_assoc()) {
			$cid=$row['contactID'];
					
		}
		
		//print("before cid");
		//print($cid);
	
	
			
		$query = "insert into trip (tripDate, pickUpTime, pickUp, dropOff, bandID, driverID, vehicleID) values ('$tDate', '$tPUtime', '$tPU', '$tDO', '$bid', '$did', '$vid')" or die("Error in the query" . mysqli_error($mysqli)); 
		//print($query);
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
		
		$query = "select max(tripID) from trip" or die("Error in the query" . mysqli_error($mysqli));
		try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}
	
		/* fetch associative array */
		while ($row = $result->fetch_assoc()) {
			$tid=$row['max(tripID)'];
					
		}
		
		//print("before tid");
		//print($tid);
		
		$query = "insert into tripContact values($tid, $cid)";
		try{$result=$db->query($query);echo 'The new run has been added';}catch(Exception $e){echo "There was an error loading data";}
	

	/*}
	else
	{
		print("
		<script>
			window.alert('All fields need to be filled out. ');
			window.location='addTrip.php';
		</script>
		");

	
	}*/

?>
</body>

</html>