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
	
	
	// Date submit - Return films
	$('#dateSubmit').on("click", function(){
		console.log('Click!');
		$date = $('#date').val();
		console.log($date);
		$.getJSON("ajax_json_films.php?date=" + $date, function(filmdata){
			console.log("JSON!");
			$('#filmlist').empty();
			$.each(filmdata, function(data){
				$('#filmlist').append($('<li></li>').val(this.Film_ID).text(this.Title).addClass('filmchoice'));
			});
			//$('.filmchoice').on("click", function(){alert("It's alive!!!")});
			if(!($('#filmlist').children().length > 0)){
				$('#filmlist').append('<p>').text("Geen films voor deze datum");
			} 
		});
	 });
	 
	 // Select film - Return showings
	 $('li').on("click", function(){
	 	$value = $(this).val();
	 	console.log("filmclick! Film_ID:");
	 	console.log($value);
	 });
	 
	  	
	 	
	 
	 		  
	
// End document.ready	  	
});
