<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/above-content.php"); ?>
<h3 class=>Contact Information</h3>

<script>

    $(function() {
	    //autocomplete
	    $("#contactName").autocomplete({
	    source: "updateContactSearch.php",
	    minLength: 1
	    });	
	});
    
	$(function() {
	    //autocomplete
	    $("#bandName").autocomplete({
	    source: "groupSearch.php",
	    minLength: 1
    	});	
    });

/*    
    function loadContactInfo(){
     //Gets the name of the group name entered.
     contactSelected= $(".contactName").val();
     var infoList = "";
     $.ajax({
       url: 'contactInfo.php',
       type: "POST",
       async: false,
       data: { contactName: contactSelected}
       }).done(function(info){
          infoList = info.split(', ');
       });
       //Returns the javascript array of contact names for the selected group.
       return infoList; 
     }
                     
                 
     function getContactInfo(){
       var info = loadContactInfo();
       
       var mgr = info[0];
       var ph = info[1];
       var bd = info[2]; 
       
       $("#typeMgr").val() = info[0];
       document.getElementById("contactPhone").value = info[1];
       document.getElementById("bandName").value = info[2];
     }

*/
 </script>

<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#update" data-toggle="tab">
      Update / Delete Contact</a></li>
   <li><a href="#add" data-toggle="tab">Add Contact</a></li>
   <!--<li><a href="#delete" data-toggle="tab">Delete Contact</a></li> -->
</ul>


<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="update">
      <? require_once('views/contact-update.php'); ?>
   </div>
   <div class="tab-pane fade" id="add">
      <? require_once('views/contact-add.php'); ?>
   </div>
   <!--<div class="tab-pane fade" id="delete">
      <? require_once('views/contact-delete.php'); ?>
   </div> -->
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
