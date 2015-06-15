<?php

class Screen {
    private $id;
    private $seats;

    public function __construct($id, $seats){
        $this->id = $id;
        $this->seats = $seats;
    }

    #getters
    public function getID(){
        return $this->id;
    }
    public function getSeats(){
        return $this->seats;
    }
    #setters
    public function setID($id){
        $this->id = $id;
    }
    public function setSeats($seats){
        $this->seats = $seats;
    }

}