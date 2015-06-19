<?php
require_once("/src/Cinema/Business/FilmService.php");
$date = (isset($_GET['date']))? $_GET['date'] : null;
$Film_ID = (isset($_GET['Film_ID'])) ? $_GET['Film_ID'] : null;
$filmSvc = new FilmService();
$output = $filmSvc->getShows($Film_ID, $date);
echo(json_encode($output));
?>
