<?php

require_once("/src/Cinema/Data/FilmDAO.php");


Class FilmService{
	
	public function getFilmsByDateForJSON (){
		$date = (isset($_GET['cc'])) ? $_GET['cc']:'';
		$films = $this->getFilmsByDate($date);
		return json_encode($films);
		
		
	}
	
	
	
	
	
	
	
	
	
	

    public function getFilmsByDate($date){
        $FilmDAO = new FilmDAO();
        $films = $FilmDAO->getFilmsByDate($date);
        return $films;
    }

    public function getShows($Film_ID, $date){
        $FilmDAO = new FilmDAO();
        $shows = $FilmDAO->getShows($Film_ID, $date);
        return $shows;
    }

    public function getTitle($Film_ID){
        $FilmDAO = new FilmDAO();
        $title = $FilmDAO->getTitle($Film_ID);
        return $title;
    }

    public function getShowtime($Show_ID){
        $FilmDAO = new FilmDAO();
        $time = $FilmDAO->getShowtime($Show_ID);
        return $time;

    }

    public function getScreen($Show_ID){
        $FilmDAO = new FilmDAO();
        $screen = $FilmDAO->getScreen($Show_ID);
        return $screen;

    }


}