<?php

require_once 'FPDF/fpdf.php';
require_once 'payment_dbConnect.php';

$query ="SELECT * FROM customer_payment";
$result = mysqli_query($db,$query);

if(isset($_POST["pdf_btn"]))
{
	$pdf = new FPDF('p','mm','a4');
	$pdf-> SetFont('arial','b','8');
	$pdf-> AddPage();
	$pdf-> cell('18','8','Receipt No','1','0','C');
	$pdf-> cell('20','8','Customer No','1','0','C');
	$pdf-> cell('20','8','Process','1','0','C');
	$pdf-> cell('28','8','Date','1','0','C');
	$pdf-> cell('26','8','Method','1','0','C');
	$pdf-> cell('20','8','Address','1','0','C');
	$pdf-> cell('44','8','Email','1','0','C');
	$pdf-> cell('20','8','Phone number','1','1','C');

	while ($row = mysqli_fetch_assoc($result)) 
	{
		$pdf-> cell('18','8',$row['Receipt_ID'],'1','0','C');
		$pdf-> cell('20','8',$row['Customer_ID'],'1','0','C');
		$pdf-> cell('20','8',$row['Process'],'1','0','C');
		$pdf-> cell('28','8',$row['Date'],'1','0','C');
		$pdf-> cell('26','8',$row['Payment_Method'],'1','0','C');
		$pdf-> cell('20','8',$row['Address'],'1','0','C');
		$pdf-> cell('44','8',$row['Email'],'1','0','C');
		$pdf-> cell('20','8',$row['Phone_Number'],'1','1','C');
	}

	$pdf-> Output();
}