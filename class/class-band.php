<?php
	error_reporting(-1);
	class jazz_band{
		//vars
		private $bandID;
		
		//constructor
		public function jazz_band(){
			//do nothing yet	
		}
		
		public function get_ID($band){
		
		//rjequire the database to do operations
			require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
			$db = new no_db();
			$db_obj = $db->connect_no_db();
			
			//make an array to store the names
			//$names = array();
			//$i = 0;
			
			//return the query from the db
			$result = $db_obj->query("select * FROM band WHERE bandName = '$band'");
			//echo $result;
			return $result;
		}
			
	}
?>
