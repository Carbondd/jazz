<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/above-content.php"); ?>
<h3 >Run Information</h3>


    <script>
  $(function() {
    $( "#tripDate" ).datepicker({ dateFormat: "yy-mm-dd" });
  });
  
     $(function() {
		//autocomplete
		$(".bandName").autocomplete({
			source: "groupSearch.php",
			minLength: 1
			/*select: function(event, ui) { 
				$("#group").val(ui.item.bandName)
				}*/
		});	
   	 });

    function loadContactNames(){
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
       }

</script>

<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#update2" data-toggle="tab">Update / Add Run</a></li>
   <!--<li><a href="#schedule" data-toggle="tab">Run Schedule</a></li>-->
   <!--<li><a href="#update2" data-toggle="tab">Update 2</a></li>-->
   <!--<li><a href="#testreport" data-toggle="tab">Test Report</a></li>-->
</ul>


<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="update">
      <? require_once('views/trip-update2.php'); ?>
   </div>
   <div class="tab-pane fade" id="add">
      <? require_once('views/trip-add.php'); ?>
   </div>
   <!--<div class="tab-pane fade" id="schedule">
      <? require_once('views/trip-schedule.php'); ?>
   </div>-->
   <!--<div class="tab-pane fade" id="update2">
      <? require_once('views/trip-update2.php'); ?>
   </div>-->
   <!--<div class="tab-pane fade" id="testreport">
      <? require_once('views/trip-testReport.php'); ?>
   </div>-->

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
