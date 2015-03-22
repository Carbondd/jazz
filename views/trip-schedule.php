<script> 
	$(document).ready(function() {
	
		// page is now ready, initialize the calendar...
		//var dt_to = $.datepicker.formatDate('yyyy-mm-dd', new Date());
		//alert(dt_to);
		$("#calendar").fullCalendar({
			// put your options and callbacks here
		allDaySlot:'false',
		events: [
			{
				title: 'All Day Event',
				start: '2014-07-01',
			}
		],
		dayClick: function(date, view) {
     			$('#calendar').fullCalendar('changeView', 'agendaDay');
				$('#calendar').fullCalendar('gotoDate', date);
				
		},
		header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month'
		}
		
		})
	
	});
</script>

<div id='calendar'></div>