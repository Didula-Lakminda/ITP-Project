<?php



//connect to the data base
$db = new mysqli("localhost","root","","supermarket");

//display connection error

if($db->connect_errno)
{
	printf("Database connection error : %s\n", $db->connect_errno);
	exit();
}
?>