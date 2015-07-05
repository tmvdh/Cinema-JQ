<?php
	require_once("/src/Cinema/Business/TicketService.php");
	$fname = (isset($_GET['fname'])) ? $_GET['fname'] : null;
	$sname = (isset($_GET['sname'])) ? $_GET['sname'] : null;
	$email = (isset($_GET['email'])) ? $_GET['email'] : null;
	$show = (isset($_GET['show'])) ? $_GET['show'] : null;
	$seat = (isset($_GET['seat'])) ? $_GET['seat'] : null;
	$ticketSvc = new TicketService;
	$user = $ticketSvc->addUser($fname, $sname, $email);
	$ticket = $ticketSvc->addTicket($user, $show, $seat);
	echo $ticket;