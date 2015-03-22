<form class="form-horizontal" role="form" >
  <div class="form-group" id="original">
    <label for="bandName" class="col-sm-1 control-label">Band:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control bandName" id="bandName" name="bandName" placeholder="Band Name" > 
    </div>
  </div>
  
</form>

<script>
	
	$(function() {
			//autocomplete
			
			var select = false;
			$(".bandName").autocomplete({
			source: "groupSearch.php",
			minLength: 1			    
			});
	
   	 });
   	 
   	 function createReport() {
   	 
   	 	//band = $("#bandName").val();
   	 	band = 'Allen Toussaint';
   	 	
   	 	alert(band);
   	 	
   	 	$.post( "http://jazz.carbondd.com/testCreatePartAReport.php", { bandName: band})
				.done(function( data ) {
				  myObj2 = JSON.parse(data);
				  var run1_data = [];

				var html = "<table class='table'>";
			html+="<tr><th>Run Date</th><th>Num of Passengers</th><th>P/U Time</th><th>P/U Location</th><th>D/O Location</th><th>Driver</th><th>Vehicle</th></tr></table>";

   	 			$.each(myObj, function( key, val ) {
   	 				html+="<table class='table'>";
				html+="<tr><td><input type='text' value='"+ val.tripDate + "' /></td><td><input class='timepicker form-control' type='text' value='"+ convertToStandardTime(val.pickUpTime)+ "' /></td><td><input type='text' value='"+ val.numOfPax+ "'/></td><td><input type='text' value='"+ val.pickUp+ "'/></td><td><input type='text' value='"+ val.dropOff+ "'/></td><td><input type='text' class='form-control' value='"+ val.name+ "' /></td><td><input type='text' value='"+ val.vehicleName+ "' /></td></tr>";
				

   	 			
   	 			});
   	 	});
   	 	
   	 	$.post( "http://jazz.carbondd.com/testCreatePartBReport.php", { bandName: band})
				.done(function( data ) {
				  myObj2 = JSON.parse(data);
				  var run2_data = [];
				  
				  $.each(myObj, function( key, val1 ) {
				  	html+="<tr><td><input type='text' value='"+ val1.contactName+ "'/>  </td></tr>";
				  
				  	html+="</table>";

   	 			});
   	 	});
   	 }
   	 
   	 
</script>   	 
