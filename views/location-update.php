<?php include "master.php"; ?>
<form class="form-horizontal" role="form" method='post' id="location-update">
      <div class="form-group" id="start">
	    <label for="locationName" class="col-sm-1 control-label">Location:</label>
	    <div class="col-sm-3">
          <select id="locationName" name="locationName" class="form-control" onchange="get_location_data()" >
	      	<option id="0">--Select a Location--</option>
	      	<!-- <option id="1">Acura Stage</option> -->
          </select>
	   </div> 
      
          <div class="col-sm-4">
             <a href="#add" data-toggle="tab"><input type="button" id="AddLocation" class="btn btn-success" value=" + Location" /> </a> 
          </div>
      </div>
      <div class="form-group" id="locChange" >
	    <label for="newlocationName" class="col-sm-1 control-label">Location:</label>
	    <div class="col-sm-3">
          <input type="text" class="form-control newlocationName" id="newlocationName" name="newlocationName" />
	   </div> 
      </div>

      <div class="form-group" id="type">
	    <label for="newLocationType" class="col-sm-1 control-label">Type:</label>
	    <div class="col-sm-3">
          	<select class="form-control newlocationType" id="newlocationType" name="newlocationType">
      		<?php getLocationType(); ?>
	  	</select>

	   </div> 
      </div>
      <div class="form-group" id="beforeupdatedelete">
	    <div class="col-sm-4">
          	<input type="button" id="updateLoc" class="btn btn-warning" value="Update" />
          <!--	<input type="button" id="submit2" class="btn btn-primary" value="Delete" /> -->
	   </div> 
      </div>
      <div class="form-group" id="afterupdate" >
	    <div class="col-sm-4">
          	<input type="button" id="updateLocation" class="btn btn-warning" value="Update" />
          	<input type="button" id="reset" class="btn btn-primary" value="Cancel" />         	
	   </div> 
   </div> 
</form> 
<br />
<br />
<br />
<br />
<br />
<script>
	
	var loc;
	var tp;

	$(document).ready(function(){
				//on document load
				$("#locChange").hide();
				$("#type").hide();
				$("#afterupdate").hide();
				get_location_list();

			
	});

	
	function get_location_list(){
		
		$.post( "/services/locations.php")
		  .done(function( data ) {
			myObj = JSON.parse(data);
			var locations = [];			
			
			//go through each and put it in an array
			$.each(myObj, function( key, val ) {
				locations.push(val.location.locationName);
				$("#locationName").append(new Option(val.location.locationName, val.location.locationName));
				//alert(val.location.locationName);
			});
			//location = data;
			
		});
		
	}

	function get_location_data(){
		//empty the fields
		//$('#locationType').empty();
		
		//get the selected location
		loc = $("#locationName").val();											
		//alert(loc);															
																				
																				
		$.post( "services/locations.php")				
		  .done(function( data ) {												
			myObj2 = JSON.parse(data);											
			var location_data = [];												
																				
																				
			//go through each and put it in an array							
			$.each(myObj2, function( key, val ) {								
				if(loc == val.location.locationName){							
					$("#locationType").val(val.location.locationType);			
					//locid = val.location.locationID;																		
				}

				//alert(locid);
			});
						
			//location = data;
		});
			
	} 
	
	 $( "#updateLoc" ).click(function(){
	 
	 		$("#start").hide();
	 		$("#beforeupdatedelete").hide();
	 		$("#locChange").fadeIn();
	 		$("#type").fadeIn();
	 		$("#afterupdate").fadeIn();

	 		
	 		document.getElementById('newlocationName').value=loc;
	 		
	 		//alert(locid);
	 		//alert(document.getElementById('newlocationName').value);
	 		//alert(document.getElementById('locationType').value);
	 		
	
	});			
			
	 $( "#updateLocation" ).click(function(){
	 
	 		//newloc = document.getElementById("newlocationName").value;
			//newtype = document.getElementById("locationType").value;
			//id = document.getElementById("locationID").value;
			
			newloc = $("#newlocationName").val();
			newtype = $("#newlocationType").val();
			
			//alert(loc);
			//alert(newloc);
			//alert(newtype);
			
			$.post( "updateLocation2.php", {locationName: newloc, locationType: newtype, oldLocation: loc}, $( "#location-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						$("#start").fadeIn();
				 		$("#beforeupdatedelete").fadeIn();
				 		$("#locChange").hide();
				 		$("#type").hide();
				 		$("#afterupdate").hide();

						document.getElementById('locationName').value='--Select a Location--';
						document.getElementById('newlocationName').value='';
						document.getElementById('newlocationType').value='';
						window.location="../Location.php";

					}else{
						alert('failed');
					}

				});


	  		});
	  		
	   $( "#reset" ).click(function(){
	  
	  				
			$.post( "Location.php", $( "#location-update" ).serialize())
				.done(function (){

					$("#start").fadeIn();
				 		$("#beforeupdatedelete").fadeIn();
				 		$("#locChange").hide();
				 		$("#type").hide();
				 		$("#afterupdate").hide();


						document.getElementById('locationName').value='--Select a Location--';
						document.getElementById('newlocationName').value='';
						document.getElementById('locationType').value='';
				}); 


	  });

          $( "#DelLocation" ).click(function(){

                        var answer = confirm('Are you sure to delete this location?');

                        if (answer){
			
			    $.post( "deleteLocation2.php", $( "#location-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('locationName').value='--Select a Location--';
						document.getElementById('newlocationName').value='';
						document.getElementById('locationType').value='';
                                                window.location="../Location.php";
					}else{
						alert('failed');
					}

				});
                        }
                        


	  });

          $( "#AddLocation" ).click(function(){
		
		window.location="Location.php#add";

	  });


</script>