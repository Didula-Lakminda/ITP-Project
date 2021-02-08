<?php

	session_start();
	require_once'inc/connection.php';
	require_once 'fpdf/fpdf.php';
	require_once 'inc/functions.php';
	
	// checking if a user is logged in
	if (!isset($_SESSION['customer_id'])) {
		header('Location: select-login.php');
	}

	$query = "SELECT * FROM payment_cart WHERE user_id = {$_SESSION['customer_id']}";
		
	$users = mysqli_query($connection, $query);
	
	if(isset($_POST['btn2_pdf']))
	{
		$pdf = new fpdf('p','mm','a4');
		$pdf->SetFont('arial','b','10');
		$pdf->AddPage();
		$pdf->cell('40','10','Receipt ID','1','0','C');
		$pdf->cell('40','10','Product Name','1','0','C');
		$pdf->cell('40','10','Quantity','1','0','C');
		$pdf->cell('40','10','Price','1','1','C');
		
		while ($user = mysqli_fetch_assoc($users)){
			
			$pdf->cell('40','10',$user['Receipt_ID'],'1','0','C');
			$pdf->cell('40','10',$user['Product_Name'],'1','0','C');
			$pdf->cell('40','10',$user['Quantity'],'1','0','C');
			$pdf->cell('40','10',$user['Price'],'1','1','C');
			
		}
	
		$pdf->Output();
	}

?>