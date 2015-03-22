<?php
	error_reporting(-1);
	class jazz_location{
		//vars
		private $locationID, $locname, $loctype;
		
		//constructor
		public function jazz_location(){
			//do nothing yet	
		}
		
		public function get_location(){
			//require the database to do operations
			
			require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
			$db = new no_db();
			$db_obj = $db->connect_no_db();
			
			//make an array to store the locations
			$names = array();
			$i = 0;

			//return the query from the db
			$result = $db_obj->query("select * FROM location order by locationName");	
			//echo $result;
			return $result;
		}
			
	}
?>
