<?php
//Master php file fgor vet app
//written by ryan kazokas
//01/29/30


// for web page
function getTimesOption()
{

	for($i=0; $i<24; $i++)
	{
		//get hour
		if($i<12)
		{
			for($x=0; $x<12; $x++)
			{
				switch($x){
					case 0:
						echo "<option value='".$i.":00 AM'>".$i.":00 AM</option>";
						break;
					case 1:
						echo "<option value='".$i.":05 AM'>".$i.":05 AM</option>";
						break;
					case 2:
						echo "<option value='".$i.":10 AM'>".$i.":10 AM</option>";
						break;
					case 3:
						echo "<option value='".$i.":15 AM'>".$i.":15 AM</option>";
						break;
					case 4:
						echo "<option value='".$i.":20 AM'>".$i.":20 AM</option>";
						break;
					case 5:
						echo "<option value='".$i.":25 AM'>".$i.":25 AM</option>";
						break;
					case 6:
						echo "<option value='".$i.":30 AM'>".$i.":30 AM</option>";
						break;
					case 7:
						echo "<option value='".$i.":35 AM'>".$i.":35 AM</option>";
						break;
					case 8:
						echo "<option value='".$i.":40 AM'>".$i.":40 AM</option>";
						break;
					case 9:
						echo "<option value='".$i.":45 AM'>".$i.":45 AM</option>";
						break;
					case 10:
						echo "<option value='".$i.":50 AM'>".$i.":50 AM</option>";
						break;
					case 11:
						echo "<option value='".$i.":55 AM'>".$i.":55 AM</option>";
						break;

	
			}
		}
			
	}elseif($i==12)
		{
			for($x=0; $x<12; $x++)
			{
				switch($x){
					case 0:
						echo "<option value='".$i.":00 PM'>".$i.":00 PM</option>";
						break;
					case 1:
						echo "<option value='".$i.":05 PM'>".$i.":05 PM</option>";
						break;
					case 2:
						echo "<option value='".$i.":10 PM'>".$i.":10 PM</option>";
						break;
					case 3:
						echo "<option value='".$i.":15 PM'>".$i.":15 PM</option>";
						break;
					case 4:
						echo "<option value='".$i.":20 PM'>".$i.":20 PM</option>";
						break;
					case 5:
						echo "<option value='".$i.":25 PM'>".$i.":25 PM</option>";
						break;
					case 6:
						echo "<option value='".$i.":30 PM'>".$i.":30 PM</option>";
						break;
					case 7:
						echo "<option value='".$i.":35 PM'>".$i.":35 PM</option>";
						break;
					case 8:
						echo "<option value='".$i.":40 PM'>".$i.":40 PM</option>";
						break;
					case 9:
						echo "<option value='".$i.":45 PM'>".$i.":45 PM</option>";
						break;
					case 10:
						echo "<option value='".$i.":50 PM'>".$i.":50 PM</option>";
						break;
					case 11:
						echo "<option value='".$i.":55 PM'>".$i.":55 PM</option>";
						break;

	
			}
		}		
		}else		
		{
			for($x=0; $x<12; $x++)
			{
				switch($x){
					case 0:
						echo "<option value='".$i.":00'>".($i-12).":00 PM</option>";
						break;
					case 1:
						echo "<option value='".$i.":05'>".($i-12).":05 PM</option>";
						break;
					case 2:
						echo "<option value='".$i.":10 PM'>".($i-12).":10 PM</option>";
						break;
					case 3:
						echo "<option value='".$i.":15 PM'>".($i-12).":15 PM</option>";
						break;
					case 4:
						echo "<option value='".$i.":20 PM'>".($i-12).":20 PM</option>";
						break;
					case 5:
						echo "<option value='".$i.":25 PM'>".($i-12).":25 PM</option>";
						break;
					case 6:
						echo "<option value='".$i.":30 PM'>".($i-12).":30 PM</option>";
						break;
					case 7:
						echo "<option value='".$i.":35 PM'>".($i-12).":35 PM</option>";
						break;
					case 8:
						echo "<option value='".$i.":40 PM'>".($i-12).":40 PM</option>";
						break;
					case 9:
						echo "<option value='".$i.":45 PM'>".($i-12).":45 PM</option>";
						break;
					case 10:
						echo "<option value='".$i.":50 PM'>".($i-12).":50 PM</option>";
						break;
					case 11:
						echo "<option value='".$i.":55 PM'>".($i-12).":55 PM</option>";
						break;

	
			}
		}	
		}
	}
}

// for array

function timeConversion($time)
{

	$currTime = strtotime($time);
	$hour= date('G',$currTime);
	$minute = date('i', $currTime);
	if($hour<12)
		$currTime = $hour.":".$minute."AM";
	elseif($hour==12)
		$currTime = $hour.":".$minute."PM";
	else
		$currTime =  ($hour-12).":".$minute."PM";
	file_put_contents('times.php',$currTime);

	return($currTime);
	file_put_contents('times.php',$currTime);
}


function getBandContacts($bName)
{
	require_once('db.php');
	$link=connectDB();
	$query = "select bandID from band where bandName = '$bName'" or die("Error in the query" . mysqli_error($mysqli));

	
	if ($result = $mysqli->query($query)) {
	
			/* fetch associative array */
			while ($row = $result->fetch_assoc()) {
				$bid=$row['bandID'];
				
			}
	}

	$query = "SELECT contactName FROM contact where bandID=$bid" or die("Error in the consult.." . mysqli_error($link));
	echo "<option>--Contact Name--</option>";
	//exexute
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_array($result)) {
	  echo "<option value='".$row['contactName']."</option>";
	} 

}



function getMgrOption()
{
	echo "<option>--Select Manager Type--</option>";
	echo "<option>Tour Mgr</option>";
	echo "<option>Production Mgr</option>";
	echo "<option>Tour/Production Mgr</option>";
	echo "<option>Unknown</option>";
}

function getLocationType()
{
	echo "<option>--Select Location Type--</option>";
	echo "<option>Hotel</option>";
	echo "<option>Stage</option>";
	echo "<option>Airport/Airline</option>";
}


function getVetsOption()
{
	require_once('db.php');
	$link=connectDB();
	//select all of the vetss
	$query = "SELECT * FROM vet" or die("Error in the consult.." . mysqli_error($link));
	echo "<option>--Select a Vet--</option>";
	//exexute
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_array($result)) {
	  echo "<option value='".$row['vetID'] . "'>".$row['vetFirstName']." ". $row['vetLastName']."</option>";
	} 

}

function getBandsOption()
{
	require_once('db.php');
	$link=connectDB();
	//select all of the vetss
	$query = "SELECT * FROM band" or die("Error in the consult.." . mysqli_error($link));
	echo "<option>--Select a Contact--</option>";
	//exexute
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_array($result)) {
	  echo "<option value='".$row['bandName'] ."</option>";
	} 

}


function getContactsOption()
{
	require_once('db.php');
	$link=connectDB();
	//select all of the vetss
	$query = "SELECT * FROM contact" or die("Error in the consult.." . mysqli_error($link));
	echo "<option>--Select a Contact--</option>";
	//exexute
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_array($result)) {
	  echo "<option value='".$row['contactName'] ."</option>";
	} 

}

function getLocationOption()
{
	$mysqli = new mysqli("localhost","ezvetnot","ezVetN0tes!","ezvetnot_no_jazzfest");

	 //check connection 
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	//require_once('db.php');
	echo "<option>--Select a Location--</option>";
	$query = "SELECT * FROM location" or die("Error in the query" . mysqli_error($mysqli));
	//$result = $mysqli->query($query);
	$result = mysqli_query($mysqli, $query);

	while($row = mysqli_fetch_array($result)) {
	  echo "<option value='".$row['locationID'] . "'>".$row['locationName'] ."</option>";
	}
	
}

function getPULocationsOption()
{
	require_once('db.php');
	$link=connectDB();
	//select all of the vetss
	$query = "SELECT * FROM trip" or die("Error in the consult.." . mysqli_error($link));
	echo "<option>--Select a Contact--</option>";
	//exexute
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_array($result)) {
	  echo "<option value='".$row['pickUp'] ."</option>";
	} 

}

function getDOLocationsOption()
{
	require_once('db.php');
	$link=connectDB();
	//select all of the vetss
	$query = "SELECT * FROM trip" or die("Error in the consult.." . mysqli_error($link));
	echo "<option>--Select a Contact--</option>";
	//exexute
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_array($result)) {
	  echo "<option value='".$row['dropOff'] ."</option>";
	} 

}


function getVehiclesOption()
{
	require_once('db.php');
	$link=connectDB();
	//select all of the vetss
	$query = "SELECT * FROM vehicle" or die("Error in the consult.." . mysqli_error($link));
	echo "<option>--Select a Contact--</option>";
	//exexute
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_array($result)) {
	  echo "<option value='".$row['vehicleName'] ."</option>";
	} 

}

function getContactInfo()
{
	$cName = $_GET['contactName'];
	
	$cName=trim($cName);
	
	print($cName);

	$mysqli = new mysqli("localhost","ezvetnot","ezVetN0tes!","ezvetnot_no_jazzfest");

	 //check connection 
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$query = "SELECT contactID, typeMgr, contactPhone, band.bandName FROM contact, band where contact.bandID = band.bandID and contactName='$cName'" or die("Error in the query" . mysqli_error($mysqli));
	
	//exexute
	if ($result = $mysqli->query($query)) {
	
		while($row = $result->fetch_assoc()) {
			$cid=$row['contactID'];
			$mgr=$row['typeMgr'];
			$phone=$row['contactPhone'];
			$bName=$row['bandName'];
		}
	}

	print("
		<form class='form-horizontal' role='form' action='updateContact2.php' method='post'>
		  <!-- <div class='form-group'>
	    	<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='green'><b>Make necessary changes and click on Update</b></font>
	   	  </div>
	
		  <div class='form-group'>
		    <label for='contactName' class='col-sm-1 control-label'>Contact:</label>
		    <div class='col-sm-4'>
		      <input type='text' class='form-control contactName' id='contactName' name='contactName' value= '$cName' "); print ($cName); print(">
		    </div>
		  </div> -->
		  	  
		  <div class='form-group'>
		    <label for='typeMgr' class='col-sm-1 control-label'>Type:</label>
		    <div class='col-sm-4'>
		      <input type='text' class='form-control typeMgr' id='typeMgr' name='typeMgr' value='$mgr' "); print ($mgr); print(">
		    </div>
		  </div>
		  
		  <div class='form-group'>
		    <label for='contactPhone' class='col-sm-1 control-label'>Phone:</label>
		    <div class='col-sm-4'>
		      <input type='text' class='form-control contactPhone' id='contactPhone' name='contactPhone' value='$phone' "); print ($phone); print(">
		    </div>
		  </div>
		  
		  <div class='form-group'>
		    <label for='bandName' class='col-sm-1 control-label'>Band:</label>
		    <div class='col-sm-4'>
		      <input type='text' class='form-control bandName' id='bandName' name='bandName' value='$bName'"); print ($bName); print(">
		    </div>
		  </div>
		  
		  <div class='form-group'>
		    <div class='col-sm-5'>
		      <button style='float:right;' type='submit' id='updateContact' class='btn btn-primary'>Update</button>
		    </div>
		  </div> 
		  <input name='contactID' type='hidden' value=".$cid.">
		</form> ");

}

	
function getClientResults()
{
	$animalName = $_GET['animalName'];
	$ownerLastName = $_GET['ownerLastName'];
	
	//print($animalName);
	//print($ownerLastName);
	//set up the connection
	require_once('db.php');
	$link=connectDB();

	//select all of the vetss
	$query = "SELECT * FROM animal, owner where animal.animalName='$animalName' and owner.ownerLastName='$ownerLastName' and owner.ownerID = animal.ownerID" or die("Error in the consult.." . mysqli_error($link));
	
	//exexute
	$result = mysqli_query($link, $query);
	
	while($row = mysqli_fetch_array($result)) {
		$ownerID=$row['ownerID'];
		$animalName=$row['animalName'];
		$ownerFirstName=$row['ownerFirstName'];
		$ownerLastName=$row['ownerLastName'];
		$ownerAddress=$row['ownerAddress'];
		$ownerCity=$row['ownerCity'];
		$ownerState=$row['ownerState'];
		$ownerZip=$row['ownerZip'];
		$ownerPhone=$row['ownerPhone'];
		$ownerEmail=$row['ownerEmail'];
	}
	
		/*print($animalName);print($ownerFirstName);print($ownerLastName);print($ownerAddress);print($ownerCity);print($ownerState);print($ownerZip);
		print($ownerPhone);print($ownerEmail);*/
		print("
			<form action='modifyClientInfo.php' method='post'>
			<table class='currentClient'>
				<tr>
					<td class='clientLabel'>Animal Name: </td>
					<td class='clientContent'><input type='text' value='".$animalName."'  /></td>
				</tr>
				<tr>
					<td class='clientLabel'>Owner First Name: </td>
					<td class='clientContent'><input type='text' value='".$ownerFirstName."' name='ownerFirstName'  /></td>
				</tr>
				<tr>
					<td class='clientLabel'>Owner Last Name: </td>
					<td class='clientContent'><input type='text' value='".$ownerLastName."' name='ownerLastName'  /></td>
				</tr>
				<tr>
					<td class='clientLabel'>Address: </td>
					<td class='clientContent'><input type='text' value='".$ownerAddress."' name='ownerAddress'  /></td>
				</tr>
				<tr>
					<td class='clientLabel'>City: </td>
					<td class='clientContent'><input type='text' value='".$ownerCity."' name='ownerCity'  /></td>
				</tr>
				<tr>
					<td class='clientLabel'>State: </td>
					<td class='clientContent'><input type='text' value='".$ownerState."' name='ownerState'  /></td>
				</tr>
				<tr>
					<td class='clientLabel'>Zip: </td>
					<td class='clientContent'><input type='text' value='".$ownerZip."' name='ownerZip'  /></td>
				</tr>	
				<tr>
					<td class='clientLabel'>Phone: </td>
					<td class='clientContent'><input type='text' value='".$ownerPhone."' name='ownerPhone'  /></td>
				</tr>
				<tr>
					<td class='clientLabel'>Email: </td>
					<td class='clientContent'><input type='text' value='".$ownerEmail."' name='ownerEmail'  /></td>
				</tr>		
				<tr>
					<td class='clientContent'><input type='submit' class='btn' name='action' value='cancel' /></td>
					<td class='clientContent'><input type='submit' class='btn' name='action' value='update' /></td>
				</tr>	
									
			</table>
			<input type='hidden' name='ownerID' value=".$ownerID." />
			</form>
		");
	
 			
	
}

function getVetResults()
{

	$vetID = $_GET['vetID'];

	//set up the connection
	require_once('db.php');
	$link=connectDB();

	//select all of the vets
	$query = "SELECT * FROM vet where vetID=$vetID" or die("Error in the consult.." . mysqli_error($link));
	
	//exexute
	$result = mysqli_query($link, $query);
	
	while($row = mysqli_fetch_array($result)) {
		$vetFirstName=$row['vetFirstName'];
		$vetLastName=$row['vetLastName'];
		$vetEmail=$row['vetEmail'];
		$vetPhone=$row['vetPhone'];
		$password=$row['password'];
	}
	
		print("
			<form action='modifyVetInfo.php' method='post'>
			<table class='currentClient'>
				<tr>
					<td class='clientLabel'>Vet First Name: </td>
					<td class='clientContent'><input type='text' value='".$vetFirstName."' name='vetFirstName'  /></td>
				</tr>
				<tr>
					<td class='clientLabel'>Vet Last Name: </td>
					<td class='clientContent'><input type='text' value='".$vetLastName."' name='vetLastName'  /></td>
				</tr>
				<tr>
					<td class='clientLabel'>Email: </td>
					<td class='clientContent'><input type='text' value='".$vetEmail."' name='vetEmail'  /></td>
				</tr>
				<tr>
					<td class='clientLabel'>Phone: </td>
					<td class='clientContent'><input type='text' value='".$vetPhone."' name='vetPhone'  /></td>
				</tr>
				<tr>
					<td class='clientLabel'>Password: </td>
					<td class='clientContent'><input type='text' value='".$password."' name='password'  /></td>
				</tr>
				<tr>
					<td class='clientContent'><input type='submit' class='btn' name='action' value='cancel' /></td>
					<td class='clientContent'><input type='submit' class='btn' name='action' value='update' /></td>
				</tr>	
									
			</table>
			<input type='hidden' name='vetID' value=".$vetID." />
			</form>
		");
	
 			
	
}



function getSearchResults()
{
	$animalName = $_GET['animalName'];
	$vetID = $_GET['vetID'];
	
	//set up the connection
	require_once('db.php');
	$link=connectDB();

	//select all of the vetss
	$query = "SELECT * FROM appointment, animal,owner where animal.animalName like '%$animalName%' and appointment.vetID=$vetID and animal.animalID=appointment.animalID and owner.ownerID = animal.ownerID " or die("Error in the consult.." . mysqli_error($link));
	
	//exexute
	if($result = mysqli_query($link, $query))
		$count = mysqli_num_rows($result);
	
	$idCount = 0;
	if($count==0)
		print("There are current appointments for the given criteria");
	else{
			while($row = mysqli_fetch_array($result)) {
				//convert the time to readable format
				$time = ($row['time']);
				$time = strtotime($time);
				$time = strftime('%r',$time);
	  echo "
			<table class='currentAppts'>
				<tr>
					<td class='apptLabel'>Animal ID:</td>
					<td class='apptContent'>".$row['animalID']."</td>
					
					<td class='apptLabel'>Appt Time:</td>
					<td class='apptContent'>".$time."</td>
				</tr>
				<tr>
					<td class='apptLabel'>Animal Name:</td>
					<td class='apptContent'>".$row['animalName']."</td>
					
					<td class='apptLabel'>Appt Date:</td>
					<td class='apptContent'>".$row['date']."</td>
				</tr>
				<tr>
					<td class='apptLabel'>Owner Name:</td>
					<td class='apptContent'>".$row['ownerFirstName']." " .$row['ownerLastName']."</td>
					
					<td class='apptLabel'>Reason:</td>
					<td class='apptContent'>".$row['reasonvisit']."</td>
				</tr>
				<tr>
					<td colspan='2'>			
						<form class='update' action='update.php' method='get'>
							<input type='hidden' value='".$row['appt_ID']."' name='appt_ID' />
							<input class='edit' type='submit' value='Edit'>
						</form>
					</td>
					<td colspan='2'>			
						<form class='deleteForm' id='".$idCount."'>
							<input type='hidden' value='".$row['date']."' name='date' id='date' />
							<input type='hidden' value='".$row['animalID']."' name='animalID' id='animalID' />
							<input class='delete' type='button' value='Delete' id='".$idCount."' >
						</form>
					</td>
				</tr>
			</table>
	
	
	
			<hr />";
			$idCount++;
		} 
	}	
}

function updateAppt(){
	//get the appt id that is passed
	$appt_ID= $_GET['appt_ID'];
	
	//setup the connection
	require_once('db.php');
	$link=connectDB();
	
	//select all of the vetss
	$query = "SELECT * FROM appointment where appt_ID = $appt_ID" or die("Error in the consult.." . mysqli_error($link));

	//exexute
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_array($result)){
		print("
	
			<form action='modifyAppt.php' method='POST'>
			<table>
			<tr>
			<td>Date: </td>
			<td><input type='text' value='".$row['date']."' name='date'/></td>
			</tr>
			<tr>
			<td>Time: </td>
			<td><input type='text' value='".$row['time']."' name='time' /></td>
			</tr>
			<tr>
			<td>Weight: </td>
			<td><input type='text' name='weight'  /></td>
			</tr>
			<tr>
			<td>Temperature: </td>
			<td><input type='text' name='temp' /></td>
			</tr>
			<tr>
			<td></td>
			<td><input type='submit' class='btn' value='Submit' /></td>
			</tr>		
					
			</table>
			<input type='hidden' name='animalID' value='".$row['animalID']."' />
			<input type='hidden' name='action' value='edit' />
			<input type='hidden' name='appt_ID' value='$appt_ID' />
			</form>
			
		");
	}
}

function getMaxVetID(){
	//setup the connection
	require_once('db.php');
	$link=connectDB();
	
	//select all of the vetss
	$query = "SELECT MAX(vetID) from vet" or die("Error in the consult.." . mysqli_error($link));
	
	//exexute
	$result = mysqli_query($link, $query);

	while($row = mysqli_fetch_array($result)) {
		$vet = $row['vetID'];	
	}
	
	print($vet);
	//return $vet;
	
	
	
}

function getMaxApptID($animalID){
	//setup the connection
	require_once('db.php');
	$link=connectDB();
	
	//select all of the vetss
	//$query = "SELECT MAX(appt_ID) from appointment where animalID =". $animalID;
	$query = "SELECT MAX(appt_ID) as maxAppt from appointment where animalID =". $animalID;

	//exexute
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_array($result)) {
		$apptID = $row['maxAppt'];	
	}
	$strings=mysqli_error($link);
	return $apptID;

}

function vetSuccess(){
	print("
		<script>
			window.alert('Thank you adding the Vet. Vet ID is ".$_GET['vetID']."');
			window.location='home.php';
		</script>
	");	
}

function apptSuccess(){
	print("
		<script>
			window.alert('Thank you adding the Appointment. ');
			window.location='home.php';
		</script>
	");	
}
function updateSuccess(){
	print("
		<script>
			window.alert('Appointment has been updated. ');
			window.location='home.php';
		</script>
	");	
}
function updateClientSuccess(){
	print("
		<script>
			window.alert('Client info has been updated. ');
			window.location='home.php';
		</script>
	");	
}
function updateVetSuccess(){
	print("
		<script>
			window.alert('Vet info has been updated. ');
			window.location='home.php';
		</script>
	");	
}

function updateConsultation(){
	print("
		<script>
			window.alert('Consultation has been updated. ');
			window.location='home.php';
		</script>
	");	
}


function getDBHost(){
	return "localhost";	
}

function getWPPassword($user_name){
	$dbHost = getDBHost();
	
	$mysqli = new mysqli("$dbHost","ezvetnot_admin", "ezVetN0tes!","ezvetnot_wor1");

	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	//select all of the vetss
	$query = "SELECT user_pass FROM hwd_users where user_login='".$user_name."'" or die("Error in the query" . mysqli_error($link));
	
	if ($result = $mysqli->query($query)) {

		/* fetch associative array */
		while ($row = $result->fetch_assoc()) {
			$user_pass=$row['user_pass'];
		}
	
		/* free result set */
		$result->free();
		return $user_pass;
	}
	else return false;
}

function my_password_validation( $user_name, $password ) {
	

	echo $_SERVER['DOCUMENT_ROOT'];
	include_once($_SERVER['DOCUMENT_ROOT'].'/wp-includes/class-phpass.php' );
	include_once($_SERVER['DOCUMENT_ROOT']."/wp-load.php");

	echo (wp_check_password("whiplash7","$P$BjAgwIgkqTjPE1dn6rUrZZO5GsN4Nn/")) ? 'true' : 'false';
	
	$dbHost = getDBHost();
	$mysqli = new mysqli("$dbHost","ezvetnot_admin", "ezVetN0tes!","ezvetnot_wor1");

	//select the hashed passwords
	$query = "SELECT user_pass FROM hwd_users where user_login='".$user_name."'" or die("Error in the query" . mysqli_error($link));
	
	if ($result = $mysqli->query($query)) {

		/* fetch associative array */
		while ($row = $result->fetch_assoc()) {
			$stored_pass=$row['user_pass'];
		}
	}


    $hasher = new PasswordHash(8, TRUE);
	var_dump($hasher);
		
	// compare plain password with hashed password
	if ($hasher->CheckPassword( $password, $stored_pass )){
		echo true;
	} else {
		echo false;
	}

    return $hasher->CheckPassword( $password, $stored );
}
?>