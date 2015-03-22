<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/above-content.php"); ?>
<h3 class=>Test Text</h3>

<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#update" data-toggle="tab">
      Test Text</a></li>
</ul>


<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="update">
      <? require_once('views/text.php'); ?>
   </div>
</div>


<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/below-content.php"); ?>
