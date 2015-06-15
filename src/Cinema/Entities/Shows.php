<?php

class Shows {

    $private $id;
    private $film;
    private $screen;
    private $datetime;

    public function __construct($id, $film, $screen, $datetime){
        $this->id = $id;
        $this->film = $film;
        $this->screen = $screen;
        $this->datetime = $datetime;
    }
    #getters
    public function getID(){
        return $this->id;
    }
    public function getFilm(){
        return $this->film;
    }
    public function getScreen(){
        return $this->screen;
    }
    public function getDatetime(){
        return $this->datetime;
    }
    #setters
    public function setID($id){
        $this->id = $id;
    }
    public function setFilm($film){
        $this->film = $film;
    }
    public function setScreen($screen){
        $this->screen = $screen;
    }
    public function setDatetime($datetime){
        $this->datetime = $datetime;
    }

}