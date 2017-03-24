<?php
ob_start();
session_start();
require './application.php';
$ob_app = new Application(); 
    $query_result=$ob_app->select_cart_product_by_session_id();
    require('./pdf/fpdf.php');
    date_default_timezone_set('Asia/Dhaka');
    $date = date('D M j G:i:s T Y');
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 5, $date);
    $pdf->Ln(10);
    $pdf->Cell(50, 5, 'Name', 1, 0, 'L', 0);
    $pdf->Cell(50, 5, 'Quantity', 1, 0, 'L', 0);
    $pdf->Cell(50, 5, 'Price', 1, 0, 'L', 0);
    $pdf->Ln(10);
    while ($result = mysqli_fetch_array($query_result)) {
        $pdf->Cell(50, 5, $result['product_name'], 1, 0, 'L', 0);
        $pdf->Cell(50, 5, $result['product_quantity'], 1, 0, 'L', 0);
        $pdf->Cell(50, 5, $result['product_price'], 1, 0, 'L', 0);
        $pdf->Ln(10);
    }
    $pdf->Ln(10);
    $pdf->Cell(50, 5, 'Sales Team');
    $pdf->Ln(10);
    $pdf->Output();
    $delete = $ob_app->delete_cart(); 

?>
<form action="" method="post">
    <textarea name="pdf_content"></textarea><br/> 

    <input type="submit" name="btn" value="Make PDF">
</form>