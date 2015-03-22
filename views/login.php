<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>New Orleans Jazz Festival | Auto-Schedule Software</title>
    <link rel="stylesheet" href="<? echo "../css/style.css"; ?>" />
    
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->    
    <link rel="stylesheet" href="jquery-ui.min.css" type="text/css" />
    <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" /> 
    
    
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>  -->
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    
    
    <!-- Prerequisites: jQuery and jQuery UI Stylesheet -->
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/redmond/jquery-ui.css" />
    
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <!-- Start bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- End bootstrap -->

    <link href='../js/full-calendar/fullcalendar.css' rel='stylesheet' />
    <link href='../js/full-calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src='../js/full-calendar/lib/moment.min.js'></script>
    <script src='../js/full-calendar/lib/jquery-ui.custom.min.js'></script>
        
    <script src='../js/full-calendar/fullcalendar.min.js'></script>
    <!--<script src='../js/full-calendar/lib/jquery.min.js'></script> -->
    

</head>
<body style="background:#428BCA;">
<div class="container"style="width:30%; padding:10px; margin-top:14%; background:#FFF; box-shadow:2px 6px 35px 1px;">

		<p>Welcome to New Orleans Transportation Software. Please Login to continue.</p>

        <form class="form-horizontal" action="controllers/process-login.php" method="post" role="form">
          <div class="form-group">
            <label for="user_name" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Sign in</button>
            </div>
          </div>
        </form>

</div>
</body>
</html>