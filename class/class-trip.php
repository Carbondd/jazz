<?php
	error_reporting(-1);
	class jazz_trip{
		//vars
		private $ID, $date,$putime, $contact, $bandID;
		
		//constructor
		public function jazz_trip(){
			//do nothing yet	
		}
		
		public function get_trip($band){
			//require the database to do operations
			require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
			$db = new no_db();
			$db_obj = $db->connect_no_db();
			
			//make an array to store the names
			$names = array();
			$i = 0;
			
			//return the query from the db
			$result = $db_obj->query("select trip.tripID, trip.tripDate, trip.pickUpTime, contact.contactName, trip.pickUp, trip.dropOff, band.bandID, driver.name, vehicle.vehicleName from band, contact, trip, tripContact, vehicle, driver where band.bandID=trip.bandID and trip.tripID=tripContact.tripID and tripContact.contactID=contact.contactID and trip.vehicleID=vehicle.vehicleID and driver.driverID=trip.driverID and band.bandName = '$band'");
			
			return $result;
		}
			
	}
?>
