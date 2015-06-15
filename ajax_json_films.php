<?php
require_once("/src/Cinema/Business/FilmService.php");
$date = (isset($_GET['date']))? $_GET['date']:'';
$filmSvc = new FilmService();
$output = $filmSvc->getFilmsByDateForJSON($date);
print "ajax_json_films.php";
print_r($output);
echo $output;

?>