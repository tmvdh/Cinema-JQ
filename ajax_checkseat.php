<?php
	require_once("/src/Cinema/Business/TicketService.php");
	$Show_ID = (isset($_GET['Show_ID'])) ? $_GET['Show_ID'] : null;
	$Seat = (isset($_GET['Seat'])) ? $_GET['Seat'] : null;
	$ticketSvc = new TicketService;
	$output = $ticketSvc->checkSeat($Show_ID, $Seat);
	
	echo $output;

?>