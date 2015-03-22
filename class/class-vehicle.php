<?php
	error_reporting(-1);
	class jazz_vehicle{
		//vars
		private $vehicleID, $vehicleName;
		
		//constructor
		public function jazz_vehicle(){
			//do nothing yet	
		}
		
		public function get_vehicle(){
			//require the database to do operations
			
			require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
			$db = new no_db();
			$db_obj = $db->connect_no_db();
			
			//make an array to store the locations
			$names = array();
			$i = 0;

			//return the query from the db
			$result = $db_obj->query("select * FROM vehicle order by vehicleName");	
			//echo $result;
			return $result;
		}
			
	}
?>
