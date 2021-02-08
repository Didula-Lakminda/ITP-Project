<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header>
		<div class="appname">Super Market Management System</div>
		<div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?>! <a href="customer-logout.php">Log Out</a></div>
	</header>