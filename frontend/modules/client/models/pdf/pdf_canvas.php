<?php


namespace frontend\modules\client\models\pdf;

use Yii;
use frontend\modules\client\models\pdf\MYPDF_canvas;
use yii\helpers\Html;
use yii\helpers\Url;

class pdf_canvas{
	public $model;
	public $type = 'I';
	public $web;
  public $dirAssests;
	public function generatePdf(){
		$pdf = new MYPDF_canvas(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::$app->params['appName']);
		$pdf->SetTitle(Yii::$app->params['appName'].' :: BIZ CANVAS');
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

		$tagvs = array(
		    'span' => array(0 => array('h' => 1, 'n' => 2), 1 => array('h' => 1, 'n' => 2))
		);
		$pdf->setHtmlVSpace($tagvs);



		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}
		$pdf->AddPage("L");
		// ---------------------------------------------------------
    //style
		//$html = '<style>'.file_get_contents($this->web.'/assets/canvas/css/canvas.css').'</style>';


    $html = '<div align="center"><img src="'.$this->dirAssests.'/logo/logo-top'.Yii::$app->params['extension'].'.png" width="170" /><br />
    <span style="font-size:18px"><b>' . $this->model->user->client->biz_name .'</b></span></div><br />';


		$html .= '<table cellpadding="6" cellspacing="0" border="2">
      

  
        <!-- Upper part -->
        <tr>
          <td colspan="2" rowspan="2">
            
            <div class="titlebc">   Key Partners</div>
            <br />
            ';

              if($this->model->itemsByCategory(1)){
                  foreach($this->model->itemsByCategory(1) as $partner){
                    $html .= $this->stickynote($partner, $this->model->id);
                    
 
                }
              }
              $html .= '
            
            <br />
            
          </td>
          <td colspan="2">

              <div class="titlebc">  Key Activities</div>

            <br />';
              if($this->model->itemsByCategory(2)){
                  foreach($this->model->itemsByCategory(2) as $activity){
                    $html .= $this->stickynote($activity, $this->model->id);
 
                }
              }
              $html .= '
           
            
          </td>
          <td colspan="2" rowspan="2">

              <div class="titlebc">  Value Proposition</div>
 
            <br />';
              if($this->model->itemsByCategory(3)){
                  foreach($this->model->itemsByCategory(3) as $proposition){
                    $html .= $this->stickynote($proposition, $this->model->id);
                    
                }
              }
              $html .= '
            
            
          </td>
          <td colspan="2">

              <div class="titlebc">  Customer Relationship</div>

            <br />';
              if($this->model->itemsByCategory(4)){
                  foreach($this->model->itemsByCategory(4) as $relationship){
                    $html .= $this->stickynote($relationship, $this->model->id);
                    
  
                }
              }
              $html .= '
           
            
          </td>
          <td colspan="2" rowspan="2">

              <div class="titlebc">  Customers Segments</div>
    
            <br />';
              if($this->model->itemsByCategory(5)){
                  foreach($this->model->itemsByCategory(5) as $segment){
                    
                    $html .= $this->stickynote($segment, $this->model->id);

                }
              }
              $html .= '
            
            
          </td>
        </tr>

        <!-- Lower part -->
        <tr>
          <td colspan="2">
            
              <div class="titlebc">  Key Resources</div>
            
            <br />';
              if($this->model->itemsByCategory(6)){
                  foreach($this->model->itemsByCategory(6) as $resource){
                    
                    $html .= $this->stickynote($resource,  $this->model->id);
                    
     
                }
              }
              $html .= '
            
            
          </td>
          <td colspan="2">
            
              <div class="titlebc">  Channels</div>
            
            <br />';
              if($this->model->itemsByCategory(7)){
                  foreach($this->model->itemsByCategory(7) as $channel){
                    
                    $html .= $this->stickynote($channel, $this->model->id);
                    
                }
              }
              $html .= '
            
           
          </td>
        </tr>
        <tr>
          <td colspan="5">
            
              <div class="titlebc">  Cost Structure </div>
           
            <br />';
              if($this->model->itemsByCategory(8)){
                  foreach($this->model->itemsByCategory(8) as $structure){
                    
                    $html .= $this->stickynote($structure,  $this->model->id, 6);
                    
                }
              }
              $html .= '
            
            
          </td>
          <td colspan="5">
            
              <div class="titlebc">  Revenue Streams </div>
           
            <br />';
              if($this->model->itemsByCategory(9)){
                  foreach($this->model->itemsByCategory(9) as $revenue){
                    $html .= $this->stickynote($revenue,  $this->model->id, 6);
                }
              }
              $html .= '
            
            
          </td>
        </tr>
      </table>
    
  
		';

$pdf->SetFont('times', '', 11);
$tbl = <<<EOD
$html
EOD;

	
	$pdf->writeHTML($tbl, true, false, false, false, '');

	$pdf->Output("CANVAS.pdf", 'I');
	
	}

	private function stickynote($element, $pid, $col = 12){
	    $item = $element->category->category_key;
      if($element->color == 'red'){
        $bgcolor = '#fca18e';
      }else if($element->color == 'yellow'){
        $bgcolor = '#fef993';
      }else if($element->color == 'green'){
        $bgcolor = '#d1eb9c';
      }else if($element->color == 'blue'){
        $bgcolor = '#bad9f9';
      }else if($element->color == 'grey'){
        $bgcolor = '#c0c0c0';
      }

      $html = '<table border="0" cellpadding="1">';
                if($element->title){
                  $html .='<tr>
                    <td bgcolor="'.$bgcolor.'" style="font-size:12px; color:#000000;border-bottom:1px solid #CCCCCC">'.Html::encode($element->title).'
                    </td>
                  </tr>';
                }
                $html .= '<tr>
                  <td bgcolor="'.$bgcolor.'" style="font-size:11px; color:#000000;">
                    '.nl2br($element->description).'
                  </td>
                </tr>
                <tr style="line-height:4px"><td></td></tr>
                </table>';

	    return $html;
	}
}
?>