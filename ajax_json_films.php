<?php
require_once("/src/Cinema/Business/FilmService.php");
$date = $_GET['date'];
$filmSvc = new FilmService();
$output = $filmSvc->getFilmsByDateForJSON($date);
echo(json_encode($output));
?>