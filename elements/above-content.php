<?php 

	//check for user session
	session_start();
	require_once($_SERVER['DOCUMENT_ROOT']."/includes/KLogger.php");
	$log = new KLogger ( $_SERVER['DOCUMENT_ROOT']."/logs/log.txt" , KLogger::DEBUG );

	if(!isset($_SESSION['user']))
		header('location: /login.php'); 

	//check for user access
	require_once($_SERVER['DOCUMENT_ROOT']."/class/class-DAO.php");
	$dbObj = new no_db();
	$db = $dbObj->connect_no_db();


	//get the users access
	$query = "select access from user where userid='".$_SESSION['user']."'";
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data"; $log->LogError("Couldn't load access");}
	
	while($row = $result->fetch_assoc())
		$userAccess =$row['access'];
	
	//get the page access
	$query = "select access from access where page='".basename($_SERVER['PHP_SELF'])."'";
	try{$result=$db->query($query);}catch(Exception $e){echo "There was an error loading data";}

	while($row = $result->fetch_assoc())
		$pageAccess = $row['access'];
	
	//only block users with access less than full
	//if full access, can access anything.
	if($pageAccess==1)
		if($userAccess==0){
			$log->LogError("Unauthorized Access!");
			header('location: 401.shtml');
		}
			 

	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>New Orleans Jazz Festival | Auto-Schedule Software</title>
    <link rel="stylesheet" href="<? echo "../css/style.css"; ?>" />
    
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->    
    
    
    <!-- Prerequisites: jQuery and jQuery UI Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/redmon-jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="../css/timepicker.css" />

    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/timepicker.js"></script>

    <!-- Start bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- End bootstrap -->

    <link href='../js/full-calendar/fullcalendar.css' rel='stylesheet' />
    <link href='../js/full-calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='../js/full-calendar/lib/moment.min.js'></script>
    <script src='../js/full-calendar/lib/jquery-ui.custom.min.js'></script>
        
    <script src='../js/full-calendar/fullcalendar.min.js'></script>
    <!--<script src='../js/full-calendar/lib/jquery.min.js'></script> -->
    
    <!--Include this script last. Used for handling share ui functionality-->
     <script src='../js/ui-scripts.js'></script> 
     <script src='../js/database-scripts.js'></script>

</head>
<body>

	<div id='userBar' class='col-md-12'><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Hello, <? echo $_SESSION['user']; ?> | <a href="controllers/logout.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Logout</a></div>
	<div id="top_bar" class="col-md-12">
    	<div id="top_bar_logo"><a href="/"><img src="../img/no_logo.png" style="" /></a></div>
    </div>
    <div id="main_nav" class="col-md-12">
        <!--<ul class="nav nav-pills nav-stacked">-->
		<ul id="myTab" class="nav nav-tabs">
        <li id="band"><a href="/BandContact.php"><span class="glyphicon glyphicon-music"></span> Band / <span class="glyphicon glyphicon-user"></span> Contact</a></li>
        <li id="driver"><a href="/Driver.php"><span class="glyphicon glyphicon-road"></span> Driver</a></li>
          <li id="location"><a href="/Location.php"><span class="glyphicon glyphicon-map-marker"></span> Locations</a></li>
          <li id="trip"><a href="/Trip.php"><span class="glyphicon glyphicon-flag"></span> Run</a></li>
		  <li id="report"><a href="/Reports.php"><span class="glyphicon glyphicon-flag"></span> Reports</a></li>
		  <li id="driverSchedule"><a href="/DriverSchedule.php"><span class="glyphicon glyphicon-calendar"></span> Driver Schedule</a></li>
          <!--<li id="text"><a href="/Text.php"><span class="glyphicon glyphicon-phone"></span> Test Text</a></li>-->
        </ul>  	
    </div>
	
    
    <div id="overlay">
    </div><!--Overlay div -->
<div id="loader" class="loader">Loading...</div>
    <div id="content" class="col-md-12">




