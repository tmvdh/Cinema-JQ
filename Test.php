<?php
	require_once("/src/Cinema/Business/FilmService.php");
	
	$filmSvc = new  FilmService();
	$test = $filmSvc -> getFilmsByDateJSON("2015-06-12");
	print_r($test);
	
	
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Test Page</title>
<meta name="" content="">
</head>
<body>
	<p>&lt;html&gt;</p>
	<p>This is a test line.</p>
</body>
</html>