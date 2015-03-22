<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/above-content.php"); ?>
<h3 >Run Information</h3>


    <script>
  $(function() {
    $( "#tripDate" ).datepicker({ dateFormat: "yy-mm-dd" });
  });
  
     /*$(function() {
		//autocomplete
		$(".bandName").autocomplete({
			source: "groupSearch.php",
			minLength: 1
			/*select: function(event, ui) { 
				$("#group").val(ui.item.bandName)
				}
		});	
   	 });*/


    /*function loadContactNames(){
     //Gets the name of the group name entered.
     groupSelected= $(".bandName").val();
     var contactList = "";
     $.ajax({
       url: 'contactSearch.php',
       type: "POST",
       async: false,
       data: { bandName: groupSelected}
       }).done(function(contacts){
          contactList = contacts.split(', ');
       });
       //Returns the javascript array of contact names for the selected group.
       return contactList; 
     }
                     
                 
     function autocompleteContacts(){
       var contacts = loadContactNames();

		   $("#updateContact").autocomplete({
		   source: contacts
		   });
       }*/

</script>

<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#run-report" data-toggle="tab">Run Report</a></li>
   <li><a href="#run-driver-report" data-toggle="tab">Drivers Report</a></li>
</ul>


<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="run-report">
      <? require_once('views/trip-testReport.php'); ?>
   </div>
   <div class="tab-pane fade" id="run-driver-report">
      <? require_once('views/driver-report.php'); ?>
   </div>
</div>


<script>
   $(function(){
      $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      // Get the name of active tab
      var activeTab = $(e.target).text(); 
      // Get the name of previous tab
      var previousTab = $(e.relatedTarget).text(); 
      $(".active-tab span").html(activeTab);
      $(".previous-tab span").html(previousTab);
   });
});
</script>



<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/below-content.php"); ?>
