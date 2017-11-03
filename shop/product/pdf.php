<?php
require('fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'vanderwiel');
$pdf->Cell(80,20,'$totaal');
$pdf->Output();
?>