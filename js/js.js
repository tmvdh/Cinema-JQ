$(document).ready(function(){
	$('.pages').css({"display": "block", "border": "1px solid black"});
	
	// datepicker
	$.datepicker.setDefaults({
		  showOn: "focus",
		  regional: "nl",
		  minDate: 0,
		  maxDate: "+1m",
		  dateFormat: "y-mm-dd"
		  });
	$('.date').datepicker();
	
			  
	
	  	
});
