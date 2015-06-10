<?php

class Film {
    private $id;
    private $title;
    private $year;
    private $description;
    private $runtime;

    public function __construct($id, $title, $year, $description, $runtime){
            $this->id = $id;
            $this->title = $title;
            $this->year = $year;
            $this->description = $description;
            $this->runtime = $runtime;
    }
#getters
    public function getTitle(){
        return $this->title;
    }
    public function getYear(){
        return $this->year;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getRuntime(){
        return $this->runtime;
    }

#setters
    public function setTitle($title){
        $this->title = $title;
    }
    public function setYear($year){
        $this->year = $year;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setRuntime($runtime){
        $this->runtime = $runtime;
    }
}