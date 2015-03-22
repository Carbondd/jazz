<form class="form-horizontal" role="form" method="post" id="location-add">
  <div class="form-group">
    <label for="addlocationName" class="col-sm-1 control-label" >Location:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control addlocationName" id="addlocationName" name="addlocationName" placeholder="Location Name">
    </div>
  </div>
  <div class="form-group">
    <label for="addlocationType" class="col-sm-1 control-label" >Type:</label>
    <div class="col-sm-3">
      	<select class="form-control addlocationType" id="addlocationType" name="addlocationType">
      		<?php getLocationType(); ?>
	  	</select>
    </div>
  </div> 
  <div class="col-sm-5">
       <input type="button" id="add-submit" class="btn btn-success" value=" Add " />
  </div>
</form>


	<script>

	$( "#add-submit" ).click(function(){
				
			$.post( "addLocation.php", $( "#location-add" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('addlocationName').value='';
						document.getElementById('addlocationType').value='--Select Location Type--';
                                                window.location="../Location.php";
					}else{
						alert('failed');
					}

				});
	});




</script>

