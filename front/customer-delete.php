<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['customer_id'])) {
		header('Location: select-login.php');
	}

	if (isset($_GET['customer_id'])) {
		// getting the user information
		$customer_id = mysqli_real_escape_string($connection, $_GET['customer_id']);


			// deleting the user
			$query = "UPDATE customer SET is_deleted = 1 WHERE customer_id = {$customer_id} LIMIT 1";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// user deleted
				header('Location: index.php?msg=user_deleted');
			} else {
				header('Location: customer-profile.php?err=delete_failed');
			}
		}
		

?>