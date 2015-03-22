<?
/* Class to handle connection to database */
class db{
	
	//class variables
	private $user, $pass, $host, $db;
	
	public function db(){
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
		define("SETTINGS_TABLE","SETTINGS");
		
		$this->setUser('ezvetnot');
		$this->setPass('ezVetN0tes!');
		$this->setHost('localhost');
		$this->setDB('ezvetnot_no_jazzfest');
		
		$this->database_obj = new mysqli($this->get_host(),$this->get_user(), $this->get_pass(), $this->get_db());
		if($this->database_obj->connect_errno > 0){
			die('Unable to connect to database [' . $db->connect_error . ']');
			throw new Exception("Can't connect to the DB");
		}

		return true;		
	}
	
	//setters
	protected function setUser($user){
		$this->user = $user;
	}
	protected function setPass($pass){
		$this->pass = $pass;
	}
	protected function setHost($host){
		$this->host = $host;
	}
	protected function setDB($db){
		$this->db = $db;
	}
	
	//getters
	protected function getUser(){
		return $this->user;
	}
	protected function getPass(){
		return $this->pass;
	}
	protected function getHost(){
		return $this->host;
	}
	protected function getDB(){
		return $this->db;
	}
}

$db = new db();

?>