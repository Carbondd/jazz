<?
	//Process login for the user logging in.
	//updated 12/7/14
	//Ryan Kazokas
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/KLogger.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/class/class-user.php');
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );
	//echo $_POST['user_name']." - ". $_POST['password'];
	if(no_user::check_login($_POST['user_name'], md5($_POST['password']))){
		session_start();
		echo "redirecting...";
		$_SESSION['user']=$_POST['user_name'];
		$log->LogInfo("User: ".$_POST['user_name']." logging in. ");
		header('Refresh: 1; URL=../BandContact.php');
	}
	else{
		// Do database work that throws an exception
		$log->LogError("There was an error logging with. User: ".$_POST['user_name']);
 
		echo "Incorrect Username or Password";
	}
?> 