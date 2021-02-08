<?php

	//Genarate a pdf file
	require_once 'FPDF/fpdf.php';
	$db = mysqli_connect('localhost','root','','supermarket');
	$results = mysqli_query($db,"SELECT * FROM discounts");	
	
	
	if (isset($_POST['pdf'])) {
	
		$pdf = new fpdf('p','mm','a4');
		$pdf->AliasNbPages();
		$pdf->SetFont('arial','b','14');
		$pdf->AddPage();
		$pdf->cell('60','10','Bit Point Range','1','0','C');
		$pdf->cell('130','10','Gift pack','1','1','C');
		
		$pdf->SetFont('arial','','12');
		
		while($row = mysqli_fetch_assoc($results))
		{
			$pdf->cell('60','10',$row['bit_range'],'1','0','C');
			$pdf->cell('130','10',$row['offer'],'1','1','C');
		}
		
		$pdf->output();
	}		
	
	session_start();
	
	//initialize variables
	$bitRange = "";
	$offer = "";
	$id = 0;
	$edit_state = true;
	
	//connect database
	$db = mysqli_connect('localhost','root','','supermarket');
	

	
	//update records
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$bitRange = $_POST['bit_range'];
		$offer = $_POST['offer'];
	
		
		mysqli_query($db, "UPDATE discounts SET bit_range='$bitRange' , offer='$offer' WHERE id=$id");
		$_SESSION['msg'] = "Data Updated";
		header('location: index.php');
	}
	
						
	//retrieve records
	$results = mysqli_query($db,"SELECT * FROM discounts");					
						


?>