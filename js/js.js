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
		console.log('Click event triggered');
		$date = $('#date').val();
		console.log("Date: " + $date);
		$.getJSON("ajax_json_films.php?date=" + $date, function(filmdata){
			console.log("inside AJAX call");
			$('#filmlist').empty();
			$.each(filmdata, function(data){
				$('#filmlist').append($('<li></li>').val(this.Film_ID).text(this.Title).addClass('filmchoice'));
			});
			if(!($('#filmlist').children().length > 0)){
				$('#filmlist').append('<p>').text("Geen films voor deze datum");
			} 
		});
	 });
	 
	 // Select film - Return showings
			// Click event on parent -> delegate to children
	 $('#filmlist').on("click", 'li' , function(){
	 	//visualise selection
	 	$(this).parent().children().css("font-weight", "normal");
	 	$(this).css("font-weight", "bold");
	 	
	 	$Film_ID = $(this).val();
	 	console.log("filmclick! Film_ID: " + $Film_ID);
	 	
	 	
	 	/* AJAX CALL GOES HERE*/
	 	
	 	$.getJSON("ajax_json_shows.php?Film_ID=" + $Film_ID + "date=" + $date, function(showdata){
			console.log("Second AJAX call");
			$('#showlist').empty();
			$.each(showdata, function(data){
				$('#showlist').append($('<li></li>').val(this.Show_ID).text("Zaal " + this.Screen_ID + " om " + this.Time).addClass('filmchoice'));
			});
			if(!($('#showlist').children().length > 0)){
				$('#showlist').append('<p>').text("Geen films voor deze datum");
			} 
		});
	 	
	 	
	 });
	 
	  	
	 	
	 
	 		  
	
// End document.ready	  	
});
