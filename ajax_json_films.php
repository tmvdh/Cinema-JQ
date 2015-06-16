<?php
require_once("/src/Cinema/Business/FilmService.php");
$date = (isset($_GET['date']))? $_GET['date']:'2015-06-19';
$filmSvc = new FilmService();
$output = $filmSvc->getFilmsByDateForJSON($date);
echo(json_encode($output));
?>