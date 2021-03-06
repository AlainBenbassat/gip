<?php
/*call the FPDF library*/
require 'pdf/rotation.php';
class PDF extends PDF_Rotate
{
	function Header()
	{
		/* Put the watermark */
		$this->SetFont('Arial','B',50);
		$this->SetTextColor(255,192,203);
		//$this->RotatedText(35,190,'Students Tutorial Invoice',45);
	}

}
class Invoice  {
    function makeInvoice($cart, $name) {
        $pdf = new PDF('P','mm','A4');
        $pdf->AddPage();
        /*output the result*/
        $pdf->SetFont('Arial','B',20);
        $pdf->Cell(71 ,10,'',0,0);
        $pdf->Cell(59 ,5,'Invoice',0,0);
        $pdf->Cell(59 ,10,'',0,1);

        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(71 ,5,'Benbassat: Koekenshop',0,0);
        $pdf->Cell(59 ,5,'',0,0);
        $pdf->Cell(59 ,5,'Details',0,1);
        /*set font to arial, regular, 12pt*/
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(130 ,5,'Monseigneur Cardijnlaan 1',0,0);
        $pdf->Cell(25 ,5,'Customer ID:',0,0);
        if ($cart->user_id) {
            $pdf->Cell(34 ,5,$cart->user_id,0,1);/*end of line*/
        } else {
            $pdf->Cell(34 ,5,'/',0,1);/*end of line*/
        }
        $pdf->Cell(130 ,5,'2650 Edegem',0,0);
        $pdf->Cell(25 ,5,'Invoice Date:',0,0);
        $pdf->Cell(34 ,5,date("j F, Y"),0,1);
        $pdf->Cell(130 ,5,'',0,0);
        $pdf->Cell(25 ,5,'Invoice No:',0,0);
        $pdf->Cell(34 ,5,'ORD'. $cart->id,0,1);
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(130 ,5,'Bill To ' . $name,0,0);
        $pdf->Cell(59 ,5,'',0,0);
        $pdf->SetFont('Arial','B',10);
        /*make a dummy empty cell as a vertical spacer*/
        $pdf->Cell(189 ,10,'',0,1);
        /*make a dummy empty cell as a vertical spacer*/
        $pdf->Cell(50 ,10,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(10 ,6,'ID',1,0,'C');
        $pdf->Cell(80 ,6,'Description',1,0,'C');
        $pdf->Cell(23 ,6,'Quantity',1,0,'C');
        $pdf->Cell(30 ,6,'Unit Price',1,0,'C');
        $pdf->Cell(45 ,6,'Subtotal',1,1,'C');
        /*Heading Of the table end*/
        $pdf->SetFont('Arial','',10);
            for ($i = 0; $i < count($cart->lines); $i++) {
                $subtotal = number_format((float)$cart->lines[$i]->linePrice, 2, '.', '');
                $pdf->Cell(10 ,6,$i + 1,1,0);
                $pdf->Cell(80 ,6,$cart->lines[$i]->product->name,1,0);
                $pdf->Cell(23 ,6,$cart->lines[$i]->quantity,1,0,'R');
                $pdf->Cell(30 ,6,$cart->lines[$i]->product->price,1,0,'R');
                $pdf->Cell(45 ,6,$subtotal,1,1,'R');
            }
                
        $total = number_format((float)$cart->totalPrice, 2, '.', '');
        $pdf->Cell(118 ,6,'',0,0);
        $pdf->Cell(25 ,6,'Total:',0,0);
        $pdf->Cell(45 ,6,$total,1,1,'R');

        return $pdf->Output('invoice.pdf', 'F');
    }

}	
