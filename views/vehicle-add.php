<form class="form-horizontal" role="form" method="post" id="vehicle-add">
  <div class="form-group">
    <label for="addVehicleName" class="col-sm-1 control-label" >Vehicle:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control addVehicleName" id="addVehicleName" name="addVehicleName" placeholder="Vehicle Name">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-5">
      <!--<button type="submit" class="btn btn-primary">Add</button> -->
      <input type="button" id="add-submit" class="btn btn-primary" value="Add" />
    </div>
  </div>
</form>

<script>

$( "#add-submit" ).click(function(){
			

			$.post( "addVehicle.php", $( "#vehicle-add" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('addVehicleName').value='';
					}else{
						alert('failed');
					}

				});


	  });


</script>


