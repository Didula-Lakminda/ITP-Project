<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['supplier_id'])) {
		header('Location: select-login.php');
	}

	if (isset($_GET['supplier_id'])) {
		// getting the user information
		$supplier_id = mysqli_real_escape_string($connection, $_GET['supplier_id']);


			// deleting the user
			$query = "UPDATE supplier SET is_deleted = 1 WHERE supplier_id = {$supplier_id} LIMIT 1";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// user deleted
				header('Location: index.php?msg=user_deleted');
			} else {
				header('Location: supplier-profile.php?err=delete_failed');
			}
		}
		

?>