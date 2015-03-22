showLoading();
$(document).ready(function(){
	//call all of the on load handlers
	$("#loader").hide();
	$(".timepicker").ptTimeSelect();	
});

//function to handle time conversion
function milToStandard(tm){
		var timeHr = tm.slice(0,2);
		var timeMin = tm.slice(3,5);
		var timeAMPM = "AM";
		var hr = Number(timeHr);
		if (hr >= 12){
			if (hr == 12)
				timeHr = String(12);
			else
			timeHr = String(Number(timeHr)-12);
		timeAMPM = "PM";
		}
		else{
			if (hr == 0)
				timeHr = String(12);
			else
			timeHr = String(Number(timeHr));
		}
		standard = timeHr + ":" + timeMin +" " + timeAMPM;
		return standard
}

//function to handle date conversions  
function dateConverter(dt){
		var year = Number(dt.slice(0,4));
		var month = Number(dt.slice(5,7))-1;
		var day = Number(dt.slice(8,dt.length));		
		var pDate = new Date(year,month,day);
		convDate = pDate.toDateString();
		return convDate;
}

//converts a time into an am/pm
function convertToStandardTime(tm) {
	// var now = new Date(); Current date
	var now = new Date("2010-10-10T"+tm)  // Your pass your date/time here
	var hours = now.getHours();
	var minutes = now.getMinutes();
	var seconds = now.getSeconds();
	var timeValue = "" + ((hours >12) ? hours -12 :hours);
	
	if(minutes== 0)
		timeValue += ":00";
	else
		timeValue += ((minutes < 10) ? ":0" : ":"  + minutes);
	timeValue += (hours >= 12) ? " PM" : " AM";
	return timeValue;
}	

function showLoading(){
	//function that handles the display of the loading circle
	$("#loader").show();
	$("#overlay").addClass("overlay");

}

function stopLoading(){
	//function that handles the display of the loading circle
	$("#loader").hide();
	$("#overlay").removeClass("overlay");

}

function standardToMil(tm){
  
  	var pos = tm.search(":");
 	var timeHr = tm.slice(0,pos);
  	var timeMin = tm.slice((pos+1),(pos+3));
  	var hr = Number(timeHr);
  	if (tm.charAt((pos+4)) == "A"){
	 	if (hr == 12)
		timeHr = String(0);
  
	  	timeHr = "0" + timeHr;
  	}
  	else{
	  	if (hr < 12)
			timeHr = String(Number(timeHr)+12);
  	}
  	mil = timeHr + ":" + timeMin + ":" + "00";
  	return mil;
  
}