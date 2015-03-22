/*
	Scripts that handle reading and writing to database
	made using ajax request to given folder in the controller or service folders
*/

function getBancContacts(band){
	//get and return allobjects of a given band	
	  		  
	
}

function getContact(id){
	var result = null;
	$.post( "http://jazz.carbondd.com/services/contacts2.php", {contactID:id})
	   .always(function() {
		  stopLoading();
		})	
	   .fail(function() {
		  alert("There was an error loading data");
		})	
	  .done(function( data ) {
		  result = data; 				
		  
		//contact = data;
	});//post
	console.log(result);
	return result;	
}