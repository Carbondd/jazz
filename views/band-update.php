<form class="form-horizontal" role="form" method='post' id="band-update">
  <div class="form-group" id="original">
    <label for="bandName" class="col-sm-1 control-label">Band:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control bandName" id="bandName" name="bandName" placeholder="Band Name" > 
    </div>
  </div>
  <div class="form-group" id="new">
    <label for="newbandName" class="col-sm-1 control-label">Change to:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control newbandName" id="newbandName" name="newbandName" />
    </div>
  </div>
  
  <div class="form-group" id="beforeupdatedelete" >
	    <div class="col-sm-4">
          	<input type="button" id="submit1A" class="btn btn-primary" value="Update" />
          	<input type="button" id="submit2" class="btn btn-primary" value="Delete" />	   	
	   </div> 
	   
   </div>

   <div class="form-group" id="message">
	   <div class="col-sm-5">
	   		<font color='green'><b><u>Note:</u> Deleting the band will also delete all of its members/contacts and trips!</b></font> 
	   </div>	 
   </div>

   <div class="form-group" id="afterupdate" >
	    <div class="col-sm-4">
          	<input type="button" id="submit1B" class="btn btn-primary" value="Update" />
          	<input type="button" id="reset" class="btn btn-primary" value="Cancel" />
          	<!--<input type="button" id="submit2" class="btn btn-primary" value="Delete" />	-->		         	
	   </div> 
	   <!-- <div>
	   		<font color='green'><b><u>Note:</u> Deleting the band will also delete all of its members/contacts and trips!</b></font> 
	   </div> -->
   </div>
</form>

<script>

	var band;
	var bandid;
	
	$(function() {
			//autocomplete
			
			var select = false;
			$(".bandName").autocomplete({
			source: "groupSearch.php",
			minLength: 1			    
			});
	
   	 });
	 
	 $("#submit1A").click(function(){
		  band = $("#bandName").val();	
		  bandid=null;
		  $.post( "http://jazz.carbondd.com/services/bands.php", { bandName: band})
				.done(function( data ) {
				  myObj2 = JSON.parse(data);
				  var band_data = [];
				  
				  
				  
				  //go through each and put it in an array
				  $.each(myObj2, function( key, val ) {
					  //if(band == val.band.bandName){
						  //(val.band.bandID);	  
						  bandid = val.band.bandID;	
						  //alert(bandid);								
					  //} 
	  
				  });	
				  if(bandid==null){

					//alert(bandid);
					//alert(band);
					alert("Choose band first, and click on Update"); 
					$("#original").fadeIn();
					$("#new").hide();
					$("#beforeupdatedelete").fadeIn();
					$("#afterupdate").hide();
					$("#message").fadeIn();
			
					document.getElementById('bandName').value='';
					document.getElementById('newbandName').value='';

				}
				else{
					band = $("#bandName").val();
					//alert(band);

					$("#original").hide();
					$("#new").fadeIn();
					$("#beforeupdatedelete").hide();
					$("#afterupdate").fadeIn();
					$("#message").hide();
					document.getElementById('newbandName').value=band;
				}	
			  });
			  
			  
	 });
					
					
	$(document).ready(function(){
				//on document load
				$("#new").hide();
				$("#afterupdate").hide();
			
	});



	$( "#submit1B" ).click(function(){
			
			//newband = $("#newbandName").val();
			newband = document.getElementById("newbandName").value;
			//alert(newband);
			
			//get_band_ID();
			//alert(bandid);
			$.post( "updateBand2.php", {bandID: bandid, bandName: newband}, $( "#band-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						$("#original").fadeIn();
						$("#new").hide();
						$("#beforeupdatedelete").fadeIn();
						$("#afterupdate").hide();
						$("#message").fadeIn();
						document.getElementById('bandName').value='';
						document.getElementById('newbandName').value='';
						
					}else{
						alert('failed');
					}

				});


	  });
	  
	  $( "#reset" ).click(function(){
	  
	  				
			$.post( "Band.php", $( "#band-update" ).serialize())
				.done(function (){

					$("#original").fadeIn();
					$("#new").hide();
					$("#beforeupdatedelete").fadeIn();
					$("#afterupdate").hide();
					$("#message").fadeIn();

					//$('#bandName').empty();
					//$('#newbandName').empty();

					document.getElementById('bandName').value='';
					document.getElementById('newbandName').value='';

				}); 


	  });

	  
	  $( "#submit2" ).click(function(){
			
			$.post( "deleteBand2.php", $( "#band-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('bandName').value='';
					}else{
						alert('failed');
					}

				});


	  });


</script>

