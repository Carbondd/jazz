<form class="form-horizontal" role="form" method="post" id="driver-add">
  <div class="form-group">
    <label for="addname" class="col-sm-1 control-label" >Driver:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control addname" id="addname" name="addname" placeholder="Driver Name">
    </div>
  </div>
  <div class="form-group">
    <label for="addphone" class="col-sm-1 control-label" >Phone:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control addphone" id="addphone" name="addphone" placeholder="xxx-xxx-xxxx">
    </div>
  </div>
  <div class="form-group">
	<label for="addvehicle" class="col-sm-1 control-label">Vehicle Type:</label>
	<div class="col-sm-3">
		<select id="addvehicle" name="addvehicle" class="form-control addvehicle"  >
	     	<option id="0">--Select a Vehicle--</option>
	     </select>
	</div>
  </div>
  <div class="form-group">
	<label for="addlicense" class="col-sm-1 control-label">License #:</label>
	<div class="col-sm-3">
	    <input type="text" class="form-control addlicense" id="addlicense" name="addlicense" placeholder="License #">
	</div>
  </div>
  <div class="col-sm-5">
      <br />
      <input type="button" id="add-submit" class="btn btn-success" value=" Add " />
    </div>
</form>

<script>

	$(document).ready(function(){
			//on document load
			
			//this post function loads the vehicles into the drop box.	
			$.post( "/services/vehicles.php", {})
			  .done(function( data ) {
				myObj2 = JSON.parse(data);
				var vehicle_data = [];
								
				//go through each and put it in an array 
				$.each(myObj2, function( key, val ) {
					//alert(val.vehicle.vehicleName);
					$("#addvehicle").append(new Option(val.vehicle.vehicleName,val.vehicle.vehicleName));
				});
			}); //post					
	});

	$( "#add-submit" ).click(function(event){
	
			event.preventDefault();
			//getVehicleNames();
			
			//contact = $("#contactName").val();
			//type = $("#typeMgr").val();
			//phone = $("#contactPhone").val();
			//band = $("#bandName").val();
			
			$.post( "addDriver.php", $( "#driver-add" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						//document.getElementById('addname').value='';
						//document.getElementById('addphone').value='';
						//document.getElementById('addvehicle').value='';
						//document.getElementById('addlicense').value='';
						window.location="../Driver.php";

					}else{
						alert('failed');
					}

				});


	  });
	  

</script>


