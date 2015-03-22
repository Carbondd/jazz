<style type="text/css" media="print">
@page
{
	size: landscape;
	margin: 2cm;
}
</style>
<form class="form-horizontal" role="form" action="/views/trip-printReport.php">
  <div class="form-group" >
    <label for="choiceReport" class="col-sm-1 control-label">Report:</label>
    <div class="col-sm-3">
      <select id="choiceReport" name="choiceReport" class="form-control choiceReport" onchange="chooseReport()">
                  <option value="Select">-- Select --</option>
				  <option value="Date">By Date</option>
                  <option value="Band">By Band</option>
                  <option value="Driver">By Driver</option>
	  </select>
   </div>
  </div>
  
   <div class="form-group" id="getsearch" >
    <label for="searchName" class="col-sm-1 control-label">Band/Driver:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control searchName" id="searchName" name="searchName" placeholder="Search" />

	</div>
	
  </div>


  <div class="form-group" id="getdates">
	    <label for="tripDate" class="col-sm-1 control-label">Run Date:</label>
	    <div class="col-sm-3">
		  <input id="tripDate" type="hidden" name="tripDate" class="tripDate form-control" />
		   <input id="date2" class='form-control' type ='text' name='date2' />
		  <input id="altTripDate" type ='hidden' name='altTripDate' />
	   </div> 
  </div>  
  <div class-"form-group" id="btns">
	  <div class="col-sm-4">
		  <input type='button' class='btn btn-primary' id='search-report-btn' value='Search' />
		  	  <input class='btn btn-primary' type='submit' value='Print' id='print-report-btn2'/>
	  </div>
	  <div class="col-sm-2" id="air">
		  <input type='button' class='btn btn-info' id='airport-btn' value='Airport Pickup' />
	  </div>
	  <div class="col-sm-2" id="mardi">
		  <input type='button' class='btn btn-info' id='mardigras-btn' value='Mardi Gras Truck Stop' />
	  </div>
  </div>
   <div id='print-report-div'>
  <br /><br /><br />
  <div class="form-group" id="lorson">
	<div class="col-sm-2" ></div>
	<div class="col-sm-6" >			
			<center>
			<table width='900' height='90' border='1' cellpadding='6' cellspacing='4'>
				<tr>
				  <td align='center' bgcolor='yellow'>
					<b>GROUND TRANSPORTATION DEPARTMENT IS OPEN ON FESTIVAL DAYS FROM 8AM-8PM.<br />
					CALL 504-656-6140  TO REQUEST CHANGES.
				  </td>
				</tr>
			</table>
			</center>
	</div>
  </div>
  
  <div class="form-group" id="airport">
	<div class="col-sm-2" ></div>
	<div class="col-sm-6" >			
			<center>
			<table width='900' height='90' border='1' cellpadding='6' cellspacing='4'>
				<tr>
				  <td align='center'>
					<b>Driver will meet air passengers with a sign with their name on it at the baggage claim carousel for their flight.  Passengers should go to the baggage claim carousel for their flight even if they did not check a bag. Driver will contact passenger if he/she cannot locate passenger at baggage claim</b>
				  </td>
				</tr>
			</table>
			</center>
	</div>
  </div>
  
  <div class="form-group" id="mardigras">
	<div class="col-sm-2" ></div>
	<div class="col-sm-6" >			
			<center>
			<table width='900' height='90' border='1' cellpadding='6' cellspacing='4'>
				<tr>
				  <td align='center'>
					<b>*Mardi Gras Truck Stop - New Orleans Interstate 10 – Exit 236 B - 504.945.1000 - www.mardigrastruckstop.com  for directions .<br />
					 **Bus Coordinator, Carroll Conley (504.452.8249 ) will be available between 6am-9am at the truck stop to coordinate your escort to the festival site.</b>
				  </td>
				</tr>
			</table>
			</center>
	</div>
  </div>
  
</form>

<div id="report-list"></div>
<br />
<br />
<br />
<br />
<br />
<script>

        var contactIDs = [];	//has to be defined now. associated with contacts based on trip
        var band;
		var airflag = 0;
		var mardiflag = 0;
		
	
	
	//print report btn
	 $( "#print-report-btn" ).click(function(){
		w=window.open();
		w.document.write($('#print-report-div').html());
		w.print();
		w.close(); 
	  });
 
        // testing out simple output
        function chooseReport(){
				$("#report-list").hide();
                val = document.getElementById("choiceReport").value;

                if(val == "Band" || val == "Driver"){
                   
                   $("#getsearch").fadeIn();
                   if (val == "Band"){
				        document.getElementById('searchName').value='';
                        $("#searchName").autocomplete({
	                      source: "groupSearch.php",
	                      minLength: 1
    	                    });
						$("#getdates").hide();
                   }
                   else{
						$("#lorson").hide();
						$("#air").hide();
						$("#mardi").hide();
				        document.getElementById('searchName').value='';
						document.getElementById('tripDate').value='';
                        $("#searchName").autocomplete({ 
	                      source: "driverSearch.php",
	                      minLength: 1
    	                    });
						$("#getdates").fadeIn();
                   }
                 }
                
                if(val == "Date"){
                   //alert(val);
				   	$("#lorson").hide();
					$("#air").hide();
					$("#mardi").hide();
				   document.getElementById('tripDate').value='';
                   $("#getsearch").hide();
                   $("#getdates").fadeIn();
				   //$("#driverdates").hide();
                }
        }

	var deferred = new $.Deferred();
	$("body").hide();
	
	$(document).ready(function(){
		$("#print-report-btn2").hide();
		$( "#date2" ).datepicker({  
			dateFormat: "D, M d, yy",
			altFormat: "yy-mm-dd",
			altField: "#altTripDate"
		});

		$("body").show();
				$("#getdates").hide();
                $("#getsearch").hide();
				$("#driverdates").hide();
                $("#report-list").hide
				$("#lorson").hide();
				$("#airport").hide();
				$("#mardigras").hide();
				$("#air").hide();
				$("#mardi").hide();

	});
	
	// airport message
	 $( "#airport-btn" ).click(function(){
			if (airflag==0){
				$("#airport").fadeIn();
				airflag=1;
			}
			else{
				$("#airport").hide();
				airflag=0;
			}
	  });
	  
	// mardigras message
	 $( "#mardigras-btn" ).click(function(){
			if (mardiflag==0){
				$("#mardigras").fadeIn();
				mardiflag=1;
			}
			else{
				$("#mardigras").hide();
				mardiflag=0;
			}			 
	  });

	$("#search-report-btn").click(function(event){
		event.preventDefault();
		$("#airport").hide();
		$("#mardigras").hide();
		$("#report-list").fadeIn(); 
		getTripReports();
	});
	
	function getTripReports(){
		showLoading();
		$("#print-report-btn2").fadeIn();
        var val = document.getElementById("choiceReport").value;
        if (val == "Band"){
			$("#lorson").fadeIn();
			$("#air").fadeIn();
			$("#mardi").fadeIn();

			var band = $("#searchName").val();

			var locations = $.post( "/services/trips.php", {bandName: band})
			   .fail(function() {
				  $("#report-list").html("No Results Found");
				  deferred.reject();
				})	
				.always(function(){	stopLoading();})
				.success(function( data ) {
				var obj = JSON.parse(data);

				if(data==0)
					$("#report-list").html("No results found");  
			 
			    html="<br /><br /><h4>Report for Band: " + band + "</h4>";
				html+="<br /><table class='table'>";
				html+="<tr><th class='report-print-date'>Date</th><th class='report-print-contacts'>Contact</th><th class='report-print-from'>From</th><th class='report-print-putime'>P/U Time </th><th class='report-print-to'>To</th><th class='report-print-pass'># Pax</th><th class='report-print-vehicle'>Vehicle</th><th class='report-print-driver'>Driver</th><th class='report-print-notes'>Trip Notes</th></tr>";
				 
				//loop through all trip information
				$.each(obj, function( key, val ) {
					getTripContacts(val.tripID);
					
					//this algorithm is needed because date when formatted is pushed back 1 day--------------*/
					var d = new Date(val.tripDate+"T00:00:00");
	
					newestDate = (new Date(d.getTime() + d.getTimezoneOffset()*60000));
					var newdate = $.datepicker.formatDate("D, M d, yy", new Date(newestDate));
					//alert(newestDate);
 
					//newdate = $.datepicker.formatDate("DD, d MM, yy", new Date(newdate));
				
					html+="<tr class='set-"+val.statusID+"'><td>"+ newdate +"</td><td><select id='contacts-"+val.tripID+"' size='4' name='contacts' class='form-control' ></select></td><td>"+ val.pickUp +"<br />"+val.flightPU+"</td><td>"+ milToStandard(val.pickUpTime) +"</td><td>"+ val.dropOff +"<br />"+val.flightDO+"</td><td>"+ val.numOfPax + "</td><td>"+ val.vehicleName +"</td><td>"+ val.name +"</td><td colspan='8'>"+val.tripNotes+"</td></tr>";
				});
			
				//close the table and replace the html div 
				html+="</table>";
				$("#report-list").html(html);

				deferred.resolve(data);
			});//post
         }	// if band
         else if (val == "Driver") 
         {

            var driver = $("#searchName").val();

			//gets the alternate field date in diff format for database interaction
			var tripDate = $("#altTripDate").val();

            var driverRuns= $.post( "/services/tripsForDriver.php", {name: driver, tripDate: tripDate})
			   .fail(function() {
				  $("#report-list").html("No Results Found");
				  deferred.reject();
				})	
				.always(function(){	stopLoading();})
				.success(function( data ) {
				var obj = JSON.parse(data);

				if(data==0)
					$("#report-list").html("No results found");
		
				html="<br /><br /><br /><h4>Report for Driver: " + driver + " on " + $("#date2").val() + "</h4>";
				html+="<br /><table class='table'>";
				html+="<tr><th>Group Name</th><th>Contact</th><th>Pick Up</th><th>P/U Time </th><th>Drop Off</th><th>Duration</th><th># Pax</th><th>Vehicle</th><th>Trip Notes<br />Driver Notes</th></tr>";
				 
				//loop through all trip information
				$.each(obj, function( key, val ) {
					getTripContacts(val.tripID);
					
					//this algorithm is needed because date when formatted is pushed back 1 day--------------*/ 
					//var d = new Date(val.tripDate+"T00:00:00");
	
					//newestDate = (new Date(d.getTime() + d.getTimezoneOffset()*60000));
					//var newdate = $.datepicker.formatDate("D, M d, yy", new Date(newestDate));
										
					html+="<tr class='set-"+val.statusID+"'><td>"+ val.bandName +"</td><td><select id='contacts-"+val.tripID+"' size='4' name='contacts' class='form-control' ></select></td><td>"+ val.pickUp +"<br />"+val.flightPU+"</td><td>"+ milToStandard(val.pickUpTime) +"</td><td>"+ val.dropOff +"<br />"+val.flightDO+"</td><td>"+ val.duration +"</td><td>"+ val.numOfPax +"</td><td>"+ val.vehicleName +"</td><td><textarea style='resize: none;' rows='2' cols='25' readonly>"+val.tripNotes+"</textarea><br /><br /><textarea style='resize: none;' rows='2' cols='25' readonly>"+val.driverNotes+"</textarea></td></tr>";

				});
				
				//close the table and replace the html div
				html+="</table>";
				$("#report-list").html(html);
				
				deferred.resolve(data);
			}); //post driverRuns
		}  // else if driver
        else{
            //alert(val);
			//gets the alternate field date in diff format for database interaction
			var tripDate = $("#altTripDate").val();

			// find the distinguished dates
			var locations = $.post( "/services/tripsPerDate.php", {tripDate: tripDate})
			   .fail(function() {
				  $("#report-list").html("No Results Found");
				  deferred.reject();
				})	
				.always(function(){	stopLoading();})
				.success(function( data ) {
				var obj = JSON.parse(data);

				if(data==0)
					$("#report-list").html("No results found");

				html="<br /><br /><br /><h4>Report for Date: " + $("#date2").val() + "</h4>";
				html+="<br /><table class='table'>";
				html+="<tr><th>Group Name</th><th>Contact</th><th>From</th><th>P/U Time </th><th>To</th><th># Pax</th><th>Vehicle</th><th>Driver</th><th>Trip Notes<br />Driver Notes</th></tr>";

				//loop through all trip information
				$.each(obj, function( key, val ) {

					//get band name for this trip for the sake of printing it in report
					getBandName(val.tripID);
					getTripContacts(val.tripID);
					
					html+="<tr class='set-"+val.statusID+"'><td>"+ val.bandName +"</td><td><select id='contacts-"+val.tripID+"' size='4' name='contacts' class='form-control' ></select></td><td>"+ val.pickUp +"<br />"+val.flightPU+"</td><td>"+ milToStandard(val.pickUpTime) +"</td><td>"+ val.dropOff +"<br />"+val.flightDO+"</td><td>"+ val.numOfPax + "</td><td>"+ val.vehicleName +"</td><td>"+ val.name +"</td><td><textarea style='resize: none;' rows='2' cols='25'>"+val.tripNotes+"</textarea><br /><br /><textarea style='resize: none;' rows='2' cols='25' readonly>"+val.driverNotes+"</textarea></td></tr>";

				});
			
				//close the table and replace the html div 
				html+="</table>";
				$("#report-list").html(html);
				
				deferred.resolve(data);
				
			});//post
		   
		}	// else date
	}

    function getTripContacts(trip){
		//puts a request into a service that will give information back about contacts for a trip 
		var tripContact = $.post( "/services/tripContacts.php", {tripID: trip })
			.fail(function() {
				alert("There was an error loading data");
			})
			.done(function(data) {
				obj = JSON.parse(data);
				var i = 0;

				$.each(obj, function( key, val ) {

					$("#contacts-"+trip).append(new Option(val.contactName + ' ' + val.contactPhone,val.contactID));	//append values to the drop box
                    $("#contacts-"+trip+"> option").each(function() {
                    });
				});
				
				return contactIDs; 
			}//done
		);//post	
	}

     
	function getBandName(id){
		
		$.post( "/services/getBandName.php", {tripID: id})
			.done(function( data ) {
			myObj2 = JSON.parse(data);
			var band_data = [];  
			
			//go through each
			$.each(myObj2, function( key, val ) {
				if (val.bandID==id){
					band=val.bandName;  
				}
			});
			
		});//post
		//return band;   
    }		
	
</script>   	 
</div>