<?php

	session_start();
	require_once'inc/connection.php';
	require_once 'fpdf/fpdf.php';
	require_once 'inc/functions.php';
	
	// checking if a user is logged in
	if (!isset($_SESSION['supplier_id'])) {
		header('Location: select-login.php');
	}

	$query = "SELECT * FROM supplierproduct WHERE user_id = {$_SESSION['supplier_id']}";
		
	$users = mysqli_query($connection, $query);
	
	if(isset($_POST['btn_pdf']))
	{
		$pdf = new fpdf('p','mm','a4');
		$pdf->SetFont('arial','b','8');
		$pdf->AddPage();
		$pdf->cell('22','10','Requset ID','1','0','C');
		$pdf->cell('22','10','Product Name','1','0','C');
		$pdf->cell('22','10','Category','1','0','C');
		$pdf->cell('22','10','Quantity','1','0','C');
		$pdf->cell('22','10','Price','1','0','C');
		$pdf->cell('22','10','Discount','1','0','C');
		$pdf->cell('22','10','Expired Date','1','0','C');
		$pdf->cell('22','10','Description','1','0','C');
		$pdf->cell('22','10','Approved Type','1','1','C');
		
		while ($user = mysqli_fetch_assoc($users)){
			
			$pdf->cell('22','10',$user['RequestID'],'1','0','C');
			$pdf->cell('22','10',$user['ProductName'],'1','0','C');
			$pdf->cell('22','10',$user['Category'],'1','0','C');
			$pdf->cell('22','10',$user['Quantity'],'1','0','C');
			$pdf->cell('22','10',$user['Price'],'1','0','C');
			$pdf->cell('22','10',$user['Discount'],'1','0','C');
			$pdf->cell('22','10',$user['ExpiredDate'],'1','0','C');
			$pdf->cell('22','10',$user['Description'],'1','0','C');
			$pdf->cell('22','10',$user['ApprovedType'],'1','1','C');
			
		}
	
		$pdf->Output();
	}

?>