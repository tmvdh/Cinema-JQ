<?php

require_once("src/Cinema/Data/DBconfig.php");
require_once("src/Cinema/Entities/Ticket.php");



class TicketDAO {

        public function getTicket($id){
            $sql = "select * from tickets where Ticket_ID = $id";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $resultSet = $dbh->query($sql);
            $result = $resultSet->fetch();
            $ticket = new Ticket($result["Ticket_ID"], $result["User_ID"], $result["Show_ID"], $result["Seat"]);
            $dbh = null;
            return $ticket;
        }

        public function addTicket($User_ID, $Show_ID, $Seat){
                #generate barcode
                $charset = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
                $barcode ="";
                while (strlen($barcode)<20){
                    $barcode .= $charset[array_rand($charset)];
                }

            $sql = "insert into tickets (User_ID, Show_ID, Seat, Barcode) values ('$User_ID', '$Show_ID', '$Seat', '$barcode')";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $dbh->exec($sql);
            $dbh = null;
            return $barcode;
        }

        public function getAllTickets($Show_ID){
            $list = array();
            $sql = "select Seat from tickets where Show_ID = $Show_ID ";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $resultSet = $dbh->query($sql);
            foreach ($resultSet as $row){
                $seat = $row["Seat"];
                array_push($list, $seat);
            }
            return $list;
            $dbh = null;
        }

        public function checkSeat($Show_ID, $Seat){
            $sql = "select count(*) as count from tickets where Show_ID = $Show_ID AND Seat = $Seat";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $resultSet = $dbh->query($sql);
            $result = $resultSet->fetch();
            $check = $result["count"]<>0 ? 'false': 'true';
            $dbh = null;
            return $check;
            #NB Check returns true if seat available!
        }
}
