<?php
require "fpdf.php";
$db = new PDO('mysql:host=localhost; dbname=supermarket','root','');

	class myPDF extends FPDF{
		function header(){
			$this->Image('',10,6);
			$this->SetFont('Arial','B',14);
			$this->Cell(276,5,'share Holder Document',0,0,'C');
			$this->Ln();
			$this->setFont('Times','',12);
			$this->cell(276,10,'Share holder Information', 0,0,'C');
			$this->Ln(20);
			
		}
		function footer(){
			$this->setY(-15);
			$this->SetFont('Arial','',8);
			$this->Cell(o,10,'page'.$this->PageNo().'/{nb}',0,0,'C');
		}
		function headerTable(){
			$this->setFont('Times','B',12);
			$this->Cell(20,10,'ID',1,0,'C');
			$this->Cell(20,10,'Username',1,0,'C');
			$this->Cell(20,10,'Password',1,0,'C');
			$this->Cell(20,10,'Email',1,0,'C');
			$this->Cell(20,10,'Full_Name',1,0,'C');
			$this->Cell(20,10,'Share_Percentage',1,0,'C');
			$this->Cell(20,10,'Date_Of_Birth',1,0,'C');
			$this->Cell(20,10,'Address',1,0,'C');
			$this->Cell(20,10,'NIC',1,0,'C');
			
		}
		function viewTable($db){
			
			$this->SetFont('Times','',12);
			$stmt = $db->query('select * from shareholder');
			while($data =$stmt->fetch(PDO::FETCH_OBJ)){
				
				$this->Cell(20,10,$data->ID,1,0,'C');
				$this->Cell(20,10,$data->Username,1,0,'L');
				$this->Cell(20,10,$data->Password,1,0,'L');
				$this->Cell(20,10,$data->Email,1,0,'L');
				$this->Cell(20,10,$data->Full_Name,1,0,'L');
				$this->Cell(20,10,$data->Share_Percentage,1,0,'L');
				$this->Cell(20,10,$data->Date_Of_Birth,1,0,'L');
				$this->Cell(20,10,$data->Address,1,0,'L');
				$this->Cell(20,10,$data->NIC,1,0,'L');
				$this->Ln();
			}
		}
	}
		$pdf = new myPDF();
		$pdf->AliasNbPages();
		$pdf->AddPage('L','A4',0);
		$pdf->headerTable();
		$padf->viewTable($db);
		
		$pdf_.Output();
			
		
		
		
		
	
		
