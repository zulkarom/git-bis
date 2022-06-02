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