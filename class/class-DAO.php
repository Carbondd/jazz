<?php

//class to handle connections to database
class no_db{
	//class vars
	protected $user, $pass, $db, $host;
	public $database_obj;

	
	//constructor sets class variables
	function no_db(){
		//predefine the tab le names to be used.
		define("BAND_TABLE","band");
		define("CONTACT_TABLE","contact");
		define("DRIVER_TABLE","driver");
		define("LOCATION_TABLE","location");
		define("STATUS_TABLE","status");
		define("TRIP_TABLE","trip");
		define("TRIP_CONTACT_TABLE","tripContact");
		define("USER_TABLE","user");
		define("VEHICLE_TABLE","vehicle");
		
		$this->set_user('ezvetnot');
		$this->set_pass('ezVetN0tes!');
		$this->set_host('localhost');
		$this->set_db('ezvetnot_no_jazzfest');
		
		$this->database_obj = new mysqli($this->get_host(),$this->get_user(), $this->get_pass(), $this->get_db());
		if($this->database_obj->connect_errno > 0){
			die('Unable to connect to database [' . $db->connect_error . ']');
			return false;
		}

		return true;
	}
	
	public function connect_no_db(){
		//returns the mysqli object to do operations
		$database_obj = new mysqli($this->get_host(),$this->get_user(), $this->get_pass(), $this->get_db());
		if($database_obj->connect_errno > 0){
			die('Unable to connect to database [' . $db->connect_error . ']');
			return false;
		}
		$database_obj->autocommit(FALSE);
		return $database_obj;
	}
	
	//mutuators
	//set to protected later
	public function set_user($u){
		$this->user= $u;
	}
	public function set_pass($p){
		$this->pass = $p;
	}
	public function set_host($h){
		$this->host = $h;
	}
	public function set_db($d){
		$this->db = $d;
	}
	
	//accessors
	public function get_user(){
		return $this->user;
	}
	public function get_pass(){
		return $this->pass;
	}
	public function get_host(){
		return $this->host;
	}
	public function get_db(){
		return $this->db;
	}

	private function where_clause(){
		//where clause has common functionality between sql methods.
		//combined here
	}	
	
	public function insert_into($table, $vals_cols, $where){
		//function to build an insert statement for a set of given values.
		$sql="insert into ".$table;

		if($vals_cols != 0){
			if($i<(count($vals_cols)-1)){
				foreach($vals_cols as $col=>$val){
					$vals .= $val.", ";
					$cols .= $col.", ";
				}
				$vals .= $val;
				$cols .= $col;
		  
		  		$sql .= $key." = '".$condition."'";	
			}
		}
		
		var_dump($vals);
		var_dump($cols);
	}//insert_into
	
	protected function select($table, $values, $where){
		//function to build a select statement for given values.
		//start building sql
		$sql = "select ";
		
		//loop control
		$i = 0;	
				
		//only go into loop if there is a value in the $values array
		if(count($values)>0){
			while($i<(count($values)-1)){
				$sql .= $values[$i].", ";
				
				$i++;
			}
			$sql.= $values[$i];
		}
		
		//add the from clause
		$sql .= " from ".$table;
		
		if($where != 0){
			//add the where clasue
			$sql .= " where ";
			
			//get the where conditions
			if(count($where)>0){
				//reset the counter
				$i = 0; 
				foreach($where as $key=>$condition){
					//$key = $nextKey;
					if($i<(count($where)-1)){
						$sql .= $key." = '".$condition."' AND ";
						$i++;
					}
				}
				
				$sql .= $key." = '".$condition."'";	
			}	
							
		}	
		
		//query and return mysqli
		$result = $this->database_obj->query($sql);
		if($result){
			//if the query works
			return $result;	
		}else
			return "0";
	
		
	}//select

	
}//endClass

/*$db = new no_db();
$val_col = array(
	"test_col"=>"test_val",
	"test_col2"=>"test_val2"
);
$db->insert_into('table',$val_col, "");*/




?>