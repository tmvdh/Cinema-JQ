<?php
require_once("/src/Cinema/Business/TicketService.php");
$Show_ID = (isset($_GET['Show_ID'])) ? $_GET['Show_ID'] : null;
$ticketSvc = new TicketService;
$output = $ticketSvc->getAllTickets($Show_ID);
echo(json_encode($output));
?>