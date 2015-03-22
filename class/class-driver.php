<?php
	error_reporting(-1);
	class jazz_driver{
		//vars
		private $ID, $name, $vehicleName, $licenseNum;
		
		//constructor
		public function jazz_driver(){
			//do nothing yet	
		}
		
		public function get_driver($name){
			//rjequire the database to do operations
			require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
			$db = new no_db();
			$db_obj = $db->connect_no_db();
			
			//make an array to store the names
			//$names = array();
			//$i = 0;
			
			//return the query from the db
			$result = $db_obj->query("select * FROM driver WHERE name = '$name'");
			
			return $result;
		}
			
	}
?>
