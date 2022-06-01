<?php


namespace backend\modules\account\models\pdf;

use Yii;
use backend\modules\clients\models\pdf\MYPDF_canvas;



class pdf_invoice{
	public $inv;
	public $totalPayment;
	public $type = 'I';
	public function generatePdf(){
		$pdf = new MYPDF_canvas(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('HATCHNIAGA');
		$pdf->SetTitle('ALMUKHLISIN :: BIZ CANVAS');
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
		$invoice = $this->inv->id;
		$paid = $this->inv->status;
		//$subtotal = $this->inv->unit_charge * $this->inv->quantity;
		//''$discount = $this->inv->discount;

		//''$add = $this->inv->add_charge;
		$total ='' ;
		$pdf->setInvoice('MVI-' . $invoice . " " . $this->inv->charge_date . " " . $total);
		$pdf->AddPage("P");
		$hcolor = "#f0f0f0";
		$padding = 5;

		$html ='<table>
		<tr>
		<td width="380">
		<strong style="font-size:30px;" >INVOICE</strong>
		<br /><br />

		<table>
		<tr><td width="100"><b>Issued Date:</b></td>
		<td width="140">'. date('d F Y', strtotime($this->inv->charge_date)) .'</td></tr>
		<tr><td><b>Invoice No:</b></td><td>MIV-'.$invoice.'</td></tr>
		</table>
		<br /><br /><br />';
		if($paid == 30){
			$txt = "PAID";
			$kal = '#30b5ad';
			
		}else if($paid == 20){
			if(($this->totalPayment) < ($this->inv->amount)){
				$txt = "AMOUNT DUE";
				$kal = "#da534f";
			}else{
				$txt = "PAID";
				$kal = '#30b5ad';
			}
		}else{
			$txt = "AMOUNT DUE";
			$kal = "#da534f";
		}
		$amount_due = ($this->inv->amount) - $this->totalPayment;
		$amount_pay = $this->totalPayment;
		if($this->inv->status == 30){
			$params = $pdf->serializeTCPDFtagParameters(array($txt, $paid, $this->inv->amount));	
		}else{
			$params = $pdf->serializeTCPDFtagParameters(array($txt, $paid, $amount_due));	
		}
		
		$html .= '
		<tcpdf method="mybox" params="'.$params.'" />



        </td>
		<td width="230" align="right">';
		
		$setting = Setting::findOne(1);
		$html .= nl2br($setting->company_info);

		$html .= '


		</td>
		</tr>
		</table>';



		$html .='<table>
		<tr>
		<td>
		<br /><br />
		<table cellpadding="'.$padding.'">
		<tr>
		<td width="370" ><b><i>Bill To:</i></b></td>
		</tr>
		<tr>
		<td border="1">';
		$contact = json_decode($this->inv->client_contact);
		$html .= "<b>" . strtoupper($contact->cl_name)."</b><br />";
		$html .= strtoupper($contact->cl_address . " " . $contact->cl_postcode . " " . $contact->daerah_name . " " . $contact->negeri_name) . "<br />";
		$phone1 = $contact->cl_phone1 ? "" . $contact->cl_phone1 : "";
		$phone2 = $contact->cl_phone2 ? " / " . $contact->cl_phone2 : "";
		$html .=  $phone1.$phone2;
		$html .='</td>
		</tr>
		</table>



		</td>
		<td>


		</td>
		</tr>
		</table>';

		$tw = 620;
		$qty = 70;
		$rate = 100;
		$amt= 160;
		$desc = $tw - $qty - $rate - $amt;

		$html .= '<br /><br />
		<table border="1" cellpadding="'.$padding.'">
		<tr bgcolor="'.$hcolor.'">
		<td width="'.$desc.'"><b><i>Description</i></b></td>
		<td width="'.$qty.'" align="center"><b><i>Quantity</i></b></td>
		<td width="'.$rate.'" align="center"><b><i>Rate</i></b></td>
		<td width="'.$amt.'" align="center"><b><i>Amount (RM)</i></b></td>
		</tr>';

		// if($this->inv->unit_charge > 0){
		// $html .= '<tr>
		// <td>Yuran TAM Ke Rumah Bagi Bulan '.$this->inv->month .'/'.$this->inv->year .'<br />
		// (RM'. number_format($this->inv->unit_charge, 2).' x '.$this->inv->quantity .' Kelas)
		// <br />
		// </td>
		// <td align="center">RM';

		// $html .= number_format($subtotal, 2);
		// $html .= '</td>
		// </tr>';
		// }

		$items = $this->inv->invoiceItems;
		$subtotal = 0;
		if($items){
			$i = 1;
			$subtotal = 0;
			foreach($items as $item){

				if($item->product_id == 0){
					$product = $item->category->category_name;
				}else{
					$product = $item->product->product_name;
				}
				
				$str_desc = "";
				if($item->description){
					$desc_arr = explode("\n", $item->description);
					if($desc_arr){
						foreach($desc_arr as $d){
							$str_desc .= "<br /> - " . $d;
						}
					}
				}
				
				
				$amount = $item->quantity * $item->price;
				$subtotal += $amount;
				
				$html .= '<tr nobr="true"><td width="'.$desc.'">
				<b>'.$product.'</b>
				'.$str_desc .'
				</td>
				<td align="center" width="'.$qty.'">'.$item->quantity .'</td>
				
				<td align="center" width="'.$rate.'">'.$item->price .'</td>
				
				<td align="center" width="'.$amt.'">'.number_format($amount,2).'</td>
				</tr>
				
				';
			$i++;
			}
		}

		// $html .= '<tr>
		// 	<td width="'.$desc.'"></td>
		// 	<td width="'.$qty.'"></td>
		// 	<td width="'.$rate.'"><b>Sub Total</b></td>
		// 	<td width="'.$amt.'"><b>'.number_format($subtotal, 2).'</b></td>
		// </tr>';
		$total = $subtotal;

		// if($add  > 0){
		// 	$html .= '
		// 	<tr>
		// 	<td> '. $this->inv->add_charge_note .'
		// 	</td>
		// 	<td align="center">RM';
		// 	$html .= number_format($add , 2);
		// 	$html .= '</td>
		// 	</tr>';
		// }

		if($this->inv->discount > 0){
			$total = $total - $this->inv->discount;
			/* $html .= '<tr>
			<td width="'.$desc.'"></td>
			<td align="center" width="'.$qty.'"></td>
			<td align="center" width="'.$rate.'"><b>Discount</b></td>
			<td align="center" width="'.$amt.'">(RM'. number_format($this->inv->discount, 2).')</td>
			</tr>'; */
		}

		$html .= '

		</table>
		<br /><br />
		<table cellpadding="'.$padding.'">';
        
		if($this->inv->discount > 0){
		    $html .= '<tr>
    		<td align="right" width="460">Discount: </td>
    		<td align="center" border="1" width="160">(RM'. number_format($this->inv->discount , 2) .')</td>
    		</tr>';
		}
		

		$html .= '<tr>
		<td align="right" width="460">Invoice Amount: </td>
		<td align="center" width="160" border="1">RM'. number_format($total , 2). '</td>
		</tr>

		<tr>
		<td align="right" >Paid: </td>
		<td align="center" width="160" border="1">';
		if($paid == 30){
			$html .= '<b>RM'. number_format($total, 2) .'</b>';
			$due = 0;
		}else if($paid == 20){
			$totalPayment = $this->totalPayment;
			$html .= '<b>RM'. number_format($totalPayment, 2) .'</b>';
			$due = ($this->inv->amount) - $totalPayment;
		}
		else{
			$html .= '<i>-</i>';
			$due = $total;
		}
		
		$html .= '</td>
		</tr>

		<tr>
		<td align="right" ><b>Amount Due: </b></td>';

		if($due == 0){
			$html .='<td align="center" width="160" border="1"><b>-</b></td>';
		}else{
			$html .='<td align="center" width="160" border="1"><b>RM'. number_format($due, 2) .'</b></td>';
		}

		$html .='
		</tr>
		</table>';

		//-----------------------------------------
		//note pulak
		//-------------------------------------------
		//-------------------------------------------

		$html .='<br /><br /><br /><table>
		<tr>

		<td  width="300">
		<br /><br />
		<table cellpadding="'.$padding.'">
		<tr >
		<td width="300"><b><i>Note:</i></b></td>
		</tr>

		<tr>
		<td height="180">
		<br />
		'.nl2br($this->inv->add_charge_note).'

		</td>
		</tr>

		</table>


		</td>
		<td width="50"></td>
		<td>
		<br /><br />
		<b><i>Issued By:</i></b>
		<br />
		';
		
		if($this->inv->staff){
		    $html .= $this->inv->staff->staff_name;
		}else{
		    $html .= 'Administration';
		}
		
		
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

	//echo $html; 
	//echo "<pre>";print_r($this->inv);echo "</pre>";
	if($this->type == 'I'){
		$pdf->Output('INVOICE-MVI-' . $invoice . '-' . $this->inv->charge_date . '-RM' . $total .".pdf", 'I');
	}else if($this->type == 'F'){
		$path = Yii::getAlias('@upload/email/');
		$pdf->Output($path.'INVOICE.pdf', 'F');
	}
	
	}
}
?>