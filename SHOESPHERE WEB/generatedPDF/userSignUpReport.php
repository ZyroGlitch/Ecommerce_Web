<?php
require_once("fpdf.php");
include("../php_operations/dbConnection.php");
// $user_id = $_GET['user_id'];
// $name = $_GET['name'];

$pdf = new FPDF('P', 'mm', "A4");

$pdf->AddPage();

// Border Line
$pdf->Cell(190, 2, "", 'B', 1, 'C');
$pdf->Cell(65, 5, "", 0, 0);
$pdf->Cell(65, 10, "", 0, 1);

// Title of the Page
$pdf->SetFont('Arial', 'B', 26);
$pdf->Cell(76, 10, "User Signup Report", 0, 0);
$pdf->Cell(65, 10, "", 0, 0);
$pdf->Cell(65, 10, "", 0, 1);

// Generate a random number between 1 and 10
$numbers = "";

for ($i = 0; $i < 2; $i++) {
    $randomNumberInRange = rand(0, 9);
    $numbers .= strval($randomNumberInRange);
}

// Generate a random ASCII code between 65 (A) and 90 (Z)
$letters = "";
for ($i = 0; $i < 3; $i++) {
    $randomAsciiCode = rand(65, 90);

    // Convert ASCII code to character
    $randomCharacter = chr($randomAsciiCode);

    $letters .= $randomCharacter;
}

$pdf->SetFont('Arial', '', 15);
$pdf->Cell(50, 20, "Receipt No. #" . $numbers . $letters, 0, 0);
$pdf->Cell(65, 20, "", 0, 1);

$latestDate = date('m / d / Y'); //Php Date
$pdf->SetFont('Arial', '', 15);
$pdf->Cell(50, 0, "Date: " . $latestDate, 0, 0);
$pdf->Cell(65, 0, "", 0, 0);
$pdf->Cell(55, 0, "", 0, 1);

// Add a space between the date and the table heading
$pdf->Ln(20);  // Adjust the value as needed

// Heading of the table
// Set light gray background color
$pdf->SetFillColor(224, 224, 224); // RGB values for light gray
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, 'ID #', 1, 0, 'C', true);
$pdf->Cell(40, 6, 'Name', 1, 0, 'L', true);
$pdf->Cell(40, 6, 'Username', 1, 0, 'C', true);
$pdf->Cell(60, 6, 'Email', 1, 0, 'C', true);
$pdf->Cell(40, 6, 'Password', 1, 1, 'C', true); //end of the line

$total = 0;

$sql = "SELECT id,name,username,email,password FROM usertbl";
$query = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    // Content Data of table
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(10, 6, $row['id'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['name'], 1, 0, 'L');
    $pdf->Cell(40, 6, $row['username'], 1, 0, 'C');
    $pdf->Cell(60, 6, $row['email'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['password'], 1, 1, 'C');

    $total++;
}

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(60, 20, "Total Users: " . $total, 0, 1, 'L');
$pdf->Cell(50, 20, "", 0, 0);
$pdf->Cell(65, 20, "", 0, 0);



// Diplaying the output
$pdf->Output();
