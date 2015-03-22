<?php include "master.php"; ?>
<div id="search">
    <form class="form-horizontal" role="form" method='post' id="bandcontact-update">
      <div class="form-group">
	    <label for="bandName" class="col-sm-1 control-label">Band:</label>
	    <div class="col-sm-3">
	      <input  type="text" class="form-control bandName" id="bandName" name="bandName" placeholder="Band Name">
	    </div>
            <div class="col-md-4">
              <button id="update-bandcontact-search-btn" class="btn btn-primary" >Search/Add</button>
            </div> 
            <div class="col-sm-1">
	       <input type="button" id="deleteBandBtn" class="btn btn-danger" value=" - Band " />
            </div>
            <div class="col-sm-3" id="delNote">   
	          	<span class="deleteNote"><font color='red'><b>Deleting the band will also delete all<br />of its members/contacts and runs!</b></font></span>
	    </div>
	    <div class="col-sm-2" id="cancel">
          	<input type="button" id="reset" class="btn btn-primary" value="Cancel" />
	    </div>
	  
	   <div>
	     <!--<div class="col-sm-2" id="existband">
	   		<input onclick="_info(); get_contact_list()" type="button" id="getBandInfo" class="btn btn-primary" value="Existing Band" />
	     </div>
	     <div class="col-sm-1" id="newband">
	       	<button type="button" id="addNEWBand" class="btn btn-success"><span style="font-size:12px;" class="glyphicon glyphicon-plus"></span> Band</button><br /><br />
	        <button type="button" id="delBand" class="btn btn-danger"><span style="font-size:12px;" class="glyphicon glyphicon-minus"></span> Band</button>

		    </div> 
            <br/><br/><br/>
	          	<span class="deleteNote"><font color='red'><b><u>Note:</u> Deleting the band will also delete all of its members/contacts and trips!</b></font></span> -->

	     
	   </div>
	  </div> 
	  <hr>
	  <div id="existing">

	  	  <div class="form-group" >
		    <label for="hotel" class="col-sm-1 control-label">Hotel:</label>
		    <div class="col-sm-3" id="newHotel">
          		<select id="locationName" name="locationName" class="form-control locationName"  onchange="get_location_data()" >
	      			<option id="0">--Select a Hotel--</option>
          		</select>
	   		</div> 
		    <label for="stage" class="col-sm-2 control-label">Stage:</label>
			<div class="col-sm-3" id="newStage">
	          <select id="locName" name="locName" class="form-control locName" onchange="get_location_data()" >
		      	<option id="0">--Select a Stage--</option>
	          </select>
		    </div> 
	      </div>

	      <div class="form-group" >
		    <label for="pfDt" class="col-sm-1 control-label">Perf Date:</label>
		    <div class="col-sm-3" id="oldDate">
	          	<input type="text" class="form-control pfDt" id="pfDt" name="pfDt" placeholder="Date">
		   </div>
		    <label for="newTime" class="col-sm-2 control-label">Perf Time:</label>
		    <div class="col-sm-3" id="newTime">
            	<input id="pftm" type="text" name="newperfTime" class="timepicker form-control" />
		      <!--<select class="form-control" id="newperfTime" name="newperfTime">
            	<option value="none">--Select Time--</option>
            	<?php getTimesOption(); ?> 
              </select> -->   	   
            </div>
	      </div>
		  <div class="form-group" >
		    <label for="not" class="col-sm-1 control-label">Note:</label>
		    <div class="col-sm-8" id="oldNote">
	          	<textarea style='resize: none;' class="form-control not" id="not" name="not" rows="2" cols="50" placeholder="Note"></textarea>
		    </div>
	      </div>  
		  <div class="form-group" >
		    <label for="not" class="col-sm-1 control-label">Main Contact:</label>
		    <div class="col-sm-3" id="oldNote">
	          	<textarea style='resize: none;' class="form-control not" id="contactEmail" name="contactEmail" rows="2" cols="50" placeholder="Contact Name + Email"></textarea>
		    </div>
	      </div>
	     <div>
	      	<br />
	      	<label class="col-sm-4 control-label"></label>
	      	<div class="col-sm-3" id="addband">
	          	<input type="button" id="addBandBtn" class="btn btn-success" value="Click to Add Band to DB before continuing" />
		    </div>     
	       </div>
      </div> <!-- end div exsiting band --> 

	     
<div id="showafterstart"> <br/>
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
                  <br/>
	          	<span class="deleteContactNote"><font color='red'><b>Deleting contact will also delete all of contact's runs!</b></font></span>
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
			<div class="col-sm-4" ></div>
	      	<div class="col-sm-1" >
	          	<input type="button" id="updateBand" class="btn btn-warning" value="Save" />
		    </div>    
	      </div>
	      

     <input name='bandID' id="bandID" type='hidden' />
     <input name="altDate" class="date_alternate" type="hidden"/>
     </div>
    </form> 
</div>
<br />
<br />
<br />
<br />
<br />
<script>

	var changeHotelFlag=0; // need to know how many times will be clicked on change or cancel
	var changeStageFlag=0; // same for stage
	var oldHot, oldStg;	   // save the values of hotel and stage before changing
	var bid;

     $("#update-bandcontact-search-btn").click(function(event){
		event.preventDefault(); 
		_info();
                get_contact_list();
		//gives a second for the trip info to load
		//setTimeout(getLocations, 100);
                //setTimeout(getDriverNames, 100);
		
		 
	});	//btn click
	
    $("body").hide();
    // set up of the page when started
	
    $(document).ready(function(){
		
		$("body").show();
		//autocomplete for a band
		$( "#pfDt" ).datepicker({ dateFormat: "DD, d MM, yy", altField: ".date_alternate", altFormat: "yy-mm-dd"});
	    $("#bandName").autocomplete({
	    source: "groupSearch.php",
	    minLength: 1
    	});	
		
		$("").hide();
		
		//on document load
		$("#existing").hide();
		$("#showafterstart").hide();
		$("#new").hide();
		$("#cancel").hide();
		$("#addNewContact").hide();
		$("#addCont").hide();
		$("#cancelAddCont").hide();
		$("#delCont").hide();
		$("#cancelDelCont").hide();
		//$("#dn").hide();
		$("#upCont").hide();
		$("#cancelUpCont").hide();
		$("#UpdateCont").hide();
		$("#cancelUpCont2").hide();
		$("#addNewBand").hide();
		$("#delBand").hide();
				
		//this post function loads the locations into the drop box.	
		$.post( "/services/locations.php", {})
		  .done(function( data ) {
			myObj2 = JSON.parse(data);
			var location_data = [];
			
			
			//go through each and put it in an array
			$.each(myObj2, function( key, val ) {
				//put locations in different dropdown boxes based on type of location//dont show airlines
				if(val.location.locationType=="Hotel"){
					$("#locationName").append(new Option(val.location.locationName,val.location.locationName));
				}else if(val.location.locationType=="Stage")
					$("#locName").append(new Option(val.location.locationName,val.location.locationName));
			});
			//contact = data;
		});//post					
	});

	// as soon as the autocomplete is finished and on Existing Band is clicked, all band info shows up
	function _info(){
		showLoading();
		$("#existing").fadeIn();
		$("#showafterstart").fadeIn();
	
		//$('#hotel').empty();
		//$('#stage').empty();
		$('#pfDt').empty();
		$('#pfTm').empty();
		$('#not').empty();
		$('#contactEmail').empty();
		band = $("#bandName").val();
		$.post( "/services/bands.php", { bandName: band})
			.always(function() {
			  stopLoading();
		  })
		   	.fail(function() {
			  stopLoading();
			  $("newband").fadeIn();
			})	
		  	.done(function( data ) {
				
				myObj = JSON.parse(data);
				var contacts = [];
				if(data!="[]"){
					$("#addBandBtn").hide();
					$("#deleteBandBtn").fadeIn();
				}
				else{
					$("#addBandBtn").fadeIn();
					$("#deleteBandBtn").hide();
                                        $("#delNote").hide();	
				} 
			
				//reset the form
				$(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio, #bandName').val('');
    			$(':checkbox, :radio').prop('checked', false);
				
				//go through each and put it in an array
				$.each(myObj, function( key, val ) {
					if(band == val.band.bandName){
						$("#bandID").val(val.band.bandID);
						$("#locationName").val(val.band.hotel);
						$("#locName").val(val.band.stage);
						$("#not").val(val.band.note);
						$("#contactEmail").val(val.band.contactEmail);
	
						//this algorithm is needed because date when formatted is pushed back 1 day--------------*/
						var d = new Date(val.band.perfDate+"T00:00:00");
	
						newestDate = (new Date(d.getTime() + d.getTimezoneOffset()*60000));
						$("#pfDt").datepicker("setDate", newestDate);
						/*----------------------------------------------------------------------------------------*/
						
						//time converted to show usaer a readable time
						time = milToStandard(val.band.perfTime);
						$("#pftm").val(time);
	
					}//each
					stopLoading();
				});//done
			});//post
		
		}

	
	function get_location_list(type){
		//loads the hotels and/or stage dropboxes.
		
		$.post( "/services/locations.php")
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
																				
																				
		$.post( "/services/locations.php")				
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
		$.post( "/services/contacts.php", { bandName: band})
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
		//$('#ctPhone').empty();
		//$('#tpMgr').empty();

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
		$.post( "/services/contacts.php", { bandName: band})
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
			document.getElementById('addcontName').value='';
			document.getElementById('addcontPhone').value='';
			document.getElementById('addcontType').value='';
	  });

	  // when clicked on Add to add new contact to the list 
	  $( "#add" ).click(function(){
						
			if ($("#addcontPhone").val()==""){
				alert("Need contact phone #.");
				exit();
			} 
			
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
		  	showLoading()
			
			// copy values from objects into local variables
			// bname needed in case user wants to change/correct the name of the band
			// band was the name to search for info about the band, bname in case band name is changing
			var bname=$("#bandName").val();
			var hot=$("#locationName").val();
			var stg=$("#locName").val();
			var nt=$("#not").val();
			var ce=$("#contactEmail").val();
			
			//must be converted back! ////////////////////////////////
			var Dt = $( ".date_alternate" ).val();
			var Tm=$("#pftm").val();
			
			//time has to be converted  
			time = standardToMil(Tm);

			//update the band
			$.post( "updateBandContact.php", {bandName: band, newbandName: bname, hotel: hot, stage: stg, perfDate: Dt, perfTime: time, note: nt, contactEmail: ce}, $( "#bandcontact-update" ).serialize())
				 .always(function() {
					stopLoading();
				})
				 .fail(function() {
					stopLoading();
					alert( "error" );
				  })
				.done(function (data){

					if(data){
						alert(data);
					}else{
						alert('failed');
					}
				stopLoading();
			});

	  });
	  
	  $( "#deleteBandBtn" ).click(function(){
	  
			// grab the band's name			
			newband = $("#bandName").val();
			
			
			//alert(newband);
			var flag=0; // flag used to check if band already exists
			
			if (newband=="")
				alert("No band to delete");
				
			else {
			
				$.post( "/services/bands.php", { bandName: newband})
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
							var answer = confirm('Are you sure to delete this band with its contacts and runs?');

							if (answer){
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
							}
						}
						// else band is not in database; cannot be deleted
						else 
						{
							alert("Band is not in database");
						}
			
				});
			}
	  

		}); 


	  
	 //$$$$$$$$$$$$$$$$$ NEW BAND $$$$$$$$$$$$$$$$$$$$$$
	 
	 // set up for new band page
	 $( "#addNEWBand" ).click(function(){
			
			$("#new").fadeIn();
			$("#showafterstart").fadeIn();
			$("#dn").fadeIn();
			$("").fadeIn();
			$("#updateBd").hide();	
			$(".deleteNote").hide();
			$("#delBand").hide();
						
			//$('#newlocationName').empty();
			//document.getElementById('newlocationName').value='--Select a Location--';


	  });
	  
	  // when user wants to add a new band
	  $( "#addBandBtn" ).click(function(){

			// grab the new band's name			
			newband = $("#bandName").val();
			
			
			//alert(newband);
			var flag=0; // flag used to check if band already exists
			
			$.post( "/services/bands.php", { bandName: newband})
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
                                                        document.getElementById('bandName').value='';
						}
						// else insert the new band
						else 
						{
							var values = $( "#bandcontact-update" ).serializeArray()
							//must be converted back! ////////////////////////////////
							var Dt = $( ".date_alternate" ).val();
							var Tm=$("#pftm").val();
							
							//time has to be converted
							time = standardToMil(Tm);
							values.push({name: 'newperfTime', value: Tm});
							values.push({name: 'newperfDate', value: Dt});
							
							$.post( "addBandContact.php",values)
								.done(function (data){

								if(data){
									alert(data);
						
									$("#cancel").hide();
									$("#addBandBtn").hide();
									//$("#deleteBandBtn").fadeIn();
									$("#dn").fadeIn();

								
								}else{
									alert('failed');
								}	
							});
	
						}
			
					});

				 });
	 


</script>