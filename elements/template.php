<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/above-content.php"); ?>
<h3 class=>Title Information</h3>

<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#update" data-toggle="tab">
      Update Trip</a></li>
   <li><a href="#add" data-toggle="tab">Add Trip</a></li>
</ul>


<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="update">
      <? require_once('views/trip-update.php'); ?>
   </div>
   <div class="tab-pane fade" id="add">
      <? require_once('views/trip-add.php'); ?>
   </div>
</div>



<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/below-content.php"); ?>
