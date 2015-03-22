<?php include "master.php"; ?>
<div id="search">
	<form class="form-horizontal" role="form"  method='post' id="driver-update">
	  <div class="form-group" id="start">
	    <label for="name" class="col-sm-1 control-label">Driver:</label>
	    <div class="col-sm-3">
	      <input type="text" class="form-control name" id="name" name="name" placeholder="Driver Name">
	    </div>
            <div class="col-md-2">
              <button id="update-driver-search-btn" class="btn btn-primary" >Search</button>
            </div>
            <div class="col-sm-4">
             <a href="#add" data-toggle="tab"><input type="button" id="AddDriver" class="btn btn-success" value=" + Driver" /> </a> 
          </div>
	  </div>
          <div id="update-driver-results">
            <p>No results found</p>
          </div>

    <div id="infodriver">
	  <div class="form-group">
	    <label for="phone" class="col-sm-1 control-label">Phone:</label>
	    <div class="col-sm-3">
	      <input type="text" class="form-control phone" id="phone" name="phone" placeholder="Phone">
	    </div>
	  </div>
	  <div class="form-group" >
		<label for="vehicleName" class="col-sm-1 control-label">Vehicle Type:</label>
		<div class="col-sm-3" >
			<select id="vehicleName" name="vehicleName" class="form-control vehicleName"  >
	      		<option id="0">--Select a Vehicle--</option>
          	</select>
			<!--<input type="text" class="form-control vehicleName" id="vehicleName" name="vehicleName" placeholder="vehicleName"> -->
	   	</div> 
	  </div>
	  <div class="form-group">
	    <label for="license" class="col-sm-1 control-label">License #:</label>
	    <div class="col-sm-3">
	      <input type="text" class="form-control license" id="license" name="license" placeholder="License #">
	    </div>
	  </div>
	  
	   <div class="form-group" > 
		<div class="col-sm-4">
	       <input type="button" id="submit" class="btn btn-warning" value="Update" /> 
		</div> 
	  </div>
	  
	  <br />
	  <div>
		<fieldset>
			<legend align="top">Roster</legend>
			<div class="form-group">
				<label for="searchName" class="col-sm-1 control-label">Date:</label>
				<div class="col-sm-3">
				  <input type="text" class="form-control datepicker" id="dschedule_date" name="dschedule_date" placeholder="Schedule Date" />
				</div>
			</div>
			<div class="form-group">
				<label for="searchName" class="col-sm-1 control-label">Start: </label>
				<div class="col-sm-3">
				  <input type="text" class="form-control timepicker" id="start_time" name="start_time" placeholder="Start Time" />
				</div>
			</div>
			<div class="form-group">
				<label for="searchName" class="col-sm-1 control-label">End: </label>
				<div class="col-sm-3">
				  <input type="text" class="form-control timepicker" id="end_time" name="end_time" placeholder="End Time" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-1"></div>
				<div class="col-sm-4">
					<button type='button' class="btn btn-warning" id="driverScheduleSubmit">Update/Add to Roster</button>
					<button type='button' class="btn btn-danger" id="driverScheduleDelete">Delete Date from Roster</button>			  
				</div>
			</div>
		</fieldset>
		</div>
		
		<br /><br />
	 
		<div id="roster-results"></div>
	  
         </div> <!-- infodriver -->
         </div>
	</form>
</div>

<script>

        $("body").hide();
        // set up of the page when started 
		var found=0;
        $(document).ready(function(){
		
			$("body").show();
					//on document load
			$("#update-driver-results").hide();
			$("#infodriver").hide();

        });

        $("#update-driver-search-btn").click(function(event){
			 event.preventDefault(); 
			 get_driver_data();
			 //getVehicleNames();

			getDriversRoster();
		});	//btn click

	function get_driver_data(){
			//empty the fields
			//$('#phone').empty();
			//$('#vehicleName').empty(); 
			//$('#license').empty();
			
			//get the selected driver
			driver = $("#name").val();
			
			$.post( "/services/driver.php", { name: driver})
		    .done(function( data ) {
				myObj2 = JSON.parse(data);
				var driver_data = [];
						
				//go through each and put it in an array
				$.each(myObj2, function( key, val ) {
					if(driver == val.driver.name){
						//alert(val.driver.phone);
						$("#phone").val(val.driver.phone);
						//alert(val.driver.vehicleName);
						$("#vehicleName").val(val.driver.vehicleName); 
						//alert(val.driver.licenseNum);
						$("#license").val(val.driver.licenseNum);
						found = 1;
						$("#update-driver-results").hide();
						$("#infodriver").fadeIn();										
					}
				});
				if (found==0){
					$("#update-driver-results").fadeIn();
					$("#infodriver").hide();
				}
			
			});
			getDriversRoster();
			
	}
	
	$(document).ready(function(){
			//on document load
			$("#changes").hide();
			$( "#name" ).autocomplete({
      			source: "driverSearch.php"
    	              });

			//if ask to update contact
			$("#getInfo").click(function(){
					$("#driverUpdate").hide();
					$("#changes").fadeIn();
		    });
			
			//this post function loads the vehicles into the drop box.	
			$.post( "/services/vehicles.php", {})
			  .done(function( data ) {
				myObj2 = JSON.parse(data);
				var vehicle_data = [];
								
				//go through each and put it in an array 
				$.each(myObj2, function( key, val ) {
					//alert(val.vehicle.vehicleName);
					$("#vehicleName").append(new Option(val.vehicle.vehicleName,val.vehicle.vehicleName)); 
				});
			}); //post	
			
	});
	
	
	/*function getVehicleNames(){

		showLoading();
		//appends the vehicles to the drop box on top of the one that is already selected
		var vehicles = $.post( "/services/vehicles.php", {})
			.always(function(){
				stopLoading();
			})
		   .fail(function() {
			  //alert("There was an error loading data");
			  deferred.reject();
			})	
			.done(function( data ) {
			var obj = JSON.parse(data);
			deferred.resolve(data);
				
			$("#vehicleName").append(new Option("--Select a Vehicle--",""));	
			//go through each and put it in an array
			$.each(obj, function( key, val ) {
				$("#vehicleName").append(new Option(val.vehicle.vehicleName,val.vehicle.vehicleName));
			});
			stopLoading();
			//contact = data;
		});//post	
		
		return deferred;
	}*/
	
	
 
	
	$( "#submit" ).click(function(){
			
			driver = $("#name").val();
			ph = $("#phone").val();
			veh = $("#vehicleName").val();
			lic = $("#license").val();
			$.post( "updateDriver2.php", {name: driver, phone: ph, vehicleName: veh, licenseNum: lic}, $( "#driver-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						//document.getElementById('name').value='';
						//document.getElementById('phone').value='';
						//document.getElementById('vehicleName').value='';
						//document.getElementById('license').value='';
                        //window.location="../Driver.php";
					}else{
						alert('failed');
					}

				});


	  });
	  
	  $( "#driverScheduleSubmit" ).click(function(){
		  
			driver = $("#name").val();
			$( "#dschedule_date" ).datepicker("option", "dateFormat", "yy-mm-dd" );
			rundate = $("#dschedule_date").val();
			starttime = $("#start_time").val();
			stime = standardToMil(starttime);
			endtime = $("#end_time").val();
			etime = standardToMil(endtime);
			
			$.post( "fillRoster.php", {name: driver, runDate: rundate, startTime: stime, endTime: etime}, $( "#driver-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('dschedule_date').value='';
						document.getElementById('start_time').value='';
						document.getElementById('end_time').value=''; 

					}else{
						alert('failed');
					}

				});
			$( "#dschedule_date" ).datepicker("option", "dateFormat", "DD, MM d, yy" ); 
			getDriversRoster();
	  })
	  
	  $( "#driverScheduleDelete" ).click(function(){
		  
			driver = $("#name").val();
			$( "#dschedule_date" ).datepicker("option", "dateFormat", "yy-mm-dd" );
			rundate = $("#dschedule_date").val();
			
			$.post( "delFromRoster.php", {name: driver, runDate: rundate}, $( "#driver-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('dschedule_date').value='';
						document.getElementById('start_time').value='';
						document.getElementById('end_time').value=''; 

					}else{
						alert('failed');
					}

				});
			$( "#dschedule_date" ).datepicker("option", "dateFormat", "DD, MM d, yy" );  
			getDriversRoster();
	  })
	  
	  function getDriversRoster(){
		  
		  driver = $("#name").val();
		  var html="";
		  $.post( "/services/getRoster.php", {name: driver})
					.done(function( data ) {
					myObj = JSON.parse(data);
					
						if(data==0)
							$("#roster-results").html("No results found");  
			 
						html+="<br /><table>";
						
						html+="<tr><th>Date</th><th>Start time</th><th>End time</th></tr>";
					
						$.each(myObj, function( key, val ) {
							
							//this algorithm is needed because date when formatted is pushed back 1 day--------------*/
							var d = new Date(val.driver.runDate+"T00:00:00");
	
							newestDate = (new Date(d.getTime() + d.getTimezoneOffset()*60000));
							var newdate = $.datepicker.formatDate("D, M d, yy", new Date(newestDate));
							
							html+="<tr><td>"+ newdate +"</td><td>"+ milToStandard(val.driver.startTime) +"</td><td>"+ milToStandard(val.driver.endTime) +"</td></tr>";
						});
						html+="</table>";
						$("#roster-results").html(html);
					});
	  }
	  
	  /*$( "#DelDriver" ).click(function(){

                        var answer = confirm('Are you sure to delete this driver?');

                        if (answer){
			
			    $.post( "deleteDriver2.php", $( "#driver-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('name').value='';
						document.getElementById('phone').value='';
						document.getElementById('vehicleName').value='';
						document.getElementById('license').value='';
                        window.location="../Driver.php";
					}else{
						alert('failed');
					}

				});
                        }
                        


	  });*/

          $( "#AddDriver" ).click(function(){
			
            $("#start").hide();
			$("#infodriver").hide();
			window.location="Driver.php#add";

	  });



</script>
