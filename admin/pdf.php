<?php
require_once("config.php");
//

require('FPDF/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage('L','A4');

// code for print Heading of tables
$pdf->SetFont('Arial','B',8);	

$header=array('feedbackId'=>'Feedback_ID', 'customerId'=> 'Customer_ID', 'customerEmail'=> 'Email','rating1'=> 'Rate1','r2'=> 'Rate2','r3'=> 'Rate3','r4'=> 'Rate4','r5'=> 'Rate5','comment'=> 'Comments');
foreach($header as $heading) {
$pdf->Cell(30,5,$heading,1);
}
$sql = "SELECT * from ratings ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{

foreach($results as $row) {
	$pdf->SetFont('Arial','',8);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(30,8,$column,1);
} }
$pdf->Output();
?>