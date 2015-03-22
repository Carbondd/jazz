<div id="search">
    <form class="form-horizontal" role="form" method='post' id="contact-update">
      <div class="form-group" >
	    <label for="bandName" class="col-sm-1 control-label">Band:</label>
	    <div class="col-sm-4">
	      <input onblur="get_contact_list()" type="text" class="form-control bandName" id="bandName" name="bandName" placeholder="Band Name">
	   </div> 
      </div>
      <div class="form-group" >
	    <label for="contactName" class="col-sm-1 control-label">Contact:</label>
	    <div class="col-sm-4">
          <select id="contactName" size="5" name="contactName" class="form-control" onclick="get_contact_data()">
	      	<option id="0">--Select a Contact--</option>
          </select>
	   </div> 
      </div>
      <div class="form-group" >
	    <label for="contactPhone" class="col-sm-1 control-label">Phone:</label>
	    <div class="col-sm-4">
          	<input type="text" class="form-control contactPhone" id="contactPhone" name="contactPhone" placeholder="Contact Phone">
	   </div> 
      </div>
      <div class="form-group" >
	    <label for="typeMgr" class="col-sm-1 control-label">Type:</label>
	    <div class="col-sm-4">
          	<input type="text" class="form-control typeMgr" id="typeMgr" name="typeMgr" placeholder="Contact Type">
	   </div> 
      </div>
      <div class="form-group" >
	    <div class="col-sm-4">
          	<input type="button" id="submit" class="btn btn-primary" value="Update" />
          	<input type="button" id="submit2" class="btn btn-primary" value="Delete" />
	   </div> 
      </div>
    </form> 
</div>
 
<div class="search_results"></div>
<script>


	function get_contact_list(){
		$('#contactName').empty();
		band = $("#bandName").val();
		$.post( "http://jazz.carbondd.com/services/contacts.php", { bandName: band})
		  .done(function( data ) {
			myObj = JSON.parse(data);
			var contacts = [];
			
			
			//go through each and put it in an array
			$.each(myObj, function( key, val ) {
				contacts.push(val.contact.contactName);
				$("#contactName").append(new Option(val.contact.contactName, val.contact.contactName));
				//alert(val.contact.contactName);
			});
			//contact = data;
			get_contact_data();
		});
	
	}
	
	function get_contact_data(){
		//empty the fields
		$('#contactPhone').empty();
		$('#contactType').empty();
		
		//get the selected contact
		contact = $("#contactName").val();
		
		band = $("#bandName").val();
		$.post( "http://jazz.carbondd.com/services/contacts.php", { bandName: band})
		  .done(function( data ) {
			myObj2 = JSON.parse(data);
			var contact_data = [];
			
			
			//go through each and put it in an array
			$.each(myObj2, function( key, val ) {
				if(contact == val.contact.contactName){
					$("#contactPhone").val(val.contact.contactPhone);
					$("#typeMgr").val(val.contact.typeMgr);										
				}

				//alert(val.contact.contactName);
			});
			//contact = data;
		});
			
	}
	function get_contact_list2(){

		band = $("#bandName").val();
		$.getJSON( "ajax/test.json", function( data ) {
			var items = [];
			$.each( data, function( key, val ) {
				items.push( "<li id='" + key + "'>" + val + "</li>" );
			});
		});
	}

			$(document).ready(function(){
				//on document load
				$("#changes").hide();
				var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#bandName" ).autocomplete({
      source: "groupSearch.php"
    });
	

				//if ask to update contact
				$("#getInfo").click(function(){
					$("#contactUpdate").hide();
					$("#changes").fadeIn();
				});
			});
				
	   $( "#submit" ).click(function(){
			
			$.post( "updateContact2.php", $( "#contact-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('bandName').value='';
						document.getElementById('contactName').value='';
						document.getElementById('contactPhone').value='';
						document.getElementById('typeMgr').value='';
					}else{
						alert('failed');
					}

				});


	  });
	  
	  $( "#submit2" ).click(function(){
			
			$.post( "deleteContact2.php", $( "#contact-update" ).serialize())
				.done(function (data){

					if(data){
						alert(data);
						document.getElementById('bandName').value='';
						document.getElementById('contactName').value='';
						document.getElementById('contactPhone').value='';
						document.getElementById('typeMgr').value='';

					}else{
						alert('failed');
					}

				});


	  });

</script>