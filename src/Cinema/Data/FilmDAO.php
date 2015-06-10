<?php
use PDO;
require_once("DBConfig.php");
require_once("Film.php");


class FilmDAO {

    public function getFilm($id){
        $sql = "select Film_ID, Title, Year, Description, Runtime from films where Film_ID = $id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $result = $resultSet->fetch();
        $film = new Film($result["Film_ID"], $result["Title"], $result["Year"], $result["Description"], $result["Runtime"]);
        return $film;
        $dbh = null;
    }
    public function getTitle($id){
        $sql = "select Title from films where Film_ID = $id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $result = $resultSet->fetch();
        $title = $result["Title"];
        return $title;
        $dbh = null;
    }

    public function addFilm($title, $year, $description, $runtime){
        $sql = "insert into films (title, year, description, runtime) values ($title, $year, $description, $runtime)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }

    public function getFilmsByDate($date){
        $list = array();
        $sql="select distinct Film_ID from shows where DATE(Time)='$date' AND Time > NOW()";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $row ){
           $line = $row["Film_ID"];
            array_push($list, $line);
        }
        $dbh = null;
        return $list;
    }
    //Alternate getFilmsByDate
    /*
    getFilmsByDate($date){
    $list = array();
    $sql="select distinct shows.Film_ID, Title from shows inner join films on shows.Film_ID = films.Film_ID where

    }
    */
    public function getShows($Film_ID, $date){
        $list = array();
        $sql="select Show_ID, TIME(Time) as Time
              from shows
              where Film_ID = $Film_ID AND Time like '$date%' AND Time > NOW()";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $row){
            $line = array("ID" => $row["Show_ID"], "Time" => $row["Time"]);
            array_push($list, $line);
        }
        $dbh = null;
        return $list;
    }
    public function getShowtime($Show_ID){
        $sql = "select TIME(Time) as Time from shows where Show_ID = $Show_ID";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $result = $resultSet->fetch();
        $time = $result["Time"];
        $dbh = null;
        return $time;

    }
    public function getScreen($Show_ID){
        $sql = "select Screen_ID from shows where Show_ID = $Show_ID";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $result = $resultSet->fetch();
        $screen = $result["Screen_ID"];
        $dbh = null;
        return $screen;
    }




}