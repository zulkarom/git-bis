<?php


namespace frontend\modules\client\models\pdf;

use Yii;
use frontend\modules\client\models\pdf\MYPDF_canvas;



class pdf_canvas{
	public $model;
	public $type = 'I';
	public function generatePdf(){
		$pdf = new MYPDF_canvas(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('HATCHNIAGA');
		$pdf->SetTitle('HATCHNIAGA :: BIZ CANVAS');
		$pdf->SetSubject('BIZ CANVAS');
		$pdf->SetKeywords('');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		//$pdf->writeHTML("<strong>hai</strong>", true, 0, true, true);
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
		//$pdf->SetMargins(0, 0, 0);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		//$pdf->SetHeaderMargin(0);

		 //$pdf->SetHeaderMargin(0, 0, 0);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, 30); //margin bottom

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------
		
$html .= '<br />
		Fiqel International Sdn Bhd <br />
		admin@almukhlisin.my

		<br /><br /><br /><br />
		<i>“Sebaik-baik kalian adalah yang mempelajari Al-Qur`an dan mengajarkannya. [Al-Bukhari 5027]</i>

		</td>

		</tr>
		</table>


		';


$tbl = <<<EOD
$html
EOD;

	$pdf->SetFont('times', '', 11);
	$pdf->writeHTML($tbl, true, false, false, false, '');

	$pdf->Output('INVOICE-MVI-' . $invoice . '-' . $this->inv->charge_date . '-RM' . $total .".pdf", 'I');
	
	}
}
?>