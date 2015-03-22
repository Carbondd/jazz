
<form class="form-horizontal" role="form" method="post" action="addTrip2.php" id="addForm">
  <div class="form-group">
    <label for="tripDt" class="col-sm-1 control-label"><font size="4" color="red"><b>* </b></font> Date:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="tripDt" name="tripDt" placeholder="Trip Date">
    </div>
     <label for="pickUpTime" class="col-sm-1 control-label"><font size="4" color="red"><b>* </b></font> P/U Time:</label>
    <div class="col-sm-3">
        <input type='text' class='timepicker form-control' id='pu-time' placeholder="Time of pick up" />
    </div>
	<div class="col-sm-3" >   
	          	<span class="**"><font size="3" color='red'><b> * Required information</b></font></span>
	    </div>
  </div>
  <div class="form-group">
    <label for="tripDate" class="col-sm-1 control-label" ><font size="4" color="red"><b>* </b></font> Band:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control bandName" id="addBandName" name="bandName" placeholder="Band Name">
    </div>
    <label for="tripDate" class="col-sm-1 control-label" ><font size="4" color="red"><b>* </b></font> Duration (min):</label>
    <div class="col-sm-3">
		<input type="text" class="form-control" id="addDuration" name="addDuration" value="30">
	</div>
  </div>
  
  <div class="form-group">
    <label for="addPULocation" class="col-sm-1 control-label" ><font size="4" color="red"><b>* </b></font> Pickup:</label>
    <div class="col-sm-3">
        <select class="form-control locationBox" id="addPULocation" name="addPULocation">
            <option value="">--Pickup Location--</option> 
        </select> 
    </div>
    <label for="addDOLocation" class="col-sm-1 control-label" ><font size="4" color="red"><b>* </b></font> Dropoff:</label>
    <div class="col-sm-3">
        <select class="form-control locationBox" id="addDOLocation" name="addDOLocation">
            <option value="">--Dropoff Location--</option> 
        </select> 
    </div>
  </div>
   <div class="form-group">
    <label for="addFlightNo" class="col-sm-1 control-label" >Flight No:</label>
    <div class="col-sm-3">
        <input class="form-control" id="addFlightNo" name="addFlightNo" type="text" placeholder="Flight Number If Applicable" />
    </div>
    <label for="addFlightNo" class="col-sm-1 control-label" >Flight No:</label>
    <div class="col-sm-3">
        <input class="form-control" id="dropOffFlightNo" name="dropOffFlightNo" type="text" placeholder="Flight Number If Applicable" />
    </div>
  </div>
   <div class="form-group">
    <label for="addDriver" class="col-sm-1 control-label" >Driver:</label>
    <div class="col-sm-3">
        <select class="form-control driverBox" id="addDriver" name="addDriver">
            <option value="0">Unassigned</option> 
        </select> 
    </div>
    <label for="addVehicle" class="col-sm-1 control-label" ><font size="4" color="red"><b>* </b></font> Vehicle:</label>
    <div class="col-sm-3">
        <select class="form-control vehicleBox" id="addVehicle" name="addVehicle">
            <option value="">--Vehicle--</option>  
        </select> 
    </div>
  </div> 
  <div class="form-group">
	
	<label for="addNumPax" class="col-sm-1 control-label" ><font size="4" color="red"><b>* </b></font> # Pax:</label>
    <div class="col-sm-3">
		<input type="text" class="form-control" id="addNumPax" name="addNumPax" placeholder="# of Pax">
	</div>
	<label for="addNotes" class="col-sm-1 control-label" >Notes:</label>
    <div class="col-sm-3">
		<textarea class="form-control" id="addNotes" name="addNotes" placeholder="Trip Notes"></textarea>
	</div>
  </div>
  

  <div class="contact-information" id="contact-1">
   <h3 style="text-align:left;">Contacts:</h3>
   <div class="form-group">
		
		<div class='col-sm-offset-1 col-sm-2' id="all-contacts"></div>
		
		<div class="form-group col-sm-6">

			
			
			<label for="contactName" class="col-sm-2 control-label" >Name:</label>
			<div class="col-sm-10">
				<input type='text' class='form-control' id='addNewContactName' name='addNewContactName' placeholder='New Contact Name' />
			</div>	
			<label for="contactPhone" class="col-sm-2 control-label">Phone:</label>
			<div class="col-sm-10">
				 <input type='text' id='addNewContactPhone' class='form-control contactPhone' placeholder='xxx-xxx-xxxx'/>
			</div>
			<label for="contactPhone" class="col-sm-2 control-label">Type:</label>
			<div class="col-sm-10">
				 <input type='text' id='addNewContactType' class='form-control typeMgr' placeholder='Type of Manager'/>
			</div>
			<div class="col-sm-offset-2 col-sm-1">
				<button type="button" id="add-contact" class="btn btn-success"><span style="font-size:12px;" class="glyphicon glyphicon-user"></span> Save Contact</button>
			</div>
		</div>	
		
    </div>
    <div class="form-group">
		<hr />
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-1 col-sm-1">
      <button type="button" id="addSubmit" class="btn btn-success"><span style="font-size:12px;" class="glyphicon glyphicon-floppy-saved"></span> Save Run</button>
    </div>
  </div>
</form>

<script>
	var phone;
	var type;
	var i;	
	var nexttripid;
	
	$(function() {
    	//$( "#tripDt" ).datepicker({ dateFormat: "yy-mm-dd" }); 
        $( "#tripDt" ).datepicker({ dateFormat: "DD, MM d, yy", altField: ".date_alternate", altFormat: "yy-mm-dd"}); //$("#tripDt" ).datepicker({ dateFormat: "DD, MM d, yy" });
		$(".contact-information").hide();
	});
  
    
	function get_contact_list(){
		 //fills the select options with contacts
		band = $("#addBandName").val();
		$.post( "/services/contacts.php", { bandName: band})
		  .done(function( data ) {
			myObj = JSON.parse(data);
			var contacts = [];
			
			//this is needed due to the fact the onchange event has to be fired.
			$(".contact-name").append(new Option("Select Contact",""));
			
			//go through each and put it in an array
			$.each(myObj, function( key, val ) {
				contacts.push(val.contact.contactName);
				$(".contact-name").append(new Option(val.contact.contactName, val.contact.contactName));
			});
			//contact = data;
			//get_contact_data();
		});
	
	}

	function get_contact_data(contact){
		//function to load preset contact information to show the user.  
		//empty the fields
		$('#contactPhone').empty();
		$('#contactType').empty();
		
		band = $("#addBandName").val();
		$.post( "/services/contacts.php", { bandName: band})
		  .done(function( data ) {
			myObj2 = JSON.parse(data);
			var contact_data = [];
			
			
			//go through each and put it in an array
			$.each(myObj2, function( key, val ) {
				if(contact == val.contact.contactName){
					phone = val.contact.contactPhone;
					type = val.contact.typeMgr;
					//$(".contactPhone").replaceWith("<span class='contactPhone'>"+val.contact.contactPhone+"</span>");
					//$(".typeMgr").replaceWith("<span class='typeMgr'>"+val.contact.typeMgr+"</span>");										
				}

				//alert(val.contact.contactName);
			});
			//contact = data;
		});
			
	}
$(document).ready(function() {
	//this post function loads the locations into the drop box. 
	$("locationBox").replaceWith("<select id='addPULocation' class='form-control'><option>Select a Location</option></select>");	
	$.post( "/services/locations.php", {})
	  .done(function( data ) {
		myObj2 = JSON.parse(data);
		var location_data = [];
		
		
		//go through each and put it in an array
		$.each(myObj2, function( key, val ) {
			
			$(".locationBox").append(new Option(val.location.locationName+" - "+val.location.locationType,val.location.locationName));
		});
		//contact = data;
	});//post
	
	$("driverBox").replaceWith("<select id='addDriver' class='form-control'><option>Select a Driver</option></select>");
	$.post( "/services/getDrivers.php", {})
	  .done(function( data ) {
		myObj2 = JSON.parse(data);
		var driver_data = [];
		
		
		//go through each and put it in an array
		$.each(myObj2, function( key, val ) {
			
			$(".driverBox").append(new Option(val.driver.name, val.driver.driverID));
		});
		//contact = data;
	});//post
	
	$("vehicleBox").replaceWith("<select id='addVehicle' class='form-control'><option>Select a Vehicle</option></select>");
	$.post( "/services/vehicles.php", {})
	  .done(function( data ) {
		myObj2 = JSON.parse(data);
		var vehicle_data = [];
		
		
		//go through each and put it in an array
		$.each(myObj2, function( key, val ) {
			
			$(".vehicleBox").append(new Option(val.vehicle.vehicleName,val.vehicle.vehicleName));
		});
		//contact = data;
	});//post
	
	getNextRunId();
}); 

// this function is needed to get the **next** possible auto-increment id# from the trip table
// this is needed to attach possible contact names to this particular trip, but no tripid is known yet
// until this trip is committed. This next possible auto-increment id# will be used to add this new tripid and
// contactid in the tripContact table
function getNextRunId(){

	$.post( "/services/getNextTripID.php", {})
	  .done(function( data ) {
		
			nexttripid = data;

	});//post

}


//serialize and send form
$("#addSubmit").click(function(){
	//var info = $("#addForm").serializeArray();
	showLoading();
	$( "#tripDt" ).datepicker("option", "dateFormat", "yy-mm-dd" );
	var Dt = $("#tripDt").val();
	//alert(Dt);
	var time=$("#pu-time").val();	
	//time has to be converted
	Tm = standardToMil(time);
	//alert(Tm);
	var pickup = $("#addPULocation").val();
	var fpu = $("#addFlightNo").val();
	var dropoff = $("#addDOLocation").val();
	var fdo = $("#dropOffFlightNo").val();
	var dur = $("#addDuration").val();
	var band = $("#addBandName").val();
	var driver = $("#addDriver").val();
	var vehicle = $("#addVehicle").val();
	var pax = $("#addNumPax").val();
	var not = $("#addNotes").val();
	
	/*if (dur<30){
		alert("Duration at least 30 min");
		exit();
	}*/

	//add the num of contacts to row since it is dynamic  
	//will provide loop control once in service. 
	//info.push({name: 'num_contacts', value: i}); 
	//$.post( "/controllers/process-trip.php", info)
	
	if (Dt!="" && Tm!="" && pickup!="" && dropoff!="" && dur!="" && band!="" && vehicle!="" && pax!="" && dur>=30)
	{
		
	
	$.post( "/controllers/process-trip.php", {tripDate: Dt, addPULocation: pickup, addFlightNo: fpu,  addDOLocation: dropoff, dropOffFlightNo: fdo, duration: dur, bandName: band, name: driver, vehicleName: vehicle, numOfPax: pax, tripNotes: not, pickUpTime: Tm}, $( "#addForm" ).serialize())
		  .done(function( data ) {
		  
			if(data){
					console.log(data);
					// if the new trip is successfully inserted, see if contacts  are checked; if so need to be in tripContact
					// first, get all contacts from below band name
					band = $("#addBandName").val();

					$.post( "/services/contacts.php", {bandName:band})
						//all contacts for a given band.
						.always(function() {
							stopLoading();   
						})	  
						.fail(function() {
							alert("There was an error loading data");
						})	
						.done(function( data ) {
						var obj = JSON.parse(data);
					
						$.each(obj, function( key, val ) {
							
							// see if any of the contacts are checked
							if ($("#trip-contact-"+val.contact.contactID).prop('checked')){

								// if so, insert into tripContact table
								$.post( "addTripContact.php", {tripID: nexttripid, contactID: val.contact.contactID}, $( "#addForm").	serialize())
									
									.always(function() {
											stopLoading();
									})
									.fail(function() {
											stopLoading();
											alert( "There was an error" );
									})
									.done(function (data){
										stopLoading();
									
								}); //post	addTripContact
																 
							} // end if
						
						});	 // end .each				
					});  //post contacts
			
				alert("Run added");	
				// call the getNextRunId() function for possible **duplicate of this trip**
				// a new tripid will be given when the duplicate is committed
				// need the next possible auto-increment to use for tripContact    
				getNextRunId();
			}else{
				alert('Run added, update search');  
				stopLoading();      
			}

		}); //done  
	}
	else if (dur<30){
		alert("Duration at least 30 min");
		stopLoading();
		window.stop();
	}
	else{
		alert("Fill out all boxes with * ");
		stopLoading();
		window.stop();
	}	
		$( "#tripDt" ).datepicker("option", "dateFormat", "DD, MM d, yy" );
		//window.location="Trip.php"; 
	
});//post


$( "#addBandName" ).focusout(function() {
	$(".contact-name").empty();
	get_contact_list();
	$(".contact-information").fadeIn();
	getAllContacts();
});			

function getAllContacts(trip){

	var bandContacts = $.post( "/services/contacts.php", {bandName:band})
	//all contacts for a given band.
		.always(function() {
			stopLoading();
		})	  
		.fail(function() {
			alert("There was an error loading data");
		})	
		.done(function( data ) {
		var obj = JSON.parse(data); 
			
		$("#all-contacts").empty();
		$("#all-contacts").addClass('checkbox');
		$.each(obj, function( key, val ) {
			//see if you should check it
			$("#all-contacts").append("<input type='checkbox' value='"+val.contact.contactID+"' class='contact-check' id='trip-contact-"+val.contact.contactID+"'/> "+ val.contact.contactName+"<br />");
		});	 				
	});//post  			
}

$("#add-contact").click(function(){
	//adds a new contact to the band
	//and puts a new check box asynchonously into the UI
	showLoading();
	
	//get the vars from the form.
	var name = $("#addNewContactName").val();
	var phone = $("#addNewContactPhone").val();
	var type = $("#addNewContactType").val();
	var band = $("#addBandName").val();
	
	/*if ($("#addNewContactPhone").val()==""){ 
		alert("Need contact phone #.");
		exit();
	}*/
	
	if (phone!=""){
	//check make sure the band exists!
	checkBand  = $.post( "/services/bands.php", {bandName:band})
		.fail(function() {
			alert("Error with band. Band doesn't exist or spelled incorrectly!");
		})	
		.success(function( data ) {
			var obj = JSON.parse(data);
			
			//once you have the band ID successfully add contact
			addContact  = $.post( "/services/newContact.php", {bandID:obj[0].band.bandID, name: name, phone: phone, type: type})
			.always(function() {
				stopLoading();
			})	  
			.fail(function() {
				alert("Error adding Contact, Try Again or inform the developers!");
			})	
			.success(function( data ) {
				//not sure how the f*** this works but it does! don't touch!
				$("#addNewContactName").val("");
				$("#addNewContactPhone").val("");
				$("#addNewContactType").val("");
				getAllContacts();
				alert('Successfully Added Contact'); 
			});//post
		
		});//post 

		}
		else{
			alert("Need contact phone #.");
			stopLoading();
			window.stop(); 
		}

		
});

function checkDuration(){

              var dur = $("#addDuration").val();
              if (dur<30){
                    alert("Duration at least 30 min");
                    //document.getElementById("addDuration-"+id).value='';
              }  
                    
        
        }



</script>



