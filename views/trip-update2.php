<div style="width:100%; display:inline-block;">
  <form class="form-horizontal" id="trip-update2" role="form" method="post">
    <label class="col-sm-1 control-label" for="bandName">Band: </label>
    <div class="col-md-2">
      <input type="text" class="form-control bandName" name="bandName" id="updateBandName2" placeholder="Band Name">
    </div>
	<label class="col-sm-1 control-label" for="dt">Date: </label>
    <div class="col-md-2"> 
      <input type="text" class="form-control datepicker" name="rawdate" id="update-date-search" placeholder="Date">
	  <input type='hidden' class='date_alternate' name='date' />
    </div>
    <div class="col-md-2"> 
      <button id="update-run-search-btn" class="btn btn-primary" >Search</button>
    </div>
    <div class="col-sm-2">
      <a href="#add" data-toggle="tab"><input type="button" id="AddRun" class="btn btn-success" value=" + Run" /> </a> 
    </div>
  </form>
</div>
<br />
<div id="searchedFor"><h3 id="bandSearchedFor"></h3> <h3 id="dateSearchedFor"></h3></div>
<div id="update-trip-results"></div>
<br />
<br />
<br />
<br />
<br />


<script type="text/javascript">

	var contactIDs = [];	//has to be defined now. associated with contacts based on  
	var runID;
	var tripIDs;
	var deferred = new $.Deferred();
	var bandNameVal;

	$("#update-run-search-btn").click(function(event){
		event.preventDefault(); 
		getTripInfo();

	});	//btn click

	function getLocations(){

		showLoading();
		//appends the locations to the drop box on top of the one that is already selected
		var locations = $.post( "/services/locations.php", {})
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
				
				
			//go through each and put it in an array
			$.each(obj, function( key, val ) {
				$(".locations").append(new Option(val.location.locationName,val.location.locationName));
			});
			//contact = data;
		});//post	
		
		return deferred;
	}

	function getDriverNames(){

		showLoading();
		//appends the drivers to the drop box on top of the one that is already selected  
		var drivers = $.post( "/services/getDrivers.php", {})
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
				
				
			//go through each and put it in an array
			$.each(obj, function( key, val ) {
				$(".drivers").append(new Option(val.driver.name,val.driver.name));
			});

			//contact = data;
		});//post	
		
		return deferred;
	}

    function getVehicleNames(){

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
				
				
			//go through each and put it in an array
			$.each(obj, function( key, val ) {
				$(".vehicles").append(new Option(val.vehicle.vehicleName,val.vehicle.vehicleName));
			});

			//contact = data;
		});//post	
		
		return deferred;
	}


	function getTripIDs(){

		var getIDs = $.post( "/services/trips.php", {bandName: band})
		  .always(function() {

			})
		  .fail(function() {
			  //alert("There was an error loading data");
			})	
		  .done(function( data ) {
			myObj = JSON.parse(data);
			
			//empty the array
			tripIDs = [];
			
			//go through each and put it in an array
			$.each(myObj, function( key, val ) {
				getTripContacts(val.tripID);
			});
		});	//post

		return tripIDs;
	}
	function setTripIDs(val){
		tripIDs.push(val);
	}
	function getTripInfo(){
		//this post function loads the locations into the drop box.	  
		showLoading(); 
		
		//get the band
		band = $("#updateBandName2").val();
		date = $("#update-date-search").val();
		//var tempDate = $(".date_alternate").val();

		var amountTrips = 0;
		var allContacts = [];
		var info = $("#trip-update2").serializeArray()
		//post to php page to list of runs
		var printTrips = $.post( "/services/trips.php", info)
		  .always(function() {
				stopLoading(); 
			})
		  .fail(function() {
			  html = "No results found.";
			  $("#update-trip-results").html(html);
			  deferred.reject();
			})	
		  .done(function( data ) {
			  //document.write(data);
			myObj = JSON.parse(data);
			//print the table  glyphicon glyphicon-map-marker
			

			var html = "";
			
			//go through each and put it in an array 
			$.each(myObj, function( key, val ) {
				amountTrips++;
				$("#showgetdriver-"+val.tripID).hide();
				//Ryan's algorithm is needed because date when formatted is pushed back 1 day--------------//
				var d = new Date(val.tripDate+"T00:00:00");
	
				newestDate = (new Date(d.getTime() + d.getTimezoneOffset()*60000));
				var newdate = $.datepicker.formatDate("D, M d, yy", new Date(newestDate));	

				html+="<div class='col-sm-12 contact-set' id='set-"+val.tripID+"'><span id='band-name-"+val.tripID+"'></span><form><table class='table' ><tr><th class='update-date-col'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span></th><th class='update-pickup-time-col'><span class='glyphicon glyphicon-time' aria-hidden='true'><span class='glyphicon glyphicon-arrow-up' aria-hidden='true'></th><th class='update-dropoff-location-col'><span class='glyphicon glyphicon-map-marker' aria-hidden='true'><span class='glyphicon glyphicon-arrow-up' aria-hidden='true'></th><th class='update-pickup-location-col'><span class='glyphicon glyphicon-map-marker' aria-hidden='true'><span class='glyphicon glyphicon-arrow-down' aria-hidden='true'><th class='update-duration-col'><span class='glyphicon glyphicon-time' aria-hidden='true'>(min)</th><th class='update-driver-col'><span class='glyphicon glyphicon-road' aria-hidden='true'></th><th class='update-passengers-col'>#<span class='glyphicon glyphicon-user' aria-hidden='true'></th><th class='update-vehicle-col'><span class='glyphicon glyphicon-transfer' aria-hidden='true'></th></tr>";
								
				html+="<tr><td><input type='hidden' value='"+ val.tripID + "' /><input id='newdate-"+val.tripID+"' type='text' class='update-run-date form-control' value='"+ newdate + "' /></td><td><input id='newPUTime-"+val.tripID+"' class='timepicker form-control' type='text' value='"+ milToStandard(val.pickUpTime)+ "' /></td><td><select class='form-control locations' id='newPU-"+val.tripID+"'><option  value='"+ val.pickUp+ "'>"+ val.pickUp+ "</option>'</select><input type='text' class='form-control' id='flightPU-"+val.tripID+"' value='"+val.flightPU+"' placeholder='Flight Number'/></td><td><select class='form-control locations' id='newDO-"+val.tripID+"'><option  value='"+ val.dropOff+ "'>"+ val.dropOff+ "</option>'</select><input type='text' class='form-control' id='flightDO-"+val.tripID+"' value= '"+val.flightDO+"' placeholder='Flight Number'/></td><td><input id='newdur-"+val.tripID+"' class='form-control' type='text' value='"+val.duration+"' /></td><td><select onchange='saveRun("+val.tripID+","+val.bandID+")' class='form-control drivers' id='newdriver-"+val.tripID+"' ><option  value='"+ val.name+ "'>"+ val.name+ "</option>'</select><div id='showgetdriver-"+val.tripID+"'><input type='button' class='btn btn-primary' onclick=\"getAvailDrivers("+val.tripID+",'"+val.tripDate+"','"+val.pickUpTime+"',"+val.duration+")\" value='Avail Drivers' /></div></td><td><input maxlength='2' id='newNumPx-"+val.tripID+"' class='form-control updateNumPax' type='text' value='"+ val.numOfPax+ "'/></td><td><select class='form-control vehicles' id='newvehicle-"+val.tripID+"'><option  value='"+ val.vehicleName+ "'>"+ val.vehicleName+ "</option>'</select></td></tr>"; 
				html+="</table>";  
				html+="<div><div class='col-sm-2' id='contacts-trip-"+val.tripID+"'></div>"; 
				/*html+="<div class='col-sm-3 form-group' ><label for='contactName' class='col-sm-8 control-label'>Active Contacts:</label><div class='col-sm-8'><select id='contacts-"+val.tripID+"' size='7' name='contacts' class='form-control' ></select></div></div><div class='col-sm-1 form-group' ><br /><div style='margin-top:30%' class='col-sm-12'><input style='width:100%' type='button' onclick='addContactBtn("+val.tripID+")' class='btn btn-success' value='<<' /><br /><br /><input style='width:100%' type='button' onclick='removeContactBtn("+val.tripID+")' class='btn btn-danger' value='>>' /></div></div><div class='col-sm-3 form-group'><label for='addcontacts' class='col-sm-8 control-label'>Inactive Contacts:</label><div class='col-sm-8'><select id='addcontacts-"+val.tripID+"' size='7' name='addcontacts' class='form-control addcontactsbox'></select></div></div></div></form></div>";*/  
				
				html+="<div  class='col-sm-3 form-group'>Trip Notes:<br /><textarea style='resize: none;' id='newnotes-"+val.tripID+"' rows='4' class='form-control'>"+ val.tripNotes+ "</textarea></div><div  class='col-sm-3 form-group'>Driver Notes:<br /><textarea id='newdrivernotes-"+val.tripID+"' rows='4' onkeyup='charLimit(this, 133);' style='resize: none;' class='form-control'>"+ val.driverNotes+ "</textarea>(Maximum of 133 characters please)<br /></div><div class='col-sm-1'><br /><input onclick='saveRun("+val.tripID+","+val.bandID+")' type='button' class='btn btn-warning' value='Update' /></div><div class='col-sm-2'><div class='input-group' id='radio-"+val.tripID+"'><div class='radio'><span class='input-group-addon'><input onchange='saveRun("+val.tripID+","+val.bandID+")' value='52' name='status' type='radio' aria-label='test'>Standby</span></div><div class='radio'><span class='input-group-addon'><input onchange='saveRun("+val.tripID+","+val.bandID+")' type='radio' value='1' name='status' aria-label='test'>At Pickup</span></div><div class='radio'><span class='input-group-addon'><input onchange='saveRun("+val.tripID+","+val.bandID+")' value='2' name='status' type='radio' aria-label='test'>En Route</span></div><div class='radio'><span class='input-group-addon'><input onchange='saveRun("+val.tripID+","+val.bandID+")' value='0' name='status' type='radio' aria-label='test'>At Destination</span></div></div></div><div class='col-sm-1 delete-run-btn-container'>&emsp;&emsp;<input onchange='getDriverStatus(val.tripID, val.driverID)' onclick='delRun("+val.tripID+")' type='button' class='btn btn-danger' value=' - Run ' /></div></div><input type='hidden' name='runID' value='"+val.tripID+"' /><input type='hidden' class='date-alternate' /></form></div>"; 
				getBandContacts(val.tripID,val.bandID);
				getBandName(val.tripID);
				getDriverStatus(val.tripID, val.driverID);
				$('#test2.test1').prop('checked', true);
				
				/****************NOT WORKING ********************************
				//alert($("#newdriver-"+val.tripID).val());
				if ($("#newdriver-"+val.tripID).val()=="Unassigned")
					$("#showgetdriver-"+val.tripID).fadeIn();    // <div> for button in html above
				else
					$("#showgetdriver-"+val.tripID).hide();
				*************************************************************/
			});
			//$( ".update-run-date" ).datepicker({ dateFormat: "DD, MM d, yy", altField: ".date_alternate", altFormat: "yy-mm-dd"}); 

			$("#update-trip-results").html(html);	//append results to html   
			$(".timepicker").ptTimeSelect();		//set up the timepicker
			stopLoading();	//hide the laoding bar
			deferred.resolve(data);

			//$("#update-date-search").val("");
			//$(".date_alternate").val("");
			
			$("#bandSearchedFor").html(band);
			$("#dateSearchedFor").html(date);
			$( ".update-run-date" ).datepicker({ dateFormat: "D, M d, yy", altField: ".date-alternate", altFormat: "yy-mm-dd"});
			
			
			//gives a second for the trip info to load 
			setTimeout(getLocations, 100);
			//setTimeout(getDriverNames, 100);
			setTimeout(getVehicleNames, 100);
		});	//post	
		
		return deferred;
		
  		
	}
	
	function charLimit(limitField, limitNum) {
		if (limitField.value.length > limitNum) {
			limitField.value = limitField.value.substring(0, limitNum);}
	}
	
	function getDriverStatus(trip,driver){
		//sets the background color according to driver status  
		$.post( "services/getStatus.php", {tripID: trip})
			.always(function() {

			})
			.fail(function() {
				alert( "There was an error" );
			})
			.done(function (data){
				console.log(data);
				var obj = JSON.parse(data);
				showLoading();
				$.each(obj, function( key, val ) {
					$("#set-"+trip).addClass("set-"+val.driver.statusID);
					$("#radio-"+trip+" input:radio[value='"+val.driver.statusID+"']").prop('checked', true);
					
				});
				stopLoading();
				
		
			});  //post			
			
	}
	
	function loadSetColor(status,id){
		//set the color of the trip set via a status id and a trip id
		$("#set-"+id).attr('class', 'col-sm-12 contact-set set-'+status);
	}
	
	function getBandName(id){
		showLoading();
		
		var bandNameVal;
		
		// easier to delete all tripContact for this particular trip  
		$.post( "services/getBandName.php", {tripID: id})
			.always(function() {

			})
			.fail(function() {
				alert( "There was an error" );
			})
			.done(function (data){
				
				var obj = JSON.parse(data);

				$.each(obj, function( key, val ) {
					//testband = val.band.bandName; //needed to get name for services/contacts
					//alert(testband);
					$("#band-name-"+id).html(val);
					bandNameVal = val;
				});
				
		
			});  //post	

			return bandNameVal;
	}

	
	function saveRun(id,bandID){
                showLoading();
				//testband = getBandName(id);
				//alert(testband);
				
				// easier to delete all tripContact for this particular trip  
				$.post( "delTripContact2.php", {tripID: id}, $( "#trip-update2").serialize())
									
									.always(function() {
											stopLoading();
										})
										 .fail(function() {
											stopLoading(); 
											//alert( "There was an error" );
										  })
										.done(function (){
										stopLoading();
									
								});  //post	
				
				// then get the contacts again from this band, and see which ones are checked
				// insert these checked contacts back into tripContact
                $.post( "/services/contacts3.php", {bandID:bandID})
				//all contacts for a given band.
					.always(function() {
						stopLoading();   
					})	  
					.fail(function() {
						//alert("There was an error loading data");
					})
					.success(function() {
						//setTimeout(function () {getTripInfo();}, 1000); 
						
					})	
					.done(function( data ) {
					var obj = JSON.parse(data);
					
					$(".addcontactsbox").empty();
					$.each(obj, function( key, val ) {
					
							// if checked insert back into tripContact 
							if ($("#trip-contact-"+id+"-"+val.contact.contactID).prop('checked')){
								//alert(id);
								//alert(val.contact.contactID);
								$.post( "addTripContact.php", {tripID: id, contactID: val.contact.contactID}, $( "#trip-update2").	serialize())
									
									.always(function() {
											stopLoading();
										})
										 .fail(function() {
											stopLoading();
											alert( "There was an error" );
										  })
										.done(function (data){

											if(data){
												//alert(data);
											}else{
												//alert('failed here');
											}
										stopLoading();
									
								}); //post	
								 
								 
								 
							} // end if
							//else
								//alert("no");
						
					});	 				
				});//post			
          
				
				//alert(id);  
				//get the band
				band = $("#updateBandName2").val();	
				//took out getting the band name. hard to get due to scope.
				
				savedate = $("#newdate-"+id).val(); // save date format for later use 
				$( "#newdate-"+id).datepicker("option", "dateFormat", "yy-mm-dd" );
				nwdt = $("#newdate-"+id).val();
				
				nwputm = $("#newPUTime-"+id).val();
                nwputm = standardToMil(nwputm);
                nwpu = $("#newPU-"+id).val();
                nwdo = $("#newDO-"+id).val();
                nwpx = $("#newNumPx-"+id).val();
                nwdur = $("#newdur-"+id).val();
				if (nwdur<30){
					alert("Duration at least 30 min");
					exit();
				}
                nwdri = $("#newdriver-"+id).val();
                nwveh = $("#newvehicle-"+id).val();
                nwnt = $("#newnotes-"+id).val();
				nwdrnt = $("#newdrivernotes-"+id).val();
				nwfpu = $("#flightPU-"+id).val();
				nwfdo = $("#flightDO-"+id).val(); 
				
				status = $("#radio-"+id+" input:radio[name=status]:checked").val();
				console.log(status);
 
                //update the trip
                $.post( "updateTrip2.php", {bName: band, bID: bandID, tripID: id, tripDate: nwdt, pickUpTime: nwputm, pickUp: nwpu, dropOff: nwdo, numOfPax: nwpx, duration: nwdur, name: nwdri, vehicleName: nwveh, tripNotes: nwnt, driverNotes: nwdrnt, flightPU: nwfpu, flightDO: nwfdo, status:status}, $( "#trip-update2" ).serialize())
 
					.always(function() {
						stopLoading();
					})
					 .fail(function() {
						stopLoading();
						//alert( "There was an error" );
					  })
					.done(function (data){

						if(data){
							alert(data);
							loadSetColor(status,id);

						}else{
							alert('failed');
						}
					stopLoading();

					
				}); //post
				$( "#newdate-"+id).datepicker("option", "dateFormat", "D, M d, yy" ); 


	}

    function delRun(id){			
	    //alert(id);
		  
		var answer = confirm('Are you sure to delete this run?');

		if (answer){
		
			// delete the contacts from the trip
			$.post( "delTripContact2.php", {tripID: id}, $( "#trip-update2" ).serialize())
				.done(function (){

					/*if(data){
						alert(data);
					}else{
						alert('failed');
					}*/

				});	
				
			// delete the trip	
			$.post( "deleteTrip.php", {tripID: id}, $( "#trip-update2" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						event.preventDefault(); 
						$("#set-"+id).remove(); 

					}else{
						alert('failed');
					}

				});
					
		}

    }
	

	function getAllContacts(id){
		//get the band	
		showLoading();
		band = $("#updateBandName2").val();
		var temp = [];
		var bandContacts = $.post( "/services/contacts.php", {bandName:band})
		//all contacts for a given band.
			.always(function() {

			})	  
			.fail(function() {
				//alert("There was an error loading data");
			})	
			.done(function( data ) {
				
				var obj = JSON.parse(data);
				
				$("#addcontacts-"+id).empty();
				$.each(obj, function( key, val ) {
					isActive = 0;
					$("#contacts-"+id +"> option").each(function() {
						if(val.contact.contactName == this.text)
							isActive =1;
						
					
					});
;
					if(!isActive){
						$("#addcontacts-"+id).append(new Option(val.contact.contactName,val.contact.contactID));	//append values to the drop box
					}
				});	 				

		});//post	
		
										
	}
	
	function getBandContacts(trip,bandID){

		var bandContacts = $.post( "/services/contacts3.php", {bandID:bandID})
		//all contacts for a given band.
			.always(function() {

			})	  
			.fail(function() {
				//alert("There was an error loading data");
			})	
			.done(function( data ) {
			var obj = JSON.parse(data);
			
			$(".addcontactsbox").empty();
			showLoading();
			$.each(obj, function( key, val ) {
				//see if you should check it 
				isActiveContact(val.contact.contactID, trip);
				$("#contacts-trip-"+trip).append("<input type='checkbox' value='"+val.contact.contactID+"' class='contact-check' id='trip-contact-"+trip+"-"+val.contact.contactID+"'/> "+ val.contact.contactName+" <br />");
			});	
			stopLoading();	
		});//post
			
	}

	function isActiveContact(contact, trip){
		activeFlag = 0;
		showLoading();
		var tripContact = $.post( "/services/tripContacts.php", {tripID: trip })
			.fail(function() {
				//alert("There was an error loading data");
			})
			.done(function(data) {
				obj = JSON.parse(data);
				var i = 0;

				$.each(obj, function( key, val ) {
					if(val.contactID == contact){
						$("#trip-contact-"+trip+"-"+contact).prop('checked', true);
						//alert(contact);
					}	

				});
		  }//done
		  

		);//post
		  return activeFlag;		
	}
	
         
        
	//removing contacts button event
        //$("#removeContactBtn").click(function(event){
        function removeContactBtn(id){
           //alert(id);
           //get the contact ID
		var selectedContactID = $( "#contacts-"+id+" option:selected" ).val();
        //alert(selectedContactID);
                var selectedContactName = $( "#contacts-"+id+" option:selected" ).text();
        //alert(selectedContactName);

                //make sure a contact is selected
		if(selectedContactID==null){
			alert("Please Select a Contact");
			return;	
		}

                $("#addcontacts-"+id).append(new Option(selectedContactName, selectedContactID));
                $("#contacts-"+id+" option[value='"+selectedContactID+"']").remove();

        }

	
	//adding contacts button event
	//$("#addContactBtn").click(function(event){
        function addContactBtn(id){

		//get the contact ID
		var selectedContactID = $( "#addcontacts-"+id+" option:selected" ).val();
                //alert(selectedContactID);
		var selectedContactName = $( "#addcontacts-"+id+" option:selected" ).text();
                //alert(selectedContactName);
		
		//make sure a contact is selected
		if(selectedContactID==null){
			alert("Please Select a Contact");
			return;	
		}
			
		$("#contacts-"+id).append(new Option(selectedContactName, selectedContactID));		
		$("#addcontacts-"+id+" option[value='"+selectedContactID+"']").remove();
			
	}

        $( "#AddRun" ).click(function(){
			
		window.location="Trip.php#add";

	});
	
	// function to empty drivers drop box
	function removeOptions(selectbox)
	{
		var i;
		for(i=selectbox.options.length-1;i>=0;i--)
		{
			selectbox.remove(i);
		}
	}
	
	// function to add the duration in minutes to the pickup time
	function addMinutes(time, minsToAdd) {
	  function z(n){ return (n<10? '0':'') + n;};
	  var bits = time.split(':');
	  var mins = bits[0]*60 + +bits[1] + +minsToAdd;

	  return z(mins%(24*60)/60 | 0) + ':' + z(mins%60);  
	}  
	
	function getAvailDrivers(id, dt,tm,dur)
	{
		showLoading();
		//alert(dt+", "+tm+", "+dur);
		//removeOptions(document.getElementById("drivers"));;
  	
		//time has to be converted 
		//tm = standardToMil(time);
		
		//time done after duration  
		puPlusDur = addMinutes(tm,dur);
		//alert("trip starts at "+tm+"       and ends at "+puPlusDur); 
		//alert(puPlusDur); 
		if (puPlusDur.substring(0, 2)=="00")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "24");
		else if (puPlusDur.substring(0, 2)=="01")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "25");
		else if (puPlusDur.substring(0, 2)=="02")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "26");
		else if (puPlusDur.substring(0, 2)=="03")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "27");
		else if (puPlusDur.substring(0, 2)=="04")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "28");
		else if (puPlusDur.substring(0, 2)=="05")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "29");
		else if (puPlusDur.substring(0, 2)=="06")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "30");
		
		//alert(puPlusDur);
		
		var times = [];
		
		$.post( "/services/getAvailableDrivers.php", {tripDate: dt})
			.done(function( data ) {
			$("#newdriver-"+id).empty();
			myObj2 = JSON.parse(data);
			var drivers = [];
			
			//go through each and put it in an array 
			$.each(myObj2, function( key, val ) {
				//put each row for drivers in 1-dim array   
				
				//   data.push({label: lab[i], value: val[i]});
				did=val.driver.driverID;
				//alert(did);
				times.push(did);
				name=val.driver.name;
				//alert(name);
				times.push(name);
				pickup=val.driver.pickUpTime;
				//alert(pickup);
				times.push(pickup);
				avtm=val.driver.availableAsOf;
				if (avtm.substring(0, 2)=="00")
					avtm = avtm.replace(avtm.substring(0, 2), "24");
				else if (avtm.substring(0, 2)=="01")
					avtm = avtm.replace(avtm.substring(0, 2), "25");
				else if (avtm.substring(0, 2)=="02")
					avtm = avtm.replace(avtm.substring(0, 2), "26");
				else if (avtm.substring(0, 2)=="03")
					avtm = avtm.replace(avtm.substring(0, 2), "27");
				else if (avtm.substring(0, 2)=="04")
					avtm = avtm.replace(avtm.substring(0, 2), "28");
				else if (avtm.substring(0, 2)=="05")
					avtm = avtm.replace(avtm.substring(0, 2), "29");
				else if (avtm.substring(0, 2)=="06")
					avtm = avtm.replace(avtm.substring(0, 2), "30");
				//alert(avtm);
				times.push(avtm);
				avdt=val.driver.availableOnDate;
				//alert(avdt);
				times.push(avdt); 
				

			});
			//alert(times); 
		
			
			driver=""; // to compare if a driver name is already in the drop down box
			olddriverid=0;
			anewdriver=0; // flag for driver
			//have unassigned at the top of the list, so that a run could be assigned a different driver
			//first unassign it, then update, then choose a another driver
			$("#newdriver-"+id).append(new Option("Unassigned", "Unassigned"));
			for (i=0; i<times.length; i=i+5) //i=i+5 for going to next record 
			{
				driverid=times[i];
				
				if (driverid>olddriverid){
					anewdriver=1;  //set the flag for a new driver
					//alert(newdriver); 
				}
				else
					anewdriver=0;
					
				nextdriver=times[i+1];
				// if driver name is taken, go to next iteration   
				if ( driver == nextdriver){
					olddriverid=driverid;   
					continue;
				}
				
				if (anewdriver==1)
				{
					//as soon as a driver is picked get out
					if (puPlusDur < times[i+2]){
						$("#newdriver-"+id).append(new Option(times[i+1], times[i+1]));
						driver=times[i+1];
						continue; 
					}
					
					//if last record is reached, and it is on the same date  
					if (i==times.length-5 && tm>=times[i+3]){	//&& times[i+4]==dt
						$("#newdriver-"+id).append(new Option(times[i+1], times[i+1]));
						driver=times[i+1];  
					}
					//if there is only one run for a driver 
					else if (times[i]!=times[i+5] && tm>=times[i+3]){	//&& times[i+4]==dt
						$("#newdriver-"+id).append(new Option(times[i+1], times[i+1]));
						driver=times[i+1];  
					}
					
				}
				else{
					//if this driver had runs already, i.e. not a newdriver, see the driver is in the 
					//last record and it is on the same date
					if (i==times.length-5 && (tm>=times[i+3] && puPlusDur<times[i+2])){		//&& times[i+4]==dt
						$("#newdriver-"+id).append(new Option(times[i+1], times[i+1]));
						driver=times[i+1];
						
					}
					//if this is the last run for a driver, maybe there is available time for a run 
					else if (times[i]!=times[i+5] && tm>=times[i+3]){	//&& times[i+4]==dt
						$("#newdriver-"+id).append(new Option(times[i+1], times[i+1]));
						driver=times[i+1];  
					}
					else if (tm>=times[i-2] && puPlusDur<times[i+2]){  
						//alert(i);
						//alert("driver="+times[i+1]);  
						//$("#drivers").append(new Option(val.driver.name,val.driver.name));     
						$("#newdriver-"+id).append(new Option(times[i+1], times[i+1]));
						driver=times[i+1]; 
					}
				}
				olddriverid=driverid; 
			}
		});//post 
		
		//get all other drivers who were not scheduled that day and therefore are available 
		$.post( "/services/getAllDriversNotScheduled.php", {tripDate: dt})
			.done(function( data ) {
			myObj2 = JSON.parse(data);
			//var adddrivers = [];
			
			//go through each and put it in an array   
			$.each(myObj2, function( key, val ) {
				
				var driverid = val.driver.driverID;
				var drivername = val.driver.name;
				//alert(driverid);
				//alert(dt);

				//alert(tm);
				//alert(puPlusDur);
				//alert(driverid);
				//alert(drivername);
				$.post( "/services/checkRoster.php", {driverID: driverid, tripDate: dt})
					.done(function( dat ) {
					myObj3 = JSON.parse(dat);
					
					$.each(myObj3, function( key, value ) {
							/*alert(tm);
							alert(puPlusDur);
							alert(driverid);
							alert(drivername); 
							alert(value.driver.driverID);
							alert(value.driver.runDate);
							alert(value.driver.startTime);
							alert(value.driver.endTime);
							if (driverid==value.driver.driverID)
								alert("true driverid");
							if (dt==value.driver.runDate)
								alert("true dt");
							if (tm >= value.driver.startTime)
								alert("true tm");
							if (puPlusDur<= value.driver.endTime)
								alert("true puPlusDur");*/
							if (driverid==value.driver.driverID && dt==value.driver.runDate && tm >= value.driver.startTime && puPlusDur<= value.driver.endTime){
								$("#newdriver-"+id).append(new Option(drivername, drivername));
							}
			
					}); //each myObj3      
				}); //post checkRoster  
			
			}); //each myObj2
			stopLoading();
		}); //post
		
	}
	

	
</script>
