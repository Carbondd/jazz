<? 
	//class to handle user functions and interactions. Talks to the database class to map users to the object.
	//Updated: 12/4/14
	//Programmer: Ryan Kazokas
	
	//connect to the database first
	require_once($_SERVER['DOCUMENT_ROOT'].'/class/class-DAO.php');

	
	
	class no_user extends no_db{
		
		private $first, $last, $access, $id, $password;
		
		public function no_user(){
			//do nothing yet	
		}
		
		public function get_user($id){
			//gets the user from the database
			$db = new no_db();
			$values = "*";
			$where = array("userid"=>$id);
			
			//get the result
			$result = $db->getVals(USER_TABLE,$values,$where);
			
			//loop through and set the object values
			while($row=$result->fetch_assoc()){
				$this->set_first_name($row['firstName']);
				$this->set_last_name($row['lastName']);
				$this->set_access($row['access']);
				$this->set_password($row['password']);
			}
		}	
		
		public function set_first_name($fn){
			//sets first name of object
			$this->first = $fn;
		}
		
		public function set_last_name($ln){
			//sets last name of object
			$this->last = $ln;
		}
		
		public function set_access($a){
			//sets access control of object
			$this->access = $a;
		}

		public function set_password($p){
			//sets first name of object
			$this->password = $p;
		}
		
		public function get_first(){
			return $this->first;	
		}
		
		public static function check_login($u, $p){
			//checks username and password against the database.
			$db = new no_db();
			$values = "*";
			$where = array("userid"=>$u,"password"=>$p);
			
			//get the result
			$result = $db->select(USER_TABLE,$values,$where);
			//var_dump($result);
			$row_count = $result->num_rows;
			return $row_count;			
		}
	}
	
	
	/*$userObj = new no_user();
	$userObj->get_user('rkaz246');
	var_dump($userObj);*/

?>
