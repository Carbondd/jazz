<form class="form-horizontal" role="form" method='post' id="vehicle-delete" >
  <div class="form-group">
    <label for="vehicleName" class="col-sm-1 control-label">Vehicle:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control vehicleName" id="vehicleName" name="vehicleName" placeholder="Vehicle Name">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-5">
      <!-- <button type="submit" style="float:right;" class="btn btn-primary">Delete</button> -->
      <input type="button" id="submit" class="btn btn-primary" value="Delete" />
    </div>
  </div>
</form>

<script>

$( "#submit" ).click(function(){
			

			$.post( "deleteVehicle2.php", $( "#vehicle-delete" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('vehicleName').value='';
					}else{
						alert('failed');
					}

				});


	  });


</script>