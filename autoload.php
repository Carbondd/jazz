<? 
	//script called at the beginning of each script to prevent missing classes and require/include statements
    function __autoload($class_name) 
    {
        //class directories
		//add as many as you need
		
        /*$directorys = array(
            $_SERVER['DOCUMENT_ROOT'].'/class/',
            $_SERVER['DOCUMENT_ROOT'].'/views/',
            $_SERVER['DOCUMENT_ROOT'].'/controllers/',
			$_SERVER['DOCUMENT_ROOT'].'/services/'
        );*/
		
		$directorys = array();
		//special conditional for now.
		if($class_name=="no_db")
			array_push($directorys, $_SERVER['DOCUMENT_ROOT'].'/class/class-DAO');
        
        //for each directory
        foreach($directorys as $directory)
        {
			echo $directory. $class_name;
            //see if the file exsists
            if(file_exists($directory.$class_name . '.php'))
            {
                require_once($directory.$class_name . '.php');
                //only require the class once, so quit after to save effort (if you got more, then name them something else 
                return;
            }             
        }
    }
	
	/*
	class autoLoader{
		
		public static $loader;
		
		public static function init(){
			if (self::$loader == NULL)
				self::$loader = new self();

			return self::$loader;
		}
	
		public function __construct(){
			spl_autoload_register(array($this,'models'));
			echo "Constructor";
		}
		
		public function models($class){
			$class = preg_replace('/_model$/ui','',$class);
			
			set_include_path(get_include_path().PATH_SEPARATOR.'/model/');
			spl_autoload_extensions('.php');
			spl_autoload($class);
		}
	}
	*/

?>