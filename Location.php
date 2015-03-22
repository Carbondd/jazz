<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/above-content.php"); ?>
<h3 class=>Location Information</h3>

<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#update" data-toggle="tab">
      Update Location</a></li>
   <!-- <li><a href="#add" data-toggle="tab"> + Location </a></li> -->
   <!-- <li><a href="#delete" data-toggle="tab">Delete Location</a></li> -->
</ul>


<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="update">
      <? require_once('views/location-update.php'); ?>
   </div>
   <div class="tab-pane fade" id="add">
      <? require_once('views/location-add.php'); ?>
   </div>
   <!-- <div class="tab-pane fade" id="delete">
      <? require_once('views/location-delete.php'); ?>
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
