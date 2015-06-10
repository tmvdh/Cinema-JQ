<?php

class Ticket {

    private $id;
    private $user;
    private $show;
    private $seat;

    public function __construct($id, $user, $show, $seat){
        $this->id = $id;
        $this->user = $user;
        $this->show = $show;
        $this->seat = $seat;
    }

    #getters
    public function getID{
        return $this->id;
    }
    public function getUser{
        return $this->user;
    }
    public function getShow{
        return $this->show;
    }
    public function getSeat{
        return $this->seat;
    }
    #setters
    public function setID($id){
        $this->id = $id:
    }
    public function setUser($user){
        $this->user = $user;
    }
    public function setShow($show){
        $this->show = $show;
    }
    public function setSeat($seat){
        $this->seat = $seat;
    }
}