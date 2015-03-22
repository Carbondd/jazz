<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/above-content.php"); ?>
<h3 class=>Driver Information</h3>
<script>
$(function() {
    //autocomplete
    $(".name").autocomplete({
    source: "driverSearch.php",
    minLength: 1
    });	
    });
	
</script>

<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#update" data-toggle="tab">
      Update Driver</a></li>
   <!--<li><a href="#add" data-toggle="tab"> + Driver </a></li> -->
   <!--<li><a href="#delete" data-toggle="tab">Delete Driver</a></li> -->
</ul>


<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="update">
      <? require_once('views/driver-update.php'); ?>
   </div>
   <div class="tab-pane fade" id="add">
      <? require_once('views/driver-add.php'); ?>
   </div>
   <!--<div class="tab-pane fade" id="delete">
      <? require_once('views/driver-delete.php'); ?>
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
