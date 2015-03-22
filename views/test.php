<?php include "master.php"; ?>
<div id="search">
    <form class="form-horizontal" role="form" method='post' id="bandcontact-update">
      <div class="form-group">
	    <label for="bandName" class="col-sm-1 control-label">Band:</label>
	    <div class="col-sm-3">
	      <input onchange="get_band_info(); get_contact_list()"  type="text" class="form-control bandName" id="bandName" name="bandName" placeholder="Band Name">
	   </div> 
	   <div class="col-sm-2" id="cancel">
          	<input type="button" id="reset" class="btn btn-primary" value="Cancel" />
	   </div>
	  
	   <div>
	     <!--<div class="col-sm-2" id="existband">
	   		<input onclick="get_band_info(); get_contact_list()" type="button" id="getBandInfo" class="btn btn-primary" value="Existing Band" />
	     </div> -->
	     <div class="col-sm-1" id="newband">
	       	<button type="button" id="addNEWBand" class="btn btn-success"><span style="font-size:12px;" class="glyphicon glyphicon-plus"></span> Band</button><br /><br />
	        <button type="button" id="delBand" class="btn btn-danger"><span style="font-size:12px;" class="glyphicon glyphicon-minus"></span> Band</button>

		    </div><br/><br/><br/>
	          	<font color='red'><b><u>Note:</u> Deleting the band will also delete all of its members/contacts and trips!</b></font>

	     
	   </div>
	  </div> 
	  <hr>
	  <div id="existing">
	  	  <div class="form-group" >
		    <label for="hotel" class="col-sm-1 control-label">Hotel:</label>
		    <div class="col-sm-3" id="oldHotel">
	          	<input disabled type="text" class="form-control hotel" id="hotel" name="hotel" placeholder="Hotel">
		    </div>
		    <div class="col-sm-3" id="newHotel">
          		<select id="locationName" name="locationName" class="form-control locationName"  onchange="get_location_data()" >
	      			<option id="0">--Select a Hotel--</option>
          		</select>
	   		</div> 

		    <div class="col-sm-2" id="changeHot">
	          	<input type="button" align="right" id="changeHotel" onclick="get_location_list('hotels')" class="btn btn-warning" value="Change" />
		    </div>
		    <div class="col-sm-2" id="cancelChangeHot">
	          	<input type="button" align="right" id="cancelChangeHotel" class="btn btn-primary" value="Cancel" />
		    </div> 
	      </div>
		  <div class="form-group">
		    <label for="stage" class="col-sm-1 control-label">Stage:</label>
		    <div class="col-sm-3"  id="oldStage">
	          	<input disabled type="text" class="form-control stage" id="stage" name="stage" placeholder="Stage">
		   </div> 
		   <div class="col-sm-3" id="newStage">
	          <select id="locName" name="locName" class="form-control locName" onchange="get_location_data()" >
		      	<option id="0">--Select a Stage--</option>
	          </select>
		    </div>
		    <div class="col-sm-2" id="changeStg">
	          	<input type="button" align="right" id="changeStage" onclick="get_location_list('stages')" class="btn btn-warning" value="Change" />
		    </div>
		    <div class="col-sm-2" id="cancelChangeStg">
	          	<input type="button" align="right" id="cancelChangeStage" class="btn btn-primary" value="Cancel" />
		    </div> 
	      </div>

	      <div class="form-group" >
		    <label for="pfDt" class="col-sm-1 control-label">Perf Date:</label>
		    <div class="col-sm-3" id="oldDate">
	          	<input disabled type="text" class="form-control pfDt" id="pfDt" name="pfDt" placeholder="Date">
		   </div>
		   <div class="col-sm-3" id="newDate">
     			<input type="text" class="form-control" id="perfDate" name="perfDate" placeholder="Change Date">
    	   </div>
		   <div class="col-sm-2" id="changeDt">
	          	<input type="button" align="right" id="changeDate" class="btn btn-warning" value="Change" />
		    </div> 
		    <div class="col-sm-2" id="cancelChangeDt">
	          	<input type="button" align="right" id="cancelChangeDate" class="btn btn-primary" value="Cancel" />
		    </div>
	      </div>
	      <div class="form-group" >
		    <label for="pfTm" class="col-sm-1 control-label">Perf Time:</label>
		    <div class="col-sm-3" id="oldTime">
	          	<input disabled type="text" class="form-control pfTm" id="pfTm" name="pfTm" placeholder="Time">
		    </div>
		    <div class="col-sm-3" id="newTime">
     			<select class="form-control" id="perfTime" name="perfTime" >
           			<option value="none">--Change Time--</option>
            		<?php getTimesOption(); ?> 
        		</select>    	   
            </div>
		    <div class="col-sm-2" id="changeTm">
	          	<input type="button" align="right" id="changeTime" class="btn btn-warning" value="Change" />
		    </div> 
		    <div class="col-sm-2" id="cancelChangeTm">
	          	<input type="button" align="right" id="cancelChangeTime" class="btn btn-primary" value="Cancel" />
		    </div> 
	      </div>
		  <div class="form-group" >
		    <label for="not" class="col-sm-1 control-label">Note:</label>
		    <div class="col-sm-3" id="oldNote">
	          	<textarea class="form-control not" id="not" name="not" rows="5" cols="50" placeholder="Note"></textarea>
		    </div>
	      </div>
	      
      </div> <!-- end div exsiting band -->
      
     
      <div id="new">  <!-- start div new band -->
		  <div class="form-group" >
		    <label for="newlocationName" class="col-sm-1 control-label">Hotel:</label>
		    <div class="col-sm-3">
	          <select id="newlocationName" name="newlocationName" class="form-control" onclick="get_location_list('hotels')" onchange="get_location_data()" >
		      	<option id="0">--Select a Hotel--</option>
	          </select>
		    </div> 
	      </div>
		  <div class="form-group" >
		    <label for="newlocName" class="col-sm-1 control-label">Stage:</label>
		    <div class="col-sm-3">
	          <select id="newlocName" name="newlocName" class="form-control" onclick="get_location_list('stages')" onchange="get_location_data()" >
		      	<option id="0">--Select a Stage--</option>
	          </select>
		    </div>  
	      </div>
	      <div class="form-group" >
		    <label for="newperfDate" class="col-sm-1 control-label">Perf Date:</label>
		    <div class="col-sm-3">
	          	<input type="text" class="form-control newperfDate" id="newperfDate" name="newperfDate" placeholder="Select Date">
		   </div> 
	      </div>
	      <div class="form-group" >
		    <label for="newperfTime" class="col-sm-1 control-label">Perf Time:</label>
		    <div class="col-sm-3">
		      <select class="form-control" id="newperfTime" name="newperfTime">
            	<option value="none">--Select Time--</option>
            	<?php getTimesOption(); ?> 
              </select> 
    		</div>
	      </div>
	      
	       <div class="form-group" >
		    <label for="newnote" class="col-sm-1 control-label">Note:</label>
		    <div class="col-sm-3" id="oldNote">
	          	<textarea class="form-control newnote" id="newnote" name="newnote" rows="5" cols="50" placeholder="Note"></textarea>
		    </div>
		   </div>
		   
		   <div>
	      	<br />
	      	<label class="col-sm-1 control-label"></label>
	      	<div class="col-sm-3" id="addband">
	          	<input type="button" id="addBand" class="btn btn-success" value="Click here to Add Band to Database before continuing" />
		    </div>     
	       </div>
      
	     </div> <!-- end div new -->
	     
<div id="showafterstart">
	     <div class="form-group">
	        <br /><br /><br />
		    <label for="contactName" class="col-sm-1 control-label">Contact:</label>
		    <div class="col-sm-3">
	          <select id="contacts" size="7" name="contacts" class="form-control" onclick="get_contact_data()" >
		      	<!--<option id="0">Contacts</option>-->
	          </select>
		   </div>
	       <div class="col-sm-2">
		    	<button type="button" id="addContact" class="btn btn-success"><span style="font-size:12px;" class="glyphicon glyphicon-plus"></span> Contact</button><br /><br /> 
	      		<button type="button" id="delContact" class="btn btn-danger"><span style="font-size:12px;" class="glyphicon glyphicon-minus"></span> Contact</button>
<br /><br />
	      		<input type="button" align="right" id="upContact" class="btn btn-warning" value="Modify Contact" />
		   </div>
		   <div class="col-sm-3" id="addCont">
			 	<input type="text" class="form-control addcontName" id="addcontName" name="addcontName" placeholder="Add contact name"><br />
			 	<input type="text" class="form-control addcontPhone" id="addcontPhone" name="addcontPhone" placeholder="xxx-xxx-xxxx"><br />
			 	<input type="text" class="form-control addcontType" id="addcontType" name="addcontType" placeholder="Type Manager">
		   </div>
		   <div class="col-sm-2" id="cancelAddCont">
		      <div>
		   		<input onblur="get_contact_list()" type="button" align="right" id="add" class="btn btn-success" value="Add" />
	          	<input type="button" align="right" id="cancelAddContact" class="btn btn-primary" value="Cancel" />
	          </div>
		   </div>
		    
		   <div class="col-sm-3" id="delCont">
	          <select id="delcontacts" name="delcontacts" class="form-control" onclick="get_contact_data()">
		      	<option id="0">--Select contact to be deleted--</option>
	          </select>
		   </div>
		   <div class="col-sm-2" id="cancelDelCont">
		      <div>

		   		<input onblur="get_contact_list()" type="button" align="right" id="delete" class="btn btn-danger" value="Delete" />
	          	<input type="button" align="right" id="cancelDelContact" class="btn btn-primary" value="Cancel" />
	          </div>
		    </div>
		    
		    <div class="col-sm-3" id="upCont">
	          <select id="upcontacts" name="upcontacts" class="form-control" onclick="get_contact_data()">
		      	<option id="0">--Select contact to be updated--</option>
	          </select>
		    </div>
		     <div class="col-sm-2" id="cancelUpCont">
		      <div>
		   		<input onclick="get_contact_data()" type="button" align="right" id="updte" class="btn btn-warning" value="Modify" />
	          	<input type="button" align="right" id="cancelUpContact" class="btn btn-primary" value="Cancel" />
	          </div>
		    </div>

			<div class="col-sm-3" id="UpdateCont">
			 	<input type="text" class="form-control upcontName" id="upcontName" name="upcontName" ><br />
			 	<input type="text" class="form-control upcontPhone" id="upcontPhone" name="upcontPhone" ><br />
			 	<input type="text" class="form-control upcontType" id="upcontType" name="upcontType" />	
		   </div>

		   <div class="col-sm-2" id="cancelUpCont2">
		      <div>
		   		<input onclick="get_contact_data()" type="button" align="right" id="updateDB" class="btn btn-warning" value="Update" />
	          	<input type="button" align="right" id="cancelUpContact2" class="btn btn-primary" value="Cancel" />
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
	      <div id="updateBd">
	      	<br />
	      	<div class="col-sm-2" >
	          	<input type="button" id="updateBand" class="btn btn-warning" value="Update Band" />
		    </div>    
	      </div>
	      
	      <div>
	      	
	      	<div class="col-sm-2" id="dn">
	          	<input type="button" id="done" class="btn btn-primary" value="Done" />
		    </div>     
	      </div>

     <input name='bandID' id="bandID" type='hidden'>
     </div>
    </form> 
</div>
 
<script>

	var changeHotelFlag=0; // need to know how many times will be clicked on change or cancel
	var changeStageFlag=0; // same for stage
	var oldHot, oldStg;	   // save the values of hotel and stage before changing
	
	$(function() {
		// modified performance date for an existing band	
    	$( "#perfDate" ).datepicker({ dateFormat: "yy-mm-dd" });
    	// performance date for a new band
    	$( "#newperfDate" ).datepicker({ dateFormat: "yy-mm-dd" }); // perf date for new band
  	});

	$(function() {
	    //autocomplete for a band
	    $("#bandName").autocomplete({
	    source: "groupSearch.php",
	    minLength: 1
    	});	
    });
    $("body").hide();
    // set up of the page when started
    $(document).ready(function(){
				$("body").show();
				//on document load
				$("#existing").hide();
				$("#showafterstart").hide();
				$("#new").hide();
				$("#cancel").hide();
				$("#addNewContact").hide();
				$("#newHotel").hide();
				$("#cancelChangeHot").hide();
				$("#newStage").hide();
				$("#cancelChangeStg").hide();
				$("#newDate").hide();
				$("#cancelChangeDt").hide();
				$("#newTime").hide();
				$("#cancelChangeTm").hide();
				$("#addCont").hide();
				$("#cancelAddCont").hide();
				$("#delCont").hide();
				$("#cancelDelCont").hide();
				//$("#dn").hide();
				$("#upCont").hide();
				$("#cancelUpCont").hide();
				$("#UpdateCont").hide();
				$("#cancelUpCont2").hide();
				
							
	});

	// as soon as the autocomplete is finished and on Existing Band is clicked, all band info shows up
	function get_band_info(){
	
		$("#existing").fadeIn();
		$("#showafterstart").fadeIn();
	
		$('#hotel').empty();
		$('#stage').empty();
		$('#pfDt').empty();
		$('#pfTm').empty();
		$('#not').empty();
		band = $("#bandName").val();
		//alert(band);
		$.post( "http://jazz.carbondd.com/services/bands.php", { bandName: band})
		  .done(function( data ) {
			myObj = JSON.parse(data);
			var contacts = [];
			
			
			//go through each and put it in an array
			$.each(myObj, function( key, val ) {
				if(band == val.band.bandName){
					
					$("#bandID").val(val.band.bandID);
					$("#hotel").val(val.band.hotel);
					oldHot = $("#hotel").val();
					$("#stage").val(val.band.stage);
					oldStg = $("#stage").val();
					$("#pfDt").val(val.band.perfDate);
					
					
					//var dt = val.band.perfDate;
					//document.getElementById('pfDt').value=dateConverter(dt);
					
					$("#pfTm").val(val.band.perfTime);	
					
					//var tm = val.band.perfTime;
					//document.getElementById('pfTm').value=milToStandard(tm);
					
					$("#not").val(val.band.note);
					$("#note").val(val.band.note);	
													
												
				}

			});
		});
	
	}
	
	function dateConverter(dt){
			var year = Number(dt.slice(0,4));
			var month = Number(dt.slice(5,7))-1;
			var day = Number(dt.slice(8,dt.length));		
			var pDate = new Date(year,month,day);
			convDate = pDate.toDateString();
			return convDate;
	}
	
	function milToStandard(tm){
			var timeHr = tm.slice(0,2);
			var timeMin = tm.slice(3,5);
			var timeAMPM = "AM";
			var hr = Number(timeHr);
			if (hr >= 12){
				if (hr == 12)
					timeHr = String(12);
				else
				timeHr = String(Number(timeHr)-12);
			timeAMPM = "PM";
			}
			else{
				if (hr == 0)
					timeHr = String(12);
				else
				timeHr = String(Number(timeHr)+1);
			}
			standard = timeHr + ":" + timeMin +" " + timeAMPM;
			return standard
	}
	
	
	function get_location_list(type){
		//loads the hotels and/or stage dropboxes.
		
		$.post( "http://jazz.carbondd.com/services/locations.php")
		  .done(function( data ) {
			myObj = JSON.parse(data);
			var locations = [];	
			var locs = [];	
			
			$("#locationName").append(new Option("--Select a Hotel--",""));
			$("#locName").append(new Option("--Select a Stage--",""));
			//$("#newlocationName").append(new Option("--Select a Hotel--",""));
			//$("#newlocName").append(new Option("--Select a Stage--",""));
			
			if(type=="hotels"){
				$("#locationName").empty();
				//$("#newlocationName").empty();
				
				//go through each and put it in an array
				$.each(myObj, function( key, val ) {
				
					if ((val.location.locationType) == 'Hotel'){
						locations.push(val.location.locationName);
						$("#locationName").append(new Option(val.location.locationName, val.location.locationName));
						$("#newlocationName").append(new Option(val.location.locationName, val.location.locationName));
						//alert(val.location.locationName);
					}
				});
			}
			
			if(type=="stages"){
				$("#locName").empty();
				//$("#newlocName").empty();
				
				//go through each and put it in an array
				$.each(myObj, function( key, val ) {
					if ((val.location.locationType) == 'Stage'){
						locs.push(val.location.locationName);
						$("#locName").append(new Option(val.location.locationName, val.location.locationName));
						$("#newlocName").append(new Option(val.location.locationName, val.location.locationName));
						//alert(val.location.locationName);
					}
				});

			}			
		});
		
	}

	function get_location_data(){
		//empty the fields
		//$('#locationType').empty();
		
		//get the selected location for hotel
		hotel = $("#locationName").val();	
		hotel = $("#newlocationName").val();
		
		//get the selected location for stage
		stage = $("#locName").val();
		stage = $("#newlocName").val();										
																				
																				
		$.post( "http://jazz.carbondd.com/services/locations.php")				
		  .done(function( data ) {												
			myObj2 = JSON.parse(data);											
			var location_data = [];												
																				
																				
			//go through each and put it in an array							
			$.each(myObj2, function( key, val ) {								
				if(hotel == val.location.locationName){							
					$("#locationType").val(val.location.locationType);			
					//locid = val.location.locationID;																		
				}
				
				if(stage == val.location.locationName){							
					$("#locType").val(val.location.locationType);			
					//locid = val.location.locationID;																		
				}


			});
						
		});
			
	} 
	

	function get_contact_list(){
		$('#contacts').empty();
		$('#delcontacts').empty();
		$('#upcontacts').empty();
		$('#newcontacts').empty();
		document.getElementById('contacts').value='';
		band = $("#bandName").val();
		$.post( "http://jazz.carbondd.com/services/contacts.php", { bandName: band})
		  .done(function( data ) {
			myObj = JSON.parse(data);
			var contacts = [];
			var delcontacts = [];
			var upcontacts = [];
			var newcontacts = [];
			
			
			//go through each and put it in an array
			$.each(myObj, function( key, val ) {
				contacts.push(val.contact.contactName);
				$("#contacts").append(new Option(val.contact.contactName, val.contact.contactName));
				delcontacts.push(val.contact.contactName);
				$("#delcontacts").append(new Option(val.contact.contactName, val.contact.contactName));
				upcontacts.push(val.contact.contactName);
				$("#upcontacts").append(new Option(val.contact.contactName, val.contact.contactName));
				newcontacts.push(val.contact.contactName);
				$("#newcontacts").append(new Option(val.contact.contactName, val.contact.contactName));


				//alert(val.contact.contactName);
				

				$("#contacts")[0].selectedIndex = 0;


			});
			

			//contact = data;
			get_contact_data();
		});
	
	}
	
	function get_contact_data(){
		//empty the fields
		$('#contactPhone').empty();
		$('#typeMgr').empty();
		$('#newcontactPhone').empty();
		$('#newtypeMgr').empty();
		//$('#upcontName').empty();
		//$('#upcontPhone').empty();
		//$('#upcontType').empty();

		
		//get the selected contact
		contact = $("#contacts").val();
		
		upct = $("#upcontacts").val();
		
		band = $("#bandName").val();
		$.post( "http://jazz.carbondd.com/services/contacts.php", { bandName: band})
		  .done(function( data ) {
			myObj2 = JSON.parse(data);
			var contact_data = [];
			
			
			//go through each and put it in an array
			$.each(myObj2, function( key, val ) {
				if(contact == val.contact.contactName){
							
					// for existing bands
					$("#ctPhone").val(val.contact.contactPhone);		//container before change
					$("#contactPhone").val(val.contact.contactPhone);	//container after change
					$("#tpMgr").val(val.contact.typeMgr);				//container before change
					$("#typeMgr").val(val.contact.typeMgr);				//container after change
								
					// for new bands
					$("#newctPhone").val(val.contact.contactPhone);			//container before change
					$("#newcontactPhone").val(val.contact.contactPhone);	//container after change
					$("#newtpMgr").val(val.contact.typeMgr);				//container before change
					$("#newtypeMgr").val(val.contact.typeMgr);				//container after change							
				}
				
				if(upct == val.contact.contactName){
				
					contactid = val.contact.contactID;
					$("#upcontName").val(val.contact.contactName);		//containers for updatess
					$("#upcontPhone").val(val.contact.contactPhone);
					$("#upcontType").val(val.contact.typeMgr);
					
				}


				//alert(val.contact.bandID);
			});
			//contact = data;
		});
			
	}
  
  
	  // when clicked on Change for hotel	    
	  $( "#changeHotel" ).click(function(){
			
			changeHotelFlag++;
			//alert(changeHotelFlag);
			// make sure this input box for hotel is empty
			$('#locationName').empty();
			$("#newHotel").fadeIn();
			$("#oldHotel").hide();
			$("#changeHot").hide();
			$("#cancelChangeHot").fadeIn();


	  });
	  
	  // when clicked on Cancel to not change the hotel location
	  $( "#cancelChangeHotel" ).click(function(){
			
			changeHotelFlag++;
			$("#newHotel").hide();
			$("#oldHotel").fadeIn();
			$("#changeHot").fadeIn();
			$("#cancelChangeHot").hide();
			//reset the location list for hotels
			//$('locationName').val('0');
			//document.getElementById('newlocationName').value='';

	  });
	  
	  // when clicked on Change for stage
	  $( "#changeStage" ).click(function(){
			
			changeStageFlag++;
			// make sure this input box for stage is empty
			$('#locName').empty();
			$("#newStage").fadeIn();
			$("#oldStage").hide();
			$("#changeStg").hide();
			$("#cancelChangeStg").fadeIn();


	  });
	  
	  // when clicked on Cancel to not change the stage location
	  $( "#cancelChangeStage" ).click(function(){
	  
			changeStageFlag++;		
			$("#newStage").hide();
			$("#oldStage").fadeIn();
			$("#changeStg").fadeIn();
			$("#cancelChangeStg").hide();
			//reset the location list for stages
			//$('locName').val('0');
			//document.getElementById('newlocName').value='';

	  });
	  
	  // when clicked on Change for performance date
	  $( "#changeDate" ).click(function(){
			
			$("#newDate").fadeIn();
			$("#oldDate").hide();
			$("#changeDt").hide();
			$("#cancelChangeDt").fadeIn();

	  
	  });
	  
	  // when clicked on Cancel to not change the performance date
	  $( "#cancelChangeDate" ).click(function(){
			
			$("#newDate").hide();
			$("#oldDate").fadeIn();
			$("#changeDt").fadeIn();
			$("#cancelChangeDt").hide();
			//document.getElementById('perfDate').value='';


	  });
	  
	  // when clicked on Change for performance time
	  $( "#changeTime" ).click(function(){
			
			$("#newTime").fadeIn();
			$("#oldTime").hide();
			$("#changeTm").hide();
			$("#cancelChangeTm").fadeIn();

	  });
	  
	  // when clicked on Cancel to not change the performance time
	  $( "#cancelChangeTime" ).click(function(){
			
			$("#newTime").hide();
			$("#oldTime").fadeIn();
			$("#changeTm").fadeIn();
			$("#cancelChangeTm").hide();
			$('perfTime').val('0');
	  });
	  
	  $( "#changePhone" ).click(function(){
			
			$("#oldPhone").hide();
			$("#newPhone").fadeIn();
			$("#cancelChangePh").fadeIn();
			$("#changePh").hide();

	  });
	  
	  $( "#cancelChangePhone" ).click(function(){
			
			$("#oldPhone").fadeIn();
			$("#newPhone").hide();
			$("#changePh").fadeIn();
			$("#cancelChangePh").hide();

	  });
	  
	  $( "#changeTypeMgr" ).click(function(){
			
			$("#oldType").hide();
			$("#newType").fadeIn();
			$("#cancelChangeType").fadeIn();
			$("#changeType").hide();

	  });
	  
	  $( "#cancelChangeTypeMgr" ).click(function(){
			
			$("#oldType").fadeIn();
			$("#newType").hide();
			$("#changeType").fadeIn();
			$("#cancelChangeType").hide();

	  });
	  
	  // when clicked on +Contact
	  $( "#addContact" ).click(function(){
			
			/*if (newband==0)
			{
				$.post( "addBandContact.php", $( "#bandcontact-update" ).serialize())
					.done(function (data){
	
						if(data){
							alert(data);
							
						}else{
							alert('failed');
						}
						newband=1;
	
				});
			}*/

			
			$("#delCont").hide();
			$("#cancelDelCont").hide();
			$("#upCont").hide();
			$("#cancelUpCont").hide();
			$("#UpdateCont").hide();
			$("#addCont").fadeIn();
			$("#cancelAddCont").fadeIn();
			
	  });
	  
	  // when click on cancel to cancel adding a new cntact to the list
	  $( "#cancelAddContact" ).click(function(){
			
			$("#addCont").hide();
			$("#cancelAddCont").hide();
	  });

	  // when clicked on Add to add new contact to the list
	  $( "#add" ).click(function(){
						
			$.post( "addContact2.php", $( "#bandcontact-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('addcontName').value='';
						document.getElementById('addcontPhone').value='';
						document.getElementById('addcontType').value='';



					}else{
						alert('failed');
					}

				});
			$("#addCont").hide();
			$("#cancelAddCont").hide();


	   });
	   
	   // when clicked on -Contact
	   $( "#delContact" ).click(function(){
			
			$("#addCont").hide();
			$("#cancelAddCont").hide();
			$("#upCont").hide();
			$("#cancelUpCont").hide();
			$("#UpdateCont").hide();
			$("#delCont").fadeIn();
			$("#cancelDelCont").fadeIn();
			
	   });
	   
	   //when click on Cancel to delete a contact from the list
	   $( "#cancelDelContact" ).click(function(){
			
			$("#delCont").hide();
			$("#cancelDelCont").hide();
	   });

	   // to delete a contact from the contact list
	   $( "#delete" ).click(function(){
	    	
	    	var e = document.getElementById("delcontacts");
			//var contactName = e.options[e.selectedIndex].text;
			
			//alert(e.options[e.selectedIndex].text);
			deleteName = e.options[e.selectedIndex].text;
			//alert(deleteName);
	    
	    	$.post( "deleteContact2.php", { bandName: band, contactName: deleteName}, $( "#bandcontact-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('ctPhone').value='';
						document.getElementById('contactPhone').value='';
						document.getElementById('tpMgr').value='';
						document.getElementById('typeMgr').value='';

					}else{
						alert('failed');
					}

				});

			
			$("#delCont").hide();
			$("#cancelDelCont").hide();
	   });
	  
	   // when clicked on Update Contact
	   $( "#upContact" ).click(function(){
			
			$("#addCont").hide();
			$("#cancelAddCont").hide();
			$("#delCont").hide();
			$("#cancelDelCont").hide();
			$("#UpdateCont").hide();
			$("#cancelUpCont2").hide();
			$("#upCont").fadeIn();
			$("#cancelUpCont").fadeIn();

			
	   });

	   //when click on Cancel to update a contact from the list
	   $( "#cancelUpContact" ).click(function(){
			
			$("#upCont").hide();
			$("#cancelUpCont").hide();
			$("#UpdateCont").hide();
			$("#cancelUpCont2").hide();
	   });
	   
	   // when user wants to start process of updating a contact
	   $( "#updte" ).click(function(){
			
			$("#upCont").hide();
			$("#cancelUpCont").hide();
	   		$("#UpdateCont").fadeIn();
	   		$("#cancelUpCont2").fadeIn();
	   
	   });
	   
	   //when click on Cancel to update a contact from the list
	   $( "#cancelUpContact2" ).click(function(){
			
			$("#upCont").hide();
			$("#cancelUpCont").hide();
			$("#UpdateCont").hide();
			$("#cancelUpCont2").hide();
	   });

	   
	   // to update a contact from the contact list in the database
	   $( "#updateDB" ).click(function(){
	   
	   		upcontName = $("#upcontName").val();
	   		upcontPhone = $("#upcontPhone").val();
	   		upcontType = $("#upcontType").val();
	   		oldcontName = $("#upcontacts").val();
	   		
	   		//alert(upcontName);
	   		//alert(upcontPhone);
	   		//alert(upcontType);
	   		//alert(contactid);
	   
	   		$.post( "updateContact2.php", { bandName: band, contactID: contactid, contactName: upcontName, contactPhone: upcontPhone, typeMgr: upcontType}, $( "#bandcontact-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('upcontName').value='';
						document.getElementById('upcontPhone').value='';
						document.getElementById('upcontType').value='';

					}else{
						alert('failed');
					}

				});
				
				$("#UpdateCont").hide();
	   			$("#cancelUpCont2").hide();
	   			get_contact_list();

	   });

	   
	   function get_txtarea_value() {
			
			//$("#note").val(val.band.note);
			
			$firsttextarea=$("#not").val();
			$('#note').val($firsttextarea);
	   }

	  // when the user wants to cancel adding a new band, reset the page
	  $( "#reset" ).click(function(){
	  				
			window.location="BandContact.php";

	  });
	  
	  $( "#updateBand" ).click(function(){
	  
	  		// the number of times clicking on change or cancel will be added
	  		// if %2 is equal to 1, i.e. a change has happened then
	  		//		copy new value into the old labels (objects)
	  		
			// if %2 os equal tp 0, i.e. no change has happened or it's undone by cancel
			//		copy old value back into the old labels (objects			
	
			if (changeHotelFlag%2==1){
				document.getElementById('hotel').value=$("#locationName").val();
			}
			else if (changeHotelFlag%2==0){
				document.getElementById('hotel').value=oldHot;
			}

			if (changeStageFlag%2==1){
				document.getElementById('stage').value=$("#locName").val();
				//alert($("#stage").val());
			}
			else if (changeStageFlag%2==0){
				document.getElementById('stage').value=oldStg;
			}

			if ($("#pfDt").val() != $("#perfDate").val() && $("#perfDate").val() != ''){
				document.getElementById('pfDt').value=$("#perfDate").val();
				//alert($("#pfDt").val());
			}
			
			if ($("#pfTm").val() != $("#perfTime").val() && $("#perfTime").val() != 'none'){
				document.getElementById('pfTm').value=$("#perfTime").val();
				//alert($("#pfTm").val());
			}


			// copy values from objects into local variables
			var id=$("#bandID").val();
			var hot=$("#hotel").val();
			var stg=$("#stage").val();
			var Dt=$("#pfDt").val();
			var Tm=$("#pfTm").val();
			var nt=$("#not").val();

			//update the band
			$.post( "updateBandContact.php", {bandID: id, hotel: hot, stage: stg, perfDate: Dt, perfTime: Tm, note: nt}, $( "#bandcontact-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						
						//document.getElementById('locationName').value='';
						//document.getElementById('locName').value='';
						//document.getElementById('perfDate').value='';
						//document.getElementById('perfTime').value='';
						
						//window.location="BandContact.php";

						//document.getElementById('pfDt').value=dateConverter($("#perfDate").val());
						//document.getElementById('pfTm').value=milToStandard($("#perfTime").val());
						
						$("#oldHotel").fadeIn();
						$("#changeHot").fadeIn();
						$("#newHotel").hide();
						$("#cancelChangeHot").hide();
						$("#oldStage").fadeIn();
						$("#changeStg").fadeIn();
						$("#newStage").hide();
						$("#cancelChangeStg").hide();

						$("#oldDate").fadeIn();
						$("#changeDt").fadeIn();
						$("#newDate").hide();
						$("#cancelChangeDt").hide();
						$("#oldTime").fadeIn();
						$("#changeTm").fadeIn();
						$("#newTime").hide();
						$("#cancelChangeTm").hide();
						
						
					}else{
						alert('failed');
					}

			});
			
	  });
	  
	  $( "#delBand" ).click(function(){
	  
	  		var name=$("#bandName").val();
			
			$.post( "deleteBand2.php", {bandName: name}, $( "#band-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						window.location="BandContact.php";
					}else{
						alert('failed');
					}

				});


	  });


	  
	 //$$$$$$$$$$$$$$$$$ NEW BAND $$$$$$$$$$$$$$$$$$$$$$
	 
	 // set up for new band page
	 $( "#addNEWBand" ).click(function(){
			
			$("#new").fadeIn();
			$("#showafterstart").fadeIn();
			$("#dn").fadeIn();
			$("#newband").hide();
			$("#existing").hide();
			$("#cancel").fadeIn();
			$("#addNEWCont").hide();
			$("#cancelNEWAddCont").hide();
			$("#delNEWCont").hide();
			$("#cancelNEWDelCont").hide();
			$("#newNEWPhone").hide();
			$("#cancelNEWChangePh").hide();
			$("#newNEWType").hide();
			$("#cancelNEWChangeType").hide();
			$("#updateBd").hide();			
						
			//$('#newlocationName').empty();
			//document.getElementById('newlocationName').value='--Select a Location--';


	  });
	  
	  // when user wants to add a new band
	  $( "#addBand" ).click(function(){

			// grab the new band's name			
			newband = $("#bandName").val();
			//alert(newband);
			var flag=0; // flag used to check if band already exists
			
			$.post( "http://jazz.carbondd.com/services/bands.php", { bandName: newband})
		  			.done(function( data ) {
				myObj = JSON.parse(data);
				//var bands = [];
			
			
				//go through each and put it in an array
				// checks here if this new band is already in database
				$.each(myObj, function( key, val ) {
					if(newband == val.band.bandName)
					{
						flag=1;					
					}
				});
				
				// if the new band is in the database, give alert, and don't do anything
				if (flag==1)
				{
					alert("This band exist");
				}
				// else insert the new band
				else 
				{
				
					$.post( "addBandContact.php", $( "#bandcontact-update" ).serialize())
					.done(function (data){
	
						if(data){
							alert(data);
							//document.getElementById('newperfDate').value=dateConverter($("#perfDate").val());
							$("#cancel").hide();
							$("#addband").hide();
							$("#dn").fadeIn();
							
						}else{
							alert('failed');
						}	
					});

				}

		
			});

	 });
	 
	 // once the new band is added with its contacts, the user can click on Done
	 // and resets all new input boxes to blanks
	 $( "#done" ).click(function(){
	 	
	 		//document.getElementById('newlocationName').value='';
			//document.getElementById('newlocName').value='';
			document.getElementById('newperfDate').value='';
			document.getElementById('newperfTime').value='';
			document.getElementById('newnote').value='';
						
			window.location="BandContact.php";
	 
	 });
	  

</script>