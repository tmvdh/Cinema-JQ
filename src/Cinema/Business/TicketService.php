<?php

require_once("src/Cinema/Data/TicketDAO.php");
require_once("src/Cinema/Data/ScreenDAO.php");
require_once("src/Cinema/Data/UserDAO.php");


class TicketService {

    public function getAllTickets($Show_ID){

        $TicketDAO = new TicketDAO();
        $tickets = $TicketDAO->getAllTickets($Show_ID);
        $ScreenDAO = new ScreenDAO();
        $screen = $ScreenDAO->getScreen($Show_ID);
        $seating = array_fill(1,$screen["Seats"], 0);
        foreach ($tickets as $ticket){
            $seating[$ticket] = 1;
        }
        return $seating;
    }

    public function addTicket($User_ID, $Show_ID, $Seat){
        // $barcode = strtoupper(sha1($Show_ID . $Seat));
        $TicketDAO = new TicketDAO();
        $ticket = $TicketDAO->addTicket($User_ID, $Show_ID, $Seat);
        return $ticket;
    }

    public function addUser($fname, $sname, $email){
        $userdao = new UserDAO();
        $user = $userdao->addUser($fname, $sname, $email);
        return $user;

    }

    public function checkSeat($Show_ID, $Seat){
        $TicketDAO = new TicketDAO();
        $check = $TicketDAO->checkSeat($Show_ID, $Seat);
        return $check;
    }
}