<?php
	DEFINE ('DB_USER', 'root');
	DEFINE ('DB_PWD', '');
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_NAME', 'littleblog');

	//Create a database connection
	$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME)
	OR die('Could not connect to database');
?>