<?php include "master.php"; ?>
<form class="form-horizontal" role="form" method="post" id="contact-add">
  <div class="form-group">
    <label for="addcontactName" class="col-sm-1 control-label" >Contact:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control addcontactName" id="addcontactName" name="addcontactName" placeholder="Contact Name">
    </div>
  </div>
   <div class="form-group">
    <label for="addtypeMgr" class="col-sm-1 control-label" >Type:</label>
    <div class="col-sm-4">
      	<select class="form-control addtypeMgr" id="addtypeMgr" name="addtypeMgr">
      		<?php getMgrOption(); ?>
	  	</select>
    </div>
  </div>
  <div class="form-group">
    <label for="addcontactPhone" class="col-sm-1 control-label" >Phone:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control addcontactPhone" id="addcontactPhone" name="addcontactPhone" placeholder="xxx-xxx-xxxx">
    </div>
  </div>
  <div class="form-group">
    <label for="addbandName" class="col-sm-1 control-label" >Band:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control addbandName" id="addbandName" name="addbandName" placeholder="Band Name">
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-5">
      <!-- <button style="float:right;" type="submit" id="submit" class="btn btn-primary">Add</button> -->
      <input type="button" id="add-submit" class="btn btn-primary" value="Add" />
    </div>
  </div>
</form>


<script>

	$(function() {
	    //autocomplete
	    $("#addbandName").autocomplete({
	    source: "groupSearch.php",
	    minLength: 1
    	});	
    });



	$( "#add-submit" ).click(function(){
			
			//contact = $("#contactName").val();
			//type = $("#typeMgr").val();
			//phone = $("#contactPhone").val();
			//band = $("#bandName").val();
			
			$.post( "addContact2.php", $( "#contact-add" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('addcontactName').value='';
						document.getElementById('addtypeMgr').value='--Select Manager Type--';
						document.getElementById('addcontactPhone').value='';
						document.getElementById('addbandName').value='';



					}else{
						alert('failed');
					}

				});


	  });



</script>

