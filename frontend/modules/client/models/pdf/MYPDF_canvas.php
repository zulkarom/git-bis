<?php

namespace backend\models\BizCanvas;

use Yii;


class MYPDF_canvas extends \TCPDF {

   //Page header
	/*var $invoice;
	
	public function setInvoice($id) {
        $this->invoice = $id;
    }*/
	
    public function Header() {

    }
	
	public function mybox($text, $paid, $amount) {
		$this->SetFont('times', 'B', 11);
		$this->setCellPaddings(2, 2, 2, 2);
		
		if($paid == 1){
			$this->SetFillColor(48,181,73);
			$arr = array(48,181,73);
		}else{
			$this->SetFillColor(218,83,79);
			$arr = array(218,83,79);
		}
        $this->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $arr));
		
		
		$this->SetTextColor(255,255,255);
		
		$this->MultiCell(60, 4, $text, 1, 'C', 1, 1);
		$this->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $arr));
		$this->SetFillColor(255,255,255);
		$this->SetTextColor(000,000,000);
		$this->SetFont('times', 'B', 13);
		$this->MultiCell(60, 4, "RM". number_format($amount, 2), 1, 'C', 1, 1);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-20);
		$this->SetFont('times', '', 10);
		$time = date("l jS \of F Y h:i:s a");
		$stamp = 'Printed on '.$time.' Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages();
		 $html = '<div align="center">“This is a computer generated printout and no signature is required.”</div>' . '<div style="font-size:9px" align="center">'.$stamp.'</div>';
		$this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = false, $align = 'C', $autopadding = true);
        // Set font
		

    }
}
?>