<?php session_start(); ?>
<?php
require_once 'fpdf/fpdf.php';

require_once ('inc/connection.php');

if (!isset($_SESSION['supplier_id'])) {
		header('Location: pdf_download.php');
}
$user_id = $_SESSION['supplier_id'];

    
    	  $query = "SELECT * FROM `supplierproduct` WHERE user_id=$user_id";
          $query_run = mysqli_query($connection, $query);

 
class myPDF extends FPDF{
    function header(){
        $this->Image('logo.jpg',115,15, -300);
        $this->SetFont('arial', 'b', 20);
        $this->cell(276,5,'Your All Supplier Request Details',0,0,'C');
        $this->Ln();
        $this->SetFont('Times', 'b', 15);
        $this->cell(276,10,'Sunshine(PVT) LTD',0,0,'C');
        $this->Ln(60);
    }
}



if(isset($_POST['btn_pdf_download']))
{
	$pdf = new myPDF();
    $pdf->AliasNbPages();
	$pdf->SetFont('arial', 'b', '10');
	$pdf->AddPage('l', 'a4', 0);
	$pdf->cell('30', '10', 'RequestID', '1', '0', 'C');
    $pdf->cell('30', '10', 'ProductName', '1', '0', 'C');
    $pdf->cell('30', '10', 'Category', '1', '0', 'C');
    $pdf->cell('30', '10', 'Address', '1', '0', 'C');
    $pdf->cell('20', '10', 'Quantity', '1', '0', 'C');
    $pdf->cell('20', '10', 'Price', '1', '0', 'C');
    $pdf->cell('20', '10', 'Discount', '1', '0', 'C');
    $pdf->cell('30', '10', 'ExpiredDate', '1', '0', 'C');
    $pdf->cell('40', '10', 'Description', '1', '0', 'C');
    $pdf->cell('30', '10', 'ApprovedType', '1', '1', 'C');

    
	while($row = mysqli_fetch_assoc($query_run))
	{
		$pdf->cell('30', '10', $row['RequestID'], '1', '0', 'C');
        $pdf->cell('30', '10', $row['ProductName'], '1', '0', 'C');
        $pdf->cell('30', '10', $row['Category'], '1', '0', 'C');
        $pdf->cell('30', '10', $row['Address'], '1', '0', 'C');
        $pdf->cell('20', '10', $row['Quantity'], '1', '0', 'C');
        $pdf->cell('20', '10', $row['Price'], '1', '0', 'C');
        $pdf->cell('20', '10', $row['Discount'], '1', '0', 'C');
        $pdf->cell('30', '10', $row['ExpiredDate'], '1', '0', 'C');
        $pdf->cell('40', '10', $row['Description'], '1', '0', 'C');
        $pdf->cell('30', '10', $row['ApprovedType'], '1', '1', 'C');

	}

	$pdf->Output();
}

?>