<?php
require_once("/src/Cinema/Business/TicketService.php");
$date = (isset($_GET['date']))? $_GET['date'] : null;
$Show_ID = (isset($_GET['Show_ID'])) ? $_GET['Show_ID'] : null;
$ticketSvc = new TicketService();
$output = $ticketSvc->getAllTickets($show_ID);
echo(json_encode($output));
?>