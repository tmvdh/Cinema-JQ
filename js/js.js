$(document).ready(function(){
	console.log("Document has loaded");
	$('.pages').css({"display": "block", "border": "1px solid black"});
	
	// datepicker
	$.datepicker.setDefaults({
		  showOn: "focus",
		  regional: "nl",
		  minDate: 0,
		  maxDate: "+1m",
		  dateFormat: "yy-mm-dd"
		  });
	$('.datePicker').datepicker();
	
	
	$('#dateSubmit').on("click", function(){
		console.log('Click!');
		$date = $('#date').val();
		console.log($date);
		$.getJSON("ajax_json_films.php?date=" + $date, function(filmdata){
			console.log("JSON!");
			$.each(filmdata, function(data){
				$('#filmlist').append($('<li></li>').val(this.Film_ID).text(this.Title));
			});
			
		});
	
	
	
	});		  
	
	  	
});
