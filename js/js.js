$(document).ready(function(){
	console.log("Document has loaded");
	$('.pages').css("display", "block");
		
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
	$('#date').change(function(){
		console.log('Date change triggered');
		
		$date = $('#date').val();
		console.log($date);
	
		$.getJSON("ajax_json_films.php?date=" + $date, function(filmdata){
			console.log("inside AJAX call");
			// 
			
			// empty filmlist
			$('#filmlist').empty();
			
			// display available films
			$.each(filmdata, function(data){
				$('#filmlist').append($('<li></li>').val(this.Film_ID).text(this.Title).addClass('filmchoice'));
				
			});
			
			if(!($('#filmlist').children().length > 0)){
				$('#filmlist').append('<p>').text("Geen films voor deze datum");
				$('#showlist').empty();
				$('#seats').empty();
				
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
	 	$Film_Title = $(this).text();
	 	console.log($Film_Title);
	 	
	 	console.log("Film ID: " + $Film_ID);
	 	
	 	// AJAX Call #2
	 	console.log("ajax_json_shows.php?Film_ID=" + $Film_ID + "&date=" + $date);
	 	$.getJSON("ajax_json_shows.php?Film_ID=" + $Film_ID + "&date=" + $date, function(showdata){
			console.log("Second AJAX call");
			$('#showlist').empty();
			$.each(showdata, function(data){
				
				$('#showlist').append($('<li></li>').val(this.ID).text("Zaal " + this.Screen + " om " + this.Time).addClass('showchoice'));
			});
			if(!($('#showlist').children().length > 0)){
				$('#showlist').append('<p>').text("Geen voorstellingen meer voor deze datum");
			} 
		});
	 	
	 	
	 });
	 
	 
	 // Register show selection - return available seating
	 $('#showlist').on("click", 'li' , function(){
	 	//visualise selection
	 	$(this).parent().children().css("font-weight", "normal");
	 	$(this).css("font-weight", "bold");
	 	// log to console
	 	$Show_ID = $(this).val();
	 	console.log("Show selection! Show_ID: " + $Show_ID);
	 	// clear seating first
	 	$('#seats').empty();
	 	// AJAX Call #3
	 	console.log("ajax_json_seats.php?Show_ID=" + $Show_ID);
	 	$.getJSON("ajax_json_seats.php?Show_ID=" + $Show_ID, function(showdata){
			console.log("Third AJAX call");
		// extract row width
			$row = showdata['0'];
			console.log("Row Width: " + $row);
						
			$.each(showdata, function(index){
				if(this==0){
					$('#seats').append($("<img src=\"img/seats/0.png\" class=\"available\">"));
				}
				if(this==1){
					$('#seats').append($("<img src=\"img/seats/1.png\" class=\"unavailable\">"));
				}
				if(index%$row==0){
						$('#seats').append("<br>");
					}
							
				
				
			});
			if(!($('#showlist').children().length > 0)){
				$('#showlist').append('<p>').text("Geen voorstellingen meer voor deze datum");
			} 
		});
		
	 	
	 	
	 });
	 
	 // register seat choice, highlight seat
	 $('#seats').on('click', 'img.available', function(){
	 	$('.selected').removeClass("selected").attr("src", "img/seats/0.png");
	 	$(this).attr("src", "img/seats/2.png").addClass("selected");
	 	
	 });
	 // Click next — List data on confirmation page
	 $('#confirmSeat').on("click", function(){
	 	$('#review').empty();
	 	$('#review').append('<h3>Confirm ticket</h3><p>'+ $Film_Title + '</p><p>Op ' + $date + ' om ' + </p>');
	 	//$('#review').append($Film_Title);
	 	//$('#review').append('<p>').text("Op " + $date + " om " +  + " in zaal ");
	 	//$('#review').append('<p>').text();
	 });
	 
	  	
	 	
	 
	 		  
	
// End document.ready	  	
});
