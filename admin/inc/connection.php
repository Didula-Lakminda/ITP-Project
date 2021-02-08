<?php 

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'supermarket'; 

	$connection = mysqli_connect('localhost', 'root', '', 'supermarket');

	// Checking the connection
	if (mysqli_connect_errno()) {
		die('Database connection failed ' . mysqli_connect_error());
	}

?>