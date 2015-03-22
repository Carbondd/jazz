<?php include "master.php"; ?>
<form class="form-horizontal" role="form" action='updateTrip.php' method='post'>
  <div class="form-group">
    <label for="bandName" class="col-sm-1 control-label">Band:</label>
    <div class="col-sm-3">
      <input onchange="get_dates()" type="text" class="form-control bandName" id="bandName" name="bandName" placeholder="Band Name">
    </div>
    <div class="col-sm-1">
      <a href="#add" data-toggle="tab"><input type="button" id="AddRun" class="btn btn-success" value=" + Run" /> </a>
    </div>
    <label for="tpDt" class="col-sm-1 control-label">Trip Dates:</label>
    <div class="col-sm-2" id="oldDate">
      <select id="tpDt" name="tpDt" class="form-control" onblur="get_date_times()">
	      <option id="0">--Select a Date--</option>
      </select>
    </div>
    

    <div class="col-sm-2" id="newDate">
      <input type="text" class="form-control" id="tripDate" name="tripDate" placeholder="Change Date">
    </div>
    
    <label for="tim" class="col-sm-1 control-label">P/U Times:</label>
    <div class="col-sm-2" id="oldTime">
      <select id="tim" name="tim" class="form-control" onclick="get_times()">
	      <option id="0">--Select a Time--</option>
      </select>
    </div>
	
	<div class="col-sm-2" id="newTime">
      <select class="form-control" id="pickUpTime" name="pickUpTime" placeholder="Change Time">
            <!--<option value="none">Change Time</option> -->
            <?php getTimesOption(); ?> 
        </select>    
    </div>
  </div>
   <div class="form-group">
    <label for="bandName" class="col-sm-1 control-label"></label>
    <div class="col-sm-3">
      
    </div>
	    <div class="col-sm-2" id="delRun">
	      <input type="button" id="submit2" class="btn btn-danger" value=" - Run" />    
	    </div>
    <div class="col-sm-3" id="oldDate">
     <input type="button" align="right" id="changeDate" class="btn btn-warning" value="Change Date" />
     <input type="button" align="right" id="cancelchangeDate" class="btn btn-primary" value="Cancel" />

	 <!--<div class="col-sm-2">
      
     </div> -->
    </div>
    <div class="col-sm-2" id="oldTime">
      <input type="button" align="right" id="changeTime" class="btn btn-warning" value="Change Time" />
      <input type="button" align="right" id="cancelchangeTime" class="btn btn-primary" value="Cancel" />
      <!--<div class="col-sm-2">
      
      </div> -->
    </div>

	<input name='tripID' id="tripID" type='hidden'>
  </div>
  
  <hr>
  
  <div id="showafterstart">
	     <div class="form-group">
	        <br /><br /><br />
		    <label for="cNames" class="col-sm-1 control-label">Contact:</label>
		    <div class="col-sm-3">
	          <select id="cNames" size="5" name="cNames" class="form-control" onclick="get_ct_data()" >
		      	<!--<option id="0">Contacts</option>-->
	          </select>
		   </div>
	       <div class="col-sm-2">
		    	<button type="button" id="addContact" class="btn btn-success" onclick="get_all_contacts()"><span style="font-size:12px;" class="glyphicon glyphicon-plus"></span> Contact</button><br /><br /> 
	      		<button type="button" id="delContact" class="btn btn-danger"><span style="font-size:12px;" class="glyphicon glyphicon-minus"></span> Contact</button>
		   </div>
		   <div class="col-sm-3" id="adCont">
	          <select id="adcontacts" name="adcontacts" class="form-control">
		      	<option id="0">--Select contact to be added--</option>
	          </select>
		   </div>
		   <div class="col-sm-2" id="cancelAdCont">
		      <div>
		   		<input type="button" align="right" id="addCtct" class="btn btn-success" value="Add" onclick="get_ct_ID()"  />
	          	<input type="button" align="right" id="cancelAdContact" class="btn btn-primary" value="Cancel" />
	          </div>
		   </div>
		    
		   <div class="col-sm-3" id="delCont">
	          <select id="delcontacts" name="delcontacts" class="form-control" onclick="get_ct_data()">
		      	<option id="0">--Select contact to be deleted--</option>
	          </select>
		   </div>
		   <div class="col-sm-2" id="cancelDelCont">
		      <div>

		   		<input type="button" align="right" id="delCtct" class="btn btn-danger" value="Delete" />
	          	<input type="button" align="right" id="cancelDelContact" class="btn btn-primary" value="Cancel" />
	          </div>
		    </div>

	      </div>
	            
	      <div class="form-group" >
		    <label for="ctPhone" class="col-sm-1 control-label">Phone:</label>
		    <div class="col-sm-3" id="oldPhone">
	          	<input disabled type="text" class="form-control ctPhone" id="ctPhone" name="ctPhone" placeholder="Contact Phone">
		    </div>
	      </div>
	      <div class="form-group" >
		    <label for="tpMgr" class="col-sm-1 control-label">Type:</label>
		    <div class="col-sm-3" id="oldType">
	          	<input disabled type="text" class="form-control tpMgr" id="tpMgr" name="tpMgr" placeholder="Type Manager">
		    </div>
	      </div>
	      

     <input name='contactID' id="contactID" type='hidden'>
     </div>
  
<hr>
	  <div class="form-group" >
		<label for="pkUp" class="col-sm-1 control-label">P/U:</label>
		<div class="col-sm-3" id="PU">
	    	<input disabled type="text" class="form-control pkUp" id="pkUp" name="pkUp" placeholder="P/U Location">
		</div>
		<div class="col-sm-3"  id="newPickUp">
	      <input type="button" id="newPU" class="btn btn-warning" value="Change"  onclick="get_location_list('PU')" />
	    </div>
	    <div class="col-sm-3" id="changePU">
	      <select id="locationName" name="locationName" class="form-control" >
		    <option id="0">--Select a Location--</option>
		    <!-- <option id="1">Acura Stage</option> -->
	      </select>
		</div>  
	  	<div class="col-sm-2" id="cancelChangePickUp">
		    <input type="button" align="right" id="cancelChangePU" class="btn btn-primary" value="Cancel" />
		</div>
	 </div>
	 
  <hr>
 	<div class="form-group" >
		<label for="dpOff" class="col-sm-1 control-label">D/O:</label>
		<div class="col-sm-3" id="DO">
    		<input disabled type="text" class="form-control dpOff" id="dpOff" name="dpOff" placeholder="D/O Location">
		</div>
		<div class="col-sm-3" id="newDropOff">
      		<input type="button" id="newDO" class="btn btn-warning" value="Change" onclick="get_location_list('DO')" />
    	</div>
	    <div class="col-sm-3" id="changeDO">
          	<select id="locName" name="locName" class="form-control">
	      		<option id="0">--Select a Location--</option>
	      		<!-- <option id="1">Acura Stage</option> -->
          	</select>
		</div>
		<div class="col-sm-2" id="cancelChangeDropOff">
		    <input type="button" align="right" id="cancelChangeDO" class="btn btn-primary" value="Cancel" />
		</div>    
	 </div>
 
  <hr>
	 <div class="form-group" >
		<label for="drivername" class="col-sm-1 control-label">Driver:</label>
		<div class="col-sm-3" id="driv">
	    	<input disabled type="text" class="form-control drivername" id="drivername" name="drivername" placeholder="Name">
		</div>
		<div class="col-sm-3" id="newdriver">
	      <input type="button" id="newDriver" class="btn btn-warning" value="Change" />
	    </div> 
	    <div class="col-sm-3" id="changeDriver">  
	      <input type="text" class="form-control newdrivername" id="newdrivername" name="newdrivername" placeholder="Name">
	    </div>
	    <div class="col-sm-2" id="cancelchangeDriver">
		    <input type="button" align="right" id="cancelnewDriver" class="btn btn-primary" value="Cancel" />
		</div>
	 </div>
  
  <hr>
	 <div class="form-group"  >
		<label for="vehicleName" class="col-sm-1 control-label">Vehicle:</label>
		<div class="col-sm-3" id="vehicle">
	    	<input disabled type="text" class="form-control vehicName" id="vehicName" name="vehicName" placeholder="Vehicle Name">
		</div>
		<div class="col-sm-3" id="newvehic">
	      <input type="button" id="newVehic" class="btn btn-warning" value="Change"  onclick="get_all_vehicles()" />
	    </div>
	    <div class="col-sm-3" id="changeVehicle">
	      <select id="newvehicName" name="newvehicName" class="form-control" >
	      	<option id="0">--Select a Vehicle--</option>
          </select>  
	    </div>
	    <div class="col-sm-2" id="cancelchangeVehic">
		  <input type="button" align="right" id="cancelnewVehic" class="btn btn-primary" value="Cancel" />
		</div> 
	 </div>
  
  <hr>
  <div class="form-group" id="forUpdate">
    <div class="col-sm-2">
      <input type="button" id="updateRun" class="btn btn-warning" value="Update Run" />   
    </div>
       	
	<div class="col-sm-2" id="dn">
	  <input type="button" id="done" class="btn btn-primary" value="Done" />
	</div>     
  </div>


</form>

<script>

	var changePUFlag=0; 	// need to know how many times will be clicked on change or cancel
	var changeDOFlag=0; 	// same for DO
	var oldPU, oldDO;		// save the values of PU and DO before changing
	var changeDriverFlag=0; // need to know how many times will be clicked on change or cancel
	var changeVehicFlag=0; 	// same for Vehicle
	var oldDriver, oldVehic;// save the values of Driver and Vehicle before changing
	var changeDateFlag=0; 	// need to know how many times will be clicked on change or cancel
	var changeTimeFlag=0; 	// same for Time
	var oldDate, oldTime;	// save the values of Date and Time before changing


	$("body").hide();

	$(function() {
    	$( "#tripDate" ).datepicker({ dateFormat: "yy-mm-dd" });
  	});
  
	$(document).ready(function(){
				$("body").show();
				//on document load
				$("#newDate").hide();
				$("#newTime").hide();
				$("#adCont").hide();
				$("#cancelAdCont").hide();
				$("#delCont").hide();
				$("#cancelDelCont").hide();
				$("#changePU").hide();
				$("#cancelChangePickUp").hide();
				$("#changeDO").hide();
				$("#cancelChangeDropOff").hide();
				$("#changeDriver").hide();
				$("#cancelchangeDriver").hide();
				$("#changeVehicle").hide();
				$("#cancelchangeVehic").hide();
	});


	$(function() {
			//autocomplete
			
			var select = false;
			$(".bandName").autocomplete({
			source: "groupSearch.php",
			minLength: 1			    
			});
	
   	 });
   	 
   	 function get_dates(){
		$('#tpDt').empty();
		band = $("#bandName").val();
		//alert(band);
		$.post( "http://jazz.carbondd.com/services/trips.php", { bandName: band})
		  .done(function( data ) {
			myObj = JSON.parse(data);
			var trips = [];
			var dt1, dt2="";
			
			//go through each and put it in an array
			$.each(myObj, function( key, val ) {
				//dt1 = ((val.trip.tripDate).toString("MM/DD/YYYY"));
				dt1 = (val.trip.tripDate);
				//alert(dt);
				// list only the unique dates
				if (dt2!=dt1){
					dt2=dt1;
					trips.push(dt2);
					$("#tpDt").append(new Option(dt2, dt2));
					//alert(val.trip.tripDate);
				}
			});
		});
	
	}
	
	function get_date_times(){
		//empty the fields
		$('#tim').empty();
		
		//get the selected contact
		date = $("#tpDt").val();
		//alert(date);
		band = $("#bandName").val();
		$.post( "http://jazz.carbondd.com/services/trips.php", { bandName: band})
		  .done(function( data ) {
			myObj2 = JSON.parse(data);
			var times = [];
			var tm1, tm2="";
			
			
			//go through each and put it in an array
			$.each(myObj, function( key, val ) {	
				// if the date picked is equal to the date in the array
				//if (date == ((val.trip.tripDate).toString("MM/dd/yyyy"))){
				if (date == (val.trip.tripDate)){
					//alert(val.trip.pickUpTime);
					// list only the unique times for that particular date
					//tm1 = date_format(val.trip.pickUpTime, 'G:ia');
					tm1 = (val.trip.pickUpTime);
					if (tm2!=tm1) {
						tm2=tm1;
						//<?php print( date("g:i a", strtotime(tm2))); ?>
						//alert(tm2);
						times.push(tm2);
						$("#tim").append(new Option(tm2, tm2));
					}
				}
			});
		});
			
	}

	// get all information for a specific date and time
	// information like contacts names planned for this trip, pickup and dropoff locations, driver, vehicle
	function get_times(){
		
		$('#cNames').empty();
		$('#delcontacts').empty(); // in case a contact needs to be deleted from the trip
		$('#pkUp').empty();
		$('#dpOff').empty();
		$('#name').empty();
		$('#vehicName').empty();

		band = $("#bandName").val();
		//alert(band);
		$.post( "http://jazz.carbondd.com/services/trips.php", { bandName: band})
		  .done(function( data ) {
			myObj2 = JSON.parse(data);
			var cNames = [];
			
			//go through each and put it in an array
			$.each(myObj2, function( key, val ) {
				// get the contacts for that date at that time
				if (($("#tim").val()==val.trip.pickUpTime) && (date==val.trip.tripDate)){
					//bandid = val.trip.bandID;
					//alert(bandid);
					cNames.push(val.trip.contactName);
					$("#cNames").append(new Option(val.trip.contactName, val.trip.contactName));
					$("#delcontacts").append(new Option(val.trip.contactName, val.trip.contactName));

					$("#cNames")[0].selectedIndex = 0;
					$("#delcontacts")[0].selectedIndex = 0;
					
				}
			});

			//go through each and put it in an array
			$.each(myObj2, function( key, val ) {
				// get the info for that date at that time
				if (($("#tim").val()==val.trip.pickUpTime) && (date==val.trip.tripDate)){
					bandid = val.trip.bandID;
					//alert(bandid);
					$("#pkUp").val(val.trip.pickUp);
					oldPU = $("#pkUp").val();
					$("#dpOff").val(val.trip.dropOff);
					oldDO = $("#dpOff").val();
					$("#drivername").val(val.trip.name);
					oldDriver = $("#drivername").val();
					$("#vehicName").val(val.trip.vehicleName);
					oldVehic = $("#vehicName").val();	
					
					oldTime = $("#tim").val();
					oldDate = date;	
					//alert(oldDate);
					//alert(oldTime);								
				}

			});
			
			// find tripID for this specific trip: band, date and time
			$.each(myObj2, function( key, val ) {
			
				if ((bandid==val.trip.bandID) && ($("#tim").val()==val.trip.pickUpTime) && (date==val.trip.tripDate)){
				
					$("#tripID").val(val.trip.tripID);
					tripid = $("#tripID").val();
					//alert(tripid);
				}
	
			});
			get_ct_data();
		});
		
	}
	
	// contact data, like phone and type mgr, for a specific contact in this band
	function get_ct_data(){
	
		//empty the fields
		$('#ctPhone').empty();
		$('#tpMgr').empty();
		
		//get the selected contact
		ct = $("#cNames").val();

		band = $("#bandName").val();

		$.post( "http://jazz.carbondd.com/services/contacts.php", { bandName: band})
		  .done(function( data ) {
			myObj2 = JSON.parse(data);
			var contact_data = [];
			
			
			//go through each and put it in an array
			$.each(myObj2, function( key, val ) {
				if(ct == val.contact.contactName){
							
					// for existing bands
					$("#ctPhone").val(val.contact.contactPhone);		
					$("#tpMgr").val(val.contact.typeMgr);
	
				}
								
				//alert(val.contact.bandID);
			});
			
		});
			
	}


	function get_location_list(loc){	
	
		
		$.post( "http://jazz.carbondd.com/services/locations.php")
		  .done(function( data ) {
			myObj = JSON.parse(data);
			var locations = [];	
			var locs = [];	
			
			//$("#locationName").append(new Option("--Select a Hotel--",""));
			//$("#locName").append(new Option("--Select a Stage--",""));			
						
			//go through each and put it in an array

			if(loc=="PU"){
				$("#locationName").empty();
				
				//go through each and put it in an array
				$.each(myObj, function( key, val ) {
				
					locations.push(val.location.locationName);
					$("#locationName").append(new Option(val.location.locationName, val.location.locationName));

				});
			}
			
			if(loc=="DO"){
				$("#locName").empty();
				
				//go through each and put it in an array
				$.each(myObj, function( key, val ) {

					locs.push(val.location.locationName);
					$("#locName").append(new Option(val.location.locationName, val.location.locationName));

				});

			}
			
							
		});
		
	}

	// all existing contacts for this band
	function get_all_contacts(){
	
		$('#adcontacts').empty();

		band = $("#bandName").val();
		$.post( "http://jazz.carbondd.com/services/contacts.php", { bandName: band})
		  .done(function( data ) {
			myObj = JSON.parse(data);
			var ctacts = [];
	
			
			//go through each and put it in an array
			$.each(myObj, function( key, val ) {
				ctacts.push(val.contact.contactName);
				$("#adcontacts").append(new Option(val.contact.contactName, val.contact.contactName));
				//$("#adcontacts")[0].selectedIndex = 0; // get first item highlighted - first choice

			});
			
			//get_ct_ID();
		});
	}
	
	// contact data, like phone and type mgr, for a specific contact in this band
	function get_ct_ID(){

		//get the selected contact
		adct = $("#adcontacts").val();
		alert(adct);

		band = $("#bandName").val();

		$.post( "http://jazz.carbondd.com/services/contacts.php", {bandName: band})
		  .done(function( data ) {
			myObj2 = JSON.parse(data);
			var contact_data = [];
			
			
			//go through each and put it in an array
			$.each(myObj2, function( key, val ) {
				if(adct == val.contact.contactName){
					
					$("#contactID").val(val.contact.contactID);		
					contactid = $("#contactID").val();
					//alert(contactid);
	
				}
								
				//alert(val.contact.bandID);
			});
			
		});
			
	}

	$(function() {
	    //autocomplete for a driver
	    $("#newdrivername").autocomplete({
	    source: "driverSearch.php",
	    minLength: 1
    	});	
    });
    
    function get_all_vehicles(){
	
		$('#newvehicName').empty();

		$.post( "http://jazz.carbondd.com/services/vehicles.php")
		  .done(function( data ) {
			myObj = JSON.parse(data);
			var vehics = [];
			
			//go through each and put it in an array
			$.each(myObj, function( key, val ) {
				vehics.push(val.vehicle.vehicleName);
				$("#newvehicName").append(new Option(val.vehicle.vehicleName, val.vehicle.vehicleName));
				//$("#newvehicName")[0].selectedIndex = 0; // get first item highlighted - first choice

			});
		});
	}


	$( "#changeDate" ).click(function(){
			
			changeDateFlag++;
			$("#oldDate").hide();
			$("#newDate").fadeIn();
	});
	
	$( "#cancelchangeDate" ).click(function(){
			
			changeDateFlag++;
			$("#newDate").hide();
			$("#oldDate").fadeIn();
	});

	
	$( "#changeTime" ).click(function(){
			
			changeTimeFlag++;
			$("#oldTime").hide();
			$("#newTime").fadeIn();
	});
	
	$( "#cancelchangeTime" ).click(function(){
			
			changeTimeFlag++;
			$("#newTime").hide();
			$("#oldTime").fadeIn();
	});


	$( "#addContact" ).click(function(){
			
			$("#delCont").hide();
			$("#cancelDelCont").hide();
			$("#adCont").fadeIn();
			$("#cancelAdCont").fadeIn();
	});
	
	// when click on cancel to cancel adding a new cntact to the list
	  $( "#cancelAdContact" ).click(function(){
			
			$("#adCont").hide();
			$("#cancelAdCont").hide();
	  })
	
	$( "#delContact" ).click(function(){
			
			$("#adCont").hide();
			$("#cancelAdCont").hide();
			$("#delCont").fadeIn();
			$("#cancelDelCont").fadeIn();
	});
	
	//when click on Cancel to delete a contact from the list
	   $( "#cancelDelContact" ).click(function(){
			
			$("#delCont").hide();
			$("#cancelDelCont").hide();
	   });

	
	//when click on Add new contact added to the trip
	$( "#addCtct" ).click(function(){
	
		//tripid = $("#tripID").val();
		//contactid = $("#contactID").val();
		alert(tripid);
		alert(contactid);
	
		$.post( "addTripContact.php", {tripID: tripid, contactID: contactid}, $( "#trip-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('adcontacts').value='';

					}else{
						alert('failed');
					}

		});
		$("#adCont").hide();
		$("#cancelAdCont").hide();

	});
	
	$( "#delCtct" ).click(function(){
	
		//tripid = $("#tripID").val();
		//contactid = $("#contactID").val();
		alert(tripid);
		alert(contactid);
	
		$.post( "delTripContact.php", {tripID: tripid, contactID: contactid}, $( "#trip-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('adcontacts').value='';

					}else{
						alert('failed');
					}

		});
		$("#delCont").hide();
		$("#cancelDelCont").hide();

	});


	
	$( "#newPU" ).click(function(){
			
			changePUFlag++;
			$("#PU").hide();
			$("#newPickUp").hide();
			$("#changePU").fadeIn();
			$("#cancelChangePickUp").fadeIn();
	});
	
	$( "#cancelChangePU" ).click(function(){
			
			changePUFlag++;
			$("#changePU").hide();
			$("#cancelChangePickUp").hide();
			$("#PU").fadeIn();
			$("#newPickUp").fadeIn();
	});
	
	$( "#newDO" ).click(function(){
			
			changeDOFlag++;
			$("#DO").hide();
			$("#newDropOff").hide();
			$("#changeDO").fadeIn();
			$("#cancelChangeDropOff").fadeIn();
	});
	
	$( "#cancelChangeDO" ).click(function(){
			
			changeDOFlag++;
			$("#changeDO").hide();
			$("#cancelChangeDropOff").hide();
			$("#DO").fadeIn();
			$("#newDropOff").fadeIn();
	});
	
	$( "#newDriver" ).click(function(){
			
			changeDriverFlag++;
			$("#driv").hide();
			$("#newdriver").hide();
			$("#changeDriver").fadeIn();
			$("#cancelchangeDriver").fadeIn();
	});
	
	$( "#cancelnewDriver" ).click(function(){
			
			changeDriverFlag++;
			$("#changeDriver").hide();
			$("#cancelchangeDriver").hide();
			$("#driv").fadeIn();
			$("#newdriver").fadeIn();
	});

	$( "#newVehic" ).click(function(){
			
			changeVehicFlag++;
			$("#vehicle").hide();
			$("#newvehic").hide();
			$("#changeVehicle").fadeIn();
			$("#cancelchangeVehic").fadeIn();
	});
	
	$( "#cancelnewVehic" ).click(function(){
			
			changeVehicFlag++;
			$("#changeVehicle").hide();
			$("#cancelchangeVehic").hide();
			$("#vehicle").fadeIn();
			$("#newvehic").fadeIn();
	});

	$( "#updateRun" ).click(function(){
	  
	  		// the number of times clicking on change or cancel will be added
	  		// if %2 is equal to 1, i.e. a change has happened then
	  		//		copy new value into the old labels (objects)
	  		
			// if %2 os equal tp 0, i.e. no change has happened or it's undone by cancel
			//		copy old value back into the old labels (objects			
	
			if (changePUFlag%2==1){
				document.getElementById('pkUp').value=$("#locationName").val();
			}
			else if (changePUFlag%2==0){
				document.getElementById('pkUp').value=oldPU;
			}

			if (changeDOFlag%2==1){
				document.getElementById('dpOff').value=$("#locName").val();
			}
			else if (changeDOFlag%2==0){
				document.getElementById('dpOff').value=oldDO;
			}
			
			if (changeDriverFlag%2==1){
				document.getElementById('drivername').value=$("#newdrivername").val();
			}
			else if (changeDriverFlag%2==0){
				document.getElementById('drivername').value=oldDriver;
			}

			if (changeVehicFlag%2==1){
				document.getElementById('vehicName').value=$("#newvehicName").val();
			}
			else if (changeVehicFlag%2==0){
				document.getElementById('vehicName').value=oldVehic;
			}
			
			if (changeDateFlag%2==1){
				document.getElementById('tpDt').value=$("#tripDate").val();
			}
			else if (changeDateFlag%2==0){
				document.getElementById('tpDt').value=oldDate;
			}
			
			if (changeTimeFlag%2==1){
				document.getElementById('tim').value=$("#pickUpTime").val();
				alert($("#pickUpTime").val());
				alert($("#tim").val());
			}
			else if (changeTimeFlag%2==0){
				document.getElementById('tim').value=oldTime;
			}


/*
			if ($("#tpDt").val() != $("#tripDate").val() && $("#tripDate").val() != 'Change Date'){
				document.getElementById('tpDt').value=$("#tripDate").val();
				//alert($("#pfDt").val());
			}
		
			if ($("#tim").val() != $("#pickUpTime").val() && $("#pickUpTime").val() != 'Change Time'){
				document.getElementById('tim').value=$("#pickUpTime").val();
				//alert($("#pfTm").val());
			}
*/

			// copy values from objects into local variables
			var tid=$("#tripID").val();
			var piup=$("#pkUp").val();
			var drof=$("#dpOff").val();
			var driver=$("#drivername").val();
			var vehic=$("#vehicName").val();
			var Dt=$("#tpDt").val();
			var Tm=$("#tim").val();

			//alert(tid);
			//alert(piup);
			//alert(drof);
			//alert(driver);
			//alert(vehic);
			//alert(Dt);
			alert(Tm);

			//update the trip
			$.post( "updateTrip2.php", {tripID: tid, tripDate: Dt, pickUpTime: Tm, pickUp: piup, dropOff: drof, bandName: band, name: driver, vehicleName: vehic}, $( "#bandcontact-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						
						$("#PU").fadeIn();
						$("#newPickUp").fadeIn();
						$("#changePU").hide();
						$("#cancelChangePickUp").hide();
						$("#DO").fadeIn();
						$("#newDropOff").fadeIn();
						$("#changeDO").hide();
						$("#cancelChangeDropOff").hide();
						$("#driv").fadeIn();
						$("#newdriver").fadeIn();
						$("#changeDriver").hide();
						$("#cancelchangeDriver").hide();
						$("#vehicle").fadeIn();
						$("#newvehic").fadeIn();
						$("#changeVehicle").hide();
						$("#cancelchangeVehic").hide();
						

						$("#oldDate").fadeIn();
						$("#changeDate").fadeIn();
						$("#newDate").hide();
						//$("#cancelchangeDate").hide();
						$("#oldTime").fadeIn();
						$("#changeTime").fadeIn();
						$("#newTime").hide();
						//$("#cancelchangeTime").hide();
						
						
					}else{
						alert('failed');
					}

			});
			
	  });
	

	// once the update to the trip is added, the user can click on Done

	 $( "#done" ).click(function(){
	 							
			window.location="Trip.php";
	 
	 });



	$( "#AddRun" ).click(function(){
			
			window.location="Trip.php#add";

	});


</script>