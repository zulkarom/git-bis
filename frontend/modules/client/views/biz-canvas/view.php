<?php

use yii\helpers\Html;
use backend\assets\CanvasAsset;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

CanvasAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\client\models\BizCanvasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
hr {
bottom-top:0px;
bottom-bottom:0px;
width:80%;
}

.dropdown {
  position: relative;
  /*display: inline-block;*/
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  /*min-width: 300px;*/
  box-shadow: 0 10px 20px rgb(0 0 0 / 19%), 0 6px 6px rgb(0 0 0 / 23%);
  cursor: pointer;
  padding: 6px 2px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: flex;
}

a {
   margin:0 auto;    
   display:block;
}
#bizcanvas th{
border-left:#ffffff;
border-right:#ffffff;
}



input[type=radio] {
  display: none;
}
input[type=radio]:checked + label span {
  transform: scale(1.25);
}
input[type=radio]:checked + label .red {
  border: 2px solid #711313;
}

input[type=radio]:checked + label .yellow {
  border: 2px solid #816102;
}
input[type=radio]:checked + label .grey {
  border: 2px solid #505a0b;
}
input[type=radio]:checked + label .green {
  border: 2px solid #0e4e1d;
}
input[type=radio]:checked + label .blue {
  border: 2px solid #103f62;
}

label {
  display: inline-block;
  width: 20px;
  height: 20px;
  margin-right: 10px;
  cursor: pointer;
  
}
label:hover span {
  transform: scale(1.25);
}
label span {
  display: block;
  width: 100%;
  height: 100%;
  transition: transform 0.2s ease-in-out;
  border: 1px solid #c0c0c0;
}
label span.red {
  background: #fca18e;
}

label span.yellow {
  background: #fef993;
}
label span.grey {
  background: #c0c0c0;
}
label span.green {
  background: #d1eb9c;
}

label span.blue {
  background: #bad9f9;
}

.titlebc{
font-weight:bold;
margin-bottom:6px;
}

</style>





<div class="white_card card_height_100 mb_30" style="overflow-x: scroll;">
  <div class="white_card_header">
    
    
      <!-- <h1>The Business Model Canvas</h1> -->
      <!-- Canvas -->
      <table id="bizcanvas" cellspacing="0" border="1">
      <tr>
      <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
      
      </tr>

  
        <!-- Upper part -->
        <tr>
          <td colspan="2" rowspan="2">
            
            <div class ="row">
              <div class ="col-md-10"><div class="titlebc">Key Partners</div></div> 
              <div class ="col-md-2">
                <?php 
                echo '<a class="bc-add-item" data-title="Add Key Partners" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-parner/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                    ?>
              </div>
            </div>
            
            <p>
            <div class ="row">
              <?php if($partners){
                foreach($partners as $partner){
                    echo stickynote($partner, $model->id);
                    
 
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="2">

              <div class ="row">
              <div class ="col-md-10"><div class="titlebc">Key Activities</div></div> 
              <div class ="col-md-2">
                <?php
                echo '<a class="bc-add-item" data-title="Add Key Activities" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-activity/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                    ?>
              </div>
              </div>

            <p>
            <div class ="row">
              <?php if($activities){
                foreach($activities as $activity){
                    echo stickynote($activity, $model->id);
 
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="2" rowspan="2">

              <div class ="row">
              <div class ="col-md-10"><div class="titlebc">Value Proposition</div> </div>
              <div class ="col-md-2">
                <?php 
                  echo '<a class="bc-add-item" data-title="Add Value Proposition" href="javascript:void(0)" value="' . Url::to(['/client/bc-val-proposition/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
            </div>
 
            <p>
             <div class ="row">
              <?php if($propositions){
                foreach($propositions as $proposition){
                    echo stickynote($proposition, $model->id);
                    
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="2">

              <div class ="row">
              <div class ="col-md-10"><div class="titlebc">Customer Relationship</div> </div>
              <div class ="col-md-2">
                <?php 
                  echo '<a class="bc-add-item" data-title="Add Customer Relationship" value="' . Url::to(['/client/bc-cust-relation/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
              </div>

            <p>
            <div class ="row">
              <?php if($relationships){
                foreach($relationships as $relationship){
                    echo stickynote($relationship, $model->id);
                    
  
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="2" rowspan="2">

              <div class ="row">
              <div class ="col-md-10"><div class="titlebc">Customers Segments</div> </div>
              <div class ="col-md-2">
                <?php 
                  echo '<a class="bc-add-item" data-title="Add Customers Segments" href="javascript:void(0)" value="' . Url::to(['/client/bc-cust-segment/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
              </div>
    
            <p>
            <div class ="row">
              <?php if($segments){
                foreach($segments as $segment){
                    
                    echo stickynote($segment, $model->id);

                }
              }?>
              </div>
            </p>
          </td>
        </tr>

        <!-- Lower part -->
        <tr>
          <td colspan="2">
            
              <div class ="row">
              <div class ="col-md-10"><div class="titlebc">Key Resources</div></div> 
              <div class ="col-md-2">
                <?php 
                  echo '<a class="bc-add-item" data-title="Add Key Resources" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-resource/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
              </div>
            
            <p>
            <div class ="row">
              <?php if($resources){
                foreach($resources as $resource){
                    
                    echo stickynote($resource,  $model->id);
                    
     
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="2">
            
              <div class ="row">
              <div class ="col-md-10"><div class="titlebc">Channels</div></div> 
              <div class ="col-md-2">
                <?php 
                  echo '<a class="bc-add-item" data-title="Add Channels" href="javascript:void(0)" value="' . Url::to(['/client/bc-channel/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
              </div>
            
            <p>
             <div class ="row">
              <?php if($channels){
                foreach($channels as $channel){
                    
                    echo stickynote($channel, $model->id);
                    
                }
              }?>
              </div>
            </p>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            
              <div class ="row">
              <div class ="col-md-11"><div class="titlebc">Cost Structure </div></div> 
              <div class ="col-md-1">
                <?php 
                  echo '<a class="bc-add-item" data-title="Add Cost Structure" href="javascript:void(0)" value="' . Url::to(['/client/bc-cost-structure/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                ?>
              </div>
              </div>
           
            <p>
            <div class ="row">
              <?php if($structures){
                foreach($structures as $structure){
                    
                    echo stickynote($structure,  $model->id, 6);
                    
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="5">
            
              <div class ="row">
              <div class ="col-md-11"><div class="titlebc">Revenue Streams </div></div> 
              <div class ="col-md-1">
                <?php 
                  echo '<a class="bc-add-item" data-title="Add Revenue Streams" href="javascript:void(0)" value="' . Url::to(['/client/bc-rev-stream/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
              </div>
           
            <p>
            <div class="row">
              <?php if($revenues){
                foreach($revenues as $revenue){
                    echo stickynote($revenue,  $model->id, 6);
                }
              }?>
              </div>
            </p>
          </td>
        </tr>
      </table>
    
    <hr>
    
      <table id="bizcanvas" cellspacing="0" border="3">
        <tr>
          <td colspan="10">
            
              <div class ="row">
              <div class ="col-md-11"><div class="titlebc">Brainstorming Space</div></div> 
              <div class ="col-md-1" align="right">
                <?php 
                  echo '<a class="bc-add-item" data-title="Add Brainstorming Space" href="javascript:void(0)" value="' . Url::to(['/client/bc-brainstorm/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                ?>
              </div>
              </div>
            
            <p>
            <div class="row">
            	
            
              <?php if($spaces){
                foreach($spaces as $space){
                    echo stickynote($space,  $model->id, 3);
                 
                }
              }?>
              
              
              </div>
            </p>
          </td>
        </tr>
      </table>
      <!-- /Canvas -->
    

    </div>
  </div>

<?php

function stickynote($element, $pid, $col = 12){
    $item = $element->bc_key;
    $html = '<div class="col-md-'.$col.'"><div class="dropdown" style="margin-bottom:7px">
                  <div class = "note '.$element->color.'">';
    if($element->title){
        $html .= '<p style="font-size:12px; color:#000000;border-bottom:1px solid rgba(0, 0, 0, 0.07);">'.Html::encode($element->title).'</p>';
    }
 
$html .= '<p style="font-size:11px; color:#000000;">'. nl2br(Html::encode($element->description)).'</p>

</div>
        <div class="dropdown-content">
        <a class="bc-update-item" data-title="Update '.$element->bc_label .'" href="javascript:void(0)" value="' . Url::to(['/client/bc-'.$item.'/update', 'id' => $element->id, 'pid' => $pid]) . '" >
        <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <a href="' . Url::to(['/client/bc-'.$item.'/delete', 'id' => $element->id, 'pid' => $pid]) . '" >
<span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
        </div> </div>
</div>
                  ';
    return $html;
}


$this->registerJs('

$(function(){
  $(".bc-add-item, .bc-update-item").click(function(){

    var title = $(this).data("title");
        $("#bc-title").text(title);
      $("#bc-modal-canvas").modal("show")
        .find("#bc-form")
        .load($(this).attr("value"));


  });

});



');
?>