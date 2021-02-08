<?php

session_start();


	if (isset($_SESSION['customer_id'])) {
		header('Location: customer-profile.php');
	}
	else if (isset($_SESSION['supplier_id'])){
		header('Location: supplier-profile.php');
	}
	else{
		header('Location: select.php');
	}



?>