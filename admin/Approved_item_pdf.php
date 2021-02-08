<?php
require_once 'FPDF/fpdf.php';
require_once 'include\db.php';

$query ="SELECT*FROM approved_item";
$pdf_query = mysqli_query($con,$query);

if(isset($_POST['btn_pdf'])){

	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell('40','10','produt ID','1','0','C');
	$pdf->Cell('45','10','category ID','1','0','C');
	$pdf->Cell('42','10','product name','1','0','C');
	$pdf->Cell('40','10','market price','1','1','C');
	
	
	$pdf->SetFont('Arial','',14);
	
	while($row = mysqli_fetch_assoc($pdf_query)){
	$pdf->Cell('40','10',$row['produt_ID'],'1','0','C');
	$pdf->Cell('45','10',$row['category_ID'],'1','0','C');
	$pdf->Cell('42','10',$row['product_name'],'1','0','C');
	$pdf->Cell('40','10',$row['market_price'],'1','1','C');
	}

	$pdf->Output();
}

?>