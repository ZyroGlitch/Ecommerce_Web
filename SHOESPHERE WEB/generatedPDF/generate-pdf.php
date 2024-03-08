<?php
require_once("fpdf.php");

$pdf = new FPDF('P', 'mm', "A4");

$pdf->AddPage();

// Title of the Page
$pdf->SetFont('Arial', 'B', 30);
$pdf->Cell(71, 10, ' ', 0, 0);
$pdf->Cell(59, 5, 'Invoice', 0, 0);
$pdf->Cell(59, 10, ' ', 0, 1);

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(71, 15, 'WET', 0, 0);
$pdf->Cell(59, 15, ' ', 0, 0);
$pdf->Cell(59, 15, 'Details', 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(130, 5, 'Near DAV', 0, 0);
$pdf->Cell(25, 5, 'Customer ID:', 0, 0);
$pdf->Cell(34, 5, '0012', 0, 1);

$latestDate = date('Y - m - d'); //Php Date
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(130, 5, 'City, 751001', 0, 0);
$pdf->Cell(25, 5, 'Invoice Date:', 0, 0);
$pdf->Cell(34, 5, $latestDate, 0, 1);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(130, 5, 'Date:', 0, 0);
$pdf->Cell(25, 5, 'Invoice No:', 0, 0);
$pdf->Cell(34, 5, 'ORD001', 0, 1);

$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(130, 5, 'BILL TO', 0, 0);
$pdf->Cell(59, 5, '', 0, 0);

$pdf->Cell(50, 10, '', 0, 1);

// Heading of the table
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, 'S1', 1, 0, 'C');
$pdf->Cell(80, 6, 'Description', 1, 0, 'C');
$pdf->Cell(23, 6, 'Qty', 1, 0, 'C');
$pdf->Cell(30, 6, 'Unit Price', 1, 0, 'C');
$pdf->Cell(20, 6, 'Sales Tax', 1, 0, 'C');
$pdf->Cell(25, 6, 'Total', 1, 1, 'C'); //end of the line
// End of the Heading Table

// Content Data of table
$pdf->SetFont('Arial', '', 10);
for ($i = 1; $i <= 10; $i++) {
    $pdf->Cell(10, 6, $i, 1, 0, 'C');
    $pdf->Cell(80, 6, 'HP Laptop', 1, 0, 'C');
    $pdf->Cell(23, 6, '1', 1, 0, 'C');
    $pdf->Cell(30, 6, 'P 15000.00', 1, 0, 'C');
    $pdf->Cell(20, 6, 'P 100.00', 1, 0, 'C');
    $pdf->Cell(25, 6, 'P 15100.00', 1, 1, 'C');
}

// Make sure there is no output before calling Output
ob_end_clean();  // Clear any output that may have already been generated
$pdf->Output();
