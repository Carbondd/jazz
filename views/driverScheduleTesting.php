<? require_once($_SERVER['DOCUMENT_ROOT']."/elements/above-content.php"); ?>
<h3 >Driver Scheduling Test</h3>
<br />
<form class="form-horizontal" role="form" >

	<div id="getdate">
		<div class="form-group" >
			<label for="tripDt" class="col-sm-1 control-label">Date:</label>
			<div class="col-sm-3">
			  <input type="text" class="tripDt form-control" id="tripDt" name="tripDt" placeholder="Trip Date">
			</div> 
		</div>
		<div class="form-group">
			<label for="pu-time" class="col-sm-1 control-label">P/U Time:</label>
			<div class="col-sm-3">
				<input type='text' class='timepicker form-control' id='pu-time' name='pu-time' placeholder="Time of pick up" />
			</div>
		</div>
		<div class="form-group">
			<label for="duration" class="col-sm-1 control-label">Duration:</label>
			<div class="col-sm-1">
			  <input type="text" class="form-control duration" id="duration" name="duration" placeholder="Duration" />
			</div>	
		</div>
	
		
		<br />
		<div class="col-sm-3">
		  <input type='button' class='btn btn-primary' id='search-btn' value='Search' />
		</div>
	</div>

	<br /><br /><br />
	
	<div id="result" >
		<div class="form-group"  >
			<label for="drivers" class="col-sm-1 control-label">Available Drivers:</label>
			<div class="col-sm-3">
			  <select id="drivers" name="drivers" class="form-control drivers" >
						  <option value="Select">-- Select a Driver --</option>
			  </select>
			</div>
		</div>
	</div>
	
	
</form>

<script>

	$(function() {
		        $( "#tripDt" ).datepicker({ dateFormat: "DD, d MM, yy", altField: ".date_alternate", altFormat: "yy-mm-dd"});  
				$("#result").hide();

	});

	$("#search-btn").click(function(event){
		event.preventDefault();
		$("#result").fadeIn(); 
		getAvailDrivers();
	});
	
	
	function addMinutes(time, minsToAdd) {
	  function z(n){ return (n<10? '0':'') + n;};
	  var bits = time.split(':');
	  var mins = bits[0]*60 + +bits[1] + +minsToAdd;

	  return z(mins%(24*60)/60 | 0) + ':' + z(mins%60);  
	}  
	
	function getAvailDrivers()
	{
		$( "#tripDt" ).datepicker("option", "dateFormat", "yy-mm-dd" );
		var dt = $("#tripDt").val();
		var dur = $("#duration").val();
		var time=$("#pu-time").val();	
		//time has to be converted 
		tm = standardToMil(time);
		//alert(tm);
		//alert(dur);
		
		//time done after duration  
		puPlusDur = addMinutes(tm,dur);
		//alert("trip starts at "+tm+"       and ends at "+puPlusDur);
		//alert(puPlusDur); 
		if (puPlusDur.substring(0, 2)=="00")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "24");
		else if (puPlusDur.substring(0, 2)=="01")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "25");
		else if (puPlusDur.substring(0, 2)=="02")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "26");
		else if (puPlusDur.substring(0, 2)=="03")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "27");
		else if (puPlusDur.substring(0, 2)=="04")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "28");
		else if (puPlusDur.substring(0, 2)=="05")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "29");
		else if (puPlusDur.substring(0, 2)=="06")
			puPlusDur = puPlusDur.replace(puPlusDur.substring(0, 2), "30");
		
		//alert(puPlusDur);
		
		var times = [];
		
		$.post( "/services/getAvailableDrivers.php", {tripDate: dt})
			.done(function( data ) {
			myObj2 = JSON.parse(data);
			var drivers = [];
			
			//go through each and put it in an array 
			$.each(myObj2, function( key, val ) {
				//put each row for drivers in 2-dim array   
				
				//   data.push({label: lab[i], value: val[i]});
				did=val.driver.driverID;
				times.push(did);
				name=val.driver.name;
				times.push(name);
				pickup=val.driver.pickUpTime;
				times.push(pickup);
				avtm=val.driver.availableAsOf;
				if (avtm.substring(0, 2)=="00")
					avtm = avtm.replace(avtm.substring(0, 2), "24");
				else if (avtm.substring(0, 2)=="01")
					avtm = avtm.replace(avtm.substring(0, 2), "25");
				else if (avtm.substring(0, 2)=="02")
					avtm = avtm.replace(avtm.substring(0, 2), "26");
				else if (avtm.substring(0, 2)=="03")
					avtm = avtm.replace(avtm.substring(0, 2), "27");
				else if (avtm.substring(0, 2)=="04")
					avtm = avtm.replace(avtm.substring(0, 2), "28");
				else if (avtm.substring(0, 2)=="05")
					avtm = avtm.replace(avtm.substring(0, 2), "29");
				else if (avtm.substring(0, 2)=="06")
					avtm = avtm.replace(avtm.substring(0, 2), "30");
				times.push(avtm);
				avdt=val.driver.availableOnDate;
				times.push(avdt); 

			});
			//alert(times); 
		
			// put names of drivers from array back in drop down box
			//var dropdown = document.getElementById("drivers");

			driver=""; // to compare if a driver name is already in the drop down box
			olddriverid=0;
			anewdriver=0; // flag for driver
			$("#drivers").empty();
			for (i=0; i<times.length; i=i+5) //i=i+5 for going to next record  
			{
				driverid=times[i];

				if (driverid>olddriverid){
					anewdriver=1;  //set the flag for a new driver
					//alert(newdriver); 
				}
				else
					anewdriver=0;
					
				nextdriver=times[i+1];
				// if driver name is taken, go to next iteration   
				if ( driver == nextdriver){
					olddriverid=driverid;   
					continue;
				}
				
				if (anewdriver==1)
				{
					//as soon as a driver is picked get out
					if (puPlusDur < times[i+2]){
						$("#drivers").append(new Option(times[i+1], times[i+1]));
						driver=times[i+1];
						continue; 
					}
					
					//if last record is reached, and it is on the same date  
					if (i==times.length-5 && tm>=times[i+3]){	//&& times[i+4]==dt
						$("#drivers").append(new Option(times[i+1], times[i+1]));
						driver=times[i+1];
					}
					//if there is only one run for a driver 
					else if (times[i]!=times[i+5] && tm>=times[i+3]){	//&& times[i+4]==dt 
						$("#drivers").append(new Option(times[i+1], times[i+1]));
						driver=times[i+1];  
					}
					
				}
				else{
					//if this driver had runs already, i.e. not a newdriver, see the driver is in the 
					//last record and it is on the same date
					if (i==times.length-5 && (tm>=times[i+3] && puPlusDur<times[i+2])){	//&& times[i+4]==dt
						$("#drivers").append(new Option(times[i+1], times[i+1]));
						driver=times[i+1];
					}
					//if this is the last run for a driver, maybe there is available time for a run 
					else if (times[i]!=times[i+5] && tm>=times[i+3]){	//&& times[i+4]==dt
						$("#drivers").append(new Option(times[i+1], times[i+1]));
						driver=times[i+1];  
					}
					else if (tm>=times[i-2] && puPlusDur<times[i+2]){  
						//alert(i);
						//alert("driver="+times[i+1]);
						//$("#drivers").append(new Option(val.driver.name,val.driver.name));      
						$("#drivers").append(new Option(times[i+1], times[i+1]));
						driver=times[i+1]; 
					}
				}
				olddriverid=driverid; 
			}
		});//post 
		
		//get all other drivers who were not scheduled that day and therefore are available
		$.post( "/services/getAllDriversNotScheduled.php", {tripDate: dt})
			.done(function( data ) {
			myObj2 = JSON.parse(data);
			//var adddrivers = [];
			
			//go through each and put it in an array   
			$.each(myObj2, function( key, val ) {
				
				var driverid = val.driver.driverID;
				var drivername = val.driver.name;
				//alert(driverid);


				//alert(tm);
				//alert(puPlusDur);
				//alert(driverid);
				//alert(drivername);
				$.post( "/services/checkRoster.php", {driverID: driverid, tripDate: dt})
					.done(function( dat ) {
					myObj3 = JSON.parse(dat);
					
					$.each(myObj3, function( key, value ) {
							/*alert(tm);
							alert(puPlusDur);
							alert(driverid);
							alert(drivername); 
							alert(value.driver.driverID);
							alert(value.driver.runDate);
							alert(value.driver.startTime);
							alert(value.driver.endTime);
							if (driverid==value.driver.driverID)
								alert("true driverid");
							if (dt==value.driver.runDate)
								alert("true dt");
							if (tm >= value.driver.startTime)
								alert("true tm");
							if (puPlusDur<= value.driver.endTime)
								alert("true puPlusDur");*/
							if (driverid==value.driver.driverID && dt==value.driver.runDate && tm >= value.driver.startTime && puPlusDur<= value.driver.endTime){
								$("#drivers").append(new Option(drivername, drivername));
							}
			
					}); //each myObj3      
				}); //post checkRoster
			
			}); //each myObj2
		
		
		}); //post getAllDriversNotScheduled
	
	}


</script>