
<div id="driver-list"></div>
<script>
		
		//this post function loads all drivers information. 	
		$.post( "/services/getDrivers.php", {})
			.done(function( data ) {
			myObj = JSON.parse(data);
			var drivers_data = [];

			//html="<br /><br /><h3>All Drivers Reports</h3>"; 
			html="<br /><br /><br /><table style='width: auto;' class='table  table-bordered table-striped  table-condensed' >";
			html+="<tr><th>Driver ID</th><th>Name</th><th>Phone</th><th>Vehicle Type</th><th>License Number</th></tr>";

			//loop through all drivers information  
			$.each(myObj, function( key, val ) {
				//alert("in each");
			
				html+="<tr><td>"+ val.driver.driverID +"</td><td>"+ val.driver.name +"</td><td>"+ val.driver.phone +"</td><td>"+ val.driver.vehicleName +"</td><td>"+ val.driver.licenseNum +"</td></tr>";
		
			}); //each
			
			//close the table  
			html+="</table>";
			$("#driver-list").html(html);
					
		}); //post 
		

	
</script>