<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/above-content.php"); ?>
<h3 >Driver Schedules</h3>


    <script>
  $(function() {
    $( "#tripDate" ).datepicker({ dateFormat: "yy-mm-dd" });
  });
  

</script>

<ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#run-report" data-toggle="tab">Driver Schedule</a></li>
</ul>


<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="driver-schedule">
      <? require_once('views/driver-schedule.php'); ?>
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
