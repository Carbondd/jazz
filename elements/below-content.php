</div><!-- Closes the content div, body, and html tags of the page from above content.php -->

<div class="col-md-12" style="text-align:center;" id="footer">

		<!--<a href="/">Dashboard</a> |--> <a href="BandContact.php">Band/Contact</a> | <!-- <a href="Band.php">Bands</a> | <a href="Contact.php">Contacts</a> | --> <a href="Driver.php">Drivers</a> | <!-- <a href="Vehicle.php">Vehicles</a> | --> <a href="Location.php">Locations</a> | <a href="Trip.php">Run</a> | <a href="Reports.php">Reports</a> | <a href="Text.php">Test Text</a>


</div>
    <div id="footer_copyright" class="col-md-12">
		<a href="http://carbondd.com" target="_blank">Carbon Design & Development - 2014</a><br />
	</div> 
    
<script type="text/javascript">

	$(function() {

		$( ".datepicker" ).datepicker({ dateFormat: "DD, MM d, yy", altField: ".date_alternate", altFormat: "yy-mm-dd"}); 
		
	});
	switch(window.location.pathname){
		/*case "/":
			$("#dash").addClass("active");
			break;*/
		case "/Trip.php":
			$("#trip").addClass("active");	
			break;
		case "/BandContact.php":
			$("#band").addClass("active");	
			break;
		case "/Contact.php":
			$("#contact").addClass("active");	
			break;
		case "/Location.php":
			$("#location").addClass("active");	
			break;
		case "/Vehicle.php":
			$("#vehicle").addClass("active");	
			break;
		case "/Driver.php":
			$("#driver").addClass("active");	
			break;	
		case "/DriverSchedule.php":
			$("#driverSchedule").addClass("active");	
			break;	
                case "/Reports.php":
			$("#report").addClass("active");	
			break;
                case "/Text.php":
			$("#text").addClass("active");	
			break;
				
	}
</script>

 
</body>
</html>