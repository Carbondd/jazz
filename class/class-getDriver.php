<?php
	error_reporting(-1);
	class jazz_getDriver{
		//vars
		private $driverID, $name, $address, $city, $state, $zip, $phone, $statusID;
		
		//constructor
		public function jazz_getDriver(){
			//do nothing yet	
		}
		
		public function get_getDriver(){
			//require the database to do operations
			
			require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
			$db = new no_db();
			$db_obj = $db->connect_no_db();
			
			//make an array to store the drivers
			$names = array();
			$i = 0;

			//return the query from the db
			$result = $db_obj->query("select * FROM driver where driverID <> 0 order by name");	
			//echo $result;
			return $result;
		}
			
	}
?>
