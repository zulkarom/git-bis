<?php

use yii\helpers\Html;
use backend\assets\CanvasAsset;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

CanvasAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\client\models\BizCanvasSearch */
/* @var $model backend\models\BizCanvas */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">


</style>

<div style="padding-left:12px">
  <div class="row">
    <div class="col-8">
      <h5><?=$model->title?></h5>
      <p><?=$model->description?></p>
    </div>
     <div class="col-4" align="right">
      <p><?= Html::a('<em class="icon ni ni-download"></em> PDF', ['generate-pdf', 'id' => $model->id], ['class' => 'btn btn-danger', 'target' => '_blank']) ?></p>
    </div>
  </div>
  <br/>
 

<div class="card" style="overflow-x: scroll;">
  <div class="card-body">
    
    
      <!-- <h1>The Business Model Canvas</h1> -->
      <!-- Canvas -->
      <table id="bizcanvas" class="table table-bordered" cellspacing="0" border="1">
      <tr>
      <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
      
      </tr>

  
        <!-- Upper part -->
        <tr>
          <td colspan="2" rowspan="2">
            
            <div class ="row">
              <div class ="col-md-9"><div class="titlebc">Key Partners</div></div> 
              <div class ="col-md-3" align="right">
                <?php 
                
                echo addItemLink($model, 1);
                
                    ?>
              </div>
            </div>
            
            <p>
            <div class ="row">
              <?php if($model->itemsByCategory(1)){
                  foreach($model->itemsByCategory(1) as $partner){
                    echo stickynote($partner, $model->id);
                    
 
                }
              }?>
              </div>
            </p>
            <br />
            <div class="bc-guide">
                <?php 
                echo ItemDesc($model, 1);
                ?>
            </div>
          </td>
          <td colspan="2">

              <div class ="row">
              <div class ="col-md-9"><div class="titlebc">Key Activities</div></div> 
              <div class ="col-md-3" align="right">
                <?php
                echo addItemLink($model, 2);
                    ?>
              </div>
              </div>

            <p>
            <div class ="row">
              <?php if($model->itemsByCategory(2)){
                  foreach($model->itemsByCategory(2) as $activity){
                    echo stickynote($activity, $model->id);
 
                }
              }?>
              </div>
            </p>
            <div class="bc-guide">
                <?php 
                echo ItemDesc($model, 2);
                ?>
            </div>
          </td>
          <td colspan="2" rowspan="2">

              <div class ="row">
              <div class ="col-md-9"><div class="titlebc">Value Proposition</div> </div>
              <div class ="col-md-3" align="right">
                <?php 
                echo addItemLink($model, 3);
                ?>
              </div>
            </div>
 
            <p>
             <div class ="row">
              <?php if($model->itemsByCategory(3)){
                  foreach($model->itemsByCategory(3) as $proposition){
                    echo stickynote($proposition, $model->id);
                    
                }
              }?>
              </div>
            </p>
            <div class="bc-guide">
                <?php 
                echo ItemDesc($model, 3);
                ?>
            </div>
          </td>
          <td colspan="2">

              <div class ="row">
              <div class ="col-md-9"><div class="titlebc">Customer Relationship</div> </div>
              <div class ="col-md-3" align="right">
                <?php 
                echo addItemLink($model, 4);
                
                ?>
              </div>
              </div>

            <p>
            <div class ="row">
              <?php if($model->itemsByCategory(4)){
                  foreach($model->itemsByCategory(4) as $relationship){
                    echo stickynote($relationship, $model->id);
                    
  
                }
              }?>
              </div>
            </p>
            <div class="bc-guide">
                <?php 
                echo ItemDesc($model, 4);
                ?>
            </div>
          </td>
          <td colspan="2" rowspan="2">

              <div class ="row">
              <div class ="col-md-9"><div class="titlebc">Customers Segments</div> </div>
              <div class ="col-md-3" align="right">
                <?php 
                echo addItemLink($model, 5);
                
                ?>
              </div>
              </div>
    
            <p>
            <div class ="row">
              <?php if($model->itemsByCategory(5)){
                  foreach($model->itemsByCategory(5) as $segment){
                    
                    echo stickynote($segment, $model->id);

                }
              }?>
              </div>
            </p>
            <div class="bc-guide">
                <?php 
                echo ItemDesc($model, 5);
                ?>
            </div>
          </td>
        </tr>

        <!-- Lower part -->
        <tr>
          <td colspan="2">
            
              <div class ="row">
              <div class ="col-md-9"><div class="titlebc">Key Resources</div></div> 
              <div class ="col-md-3" align="right">
                <?php 
                echo addItemLink($model, 6);
                
                ?>
              </div>
              </div>
            
            <p>
            <div class ="row">
              <?php if($model->itemsByCategory(6)){
                  foreach($model->itemsByCategory(6) as $resource){
                    
                    echo stickynote($resource,  $model->id);
                    
     
                }
              }?>
              </div>
            </p>
            <div class="bc-guide">
                <?php 
                echo ItemDesc($model, 6);
                ?>
            </div>
          </td>
          <td colspan="2">
            
              <div class ="row">
              <div class ="col-md-9"><div class="titlebc">Channels</div></div> 
              <div class ="col-md-3" align="right">
                <?php 
                echo addItemLink($model, 7);
                
                ?>
              </div>
              </div>
            
            <p>
             <div class ="row">
              <?php if($model->itemsByCategory(7)){
                  foreach($model->itemsByCategory(7) as $channel){
                    
                    echo stickynote($channel, $model->id);
                    
                }
              }?>
              </div>
            </p>
            <div class="bc-guide">
                <?php 
                echo ItemDesc($model, 7);
                ?>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            
              <div class ="row">
              <div class ="col-md-10"><div class="titlebc">Cost Structure </div></div> 
              <div class ="col-md-2" align="right">
                <?php 
                echo addItemLink($model, 8);
                ?>
              </div>
              </div>
           
            <p>
            <div class ="row">
              <?php if($model->itemsByCategory(8)){
                  foreach($model->itemsByCategory(8) as $structure){
                    
                    echo stickynote($structure,  $model->id, 6);
                    
                }
              }?>
              </div>
            </p>
            <div class="bc-guide">
                <?php 
                echo ItemDesc($model, 8);
                ?>
            </div>
          </td>
          <td colspan="5">
            
              <div class ="row">
              <div class ="col-md-10"><div class="titlebc">Revenue Streams </div></div> 
              <div class ="col-md-2" align="right">
                <?php 
                echo addItemLink($model, 9);
                
                ?>
              </div>
              </div>
           
            <p>
            <div class="row">
              <?php if($model->itemsByCategory(9)){
                  foreach($model->itemsByCategory(9) as $revenue){
                    echo stickynote($revenue,  $model->id, 6);
                }
              }?>
              </div>
            </p>
            <div class="bc-guide">
                <?php 
                echo ItemDesc($model, 9);
                ?>
            </div>
          </td>
        </tr>
      </table>
    
    <hr>
    
      <table id="bizcanvas" cellspacing="0" border="3">
        <tr>
          <td colspan="10">
            
              <div class ="row">
              <div class ="col-md-10"><div class="titlebc">Brainstorming Space</div></div> 
              <div class ="col-md-2" align="right">
                <?php 
                echo addItemLink($model, 10);
                ?>
              </div>
              </div>
            
            <p>
            <div class="row">
            	
            
              <?php if($model->itemsByCategory(10)){
                  foreach($model->itemsByCategory(10) as $space){
                    echo stickynote($space,  $model->id, 3);
                 
                }
              }?>
              
              
              </div>
            </p>
            <div class="bc-guide">
                <?php 
                echo ItemDesc($model, 10);
                ?>
            </div>
          </td>
        </tr>
      </table>
      <!-- /Canvas -->
    

    </div>
  </div>
</div>

<?php

function addItemLink($model, $cat){
    $category = $model->getCategory($cat)->category_name;
    return '<a class="bc-add-item" data-title="Add '. $category.'" href="javascript:void(0)" value="' . Url::to(['/client/biz-canvas/create-item', 'pid' => $model->id, 'cat' => $cat]) . '" >&nbsp<i class="icon ni ni-plus"></i></a>';
    
}

function itemDesc($model, $cat){
    $category = $model->getCategory($cat)->category_name;
    return '<a class="bc-cat-desc" data-title="'.$category.' (Guidelines)" href="javascript:void(0)" value="' . Url::to(['/client/biz-canvas/cat-desc', 'cat' => $cat]) . '" >&nbsp<i class="icon ni ni-bulb"></i></a>';
    
}

function stickynote($element, $pid, $col = 12){
    $item = $element->category->category_key;
    $html = '<div class="col-md-'.$col.'"><div class="dropdown" style="margin-bottom:7px">
                  <div class = "note '.$element->color.'">';
    if($element->title){
        $html .= '<p style="font-size:14px; color:#000000;border-bottom:1px solid rgba(0, 0, 0, 0.07);">'.Html::encode($element->title).'</p>';
    }
 
$html .= '<p style="font-size:13px; color:#000000;">'. nl2br(Html::encode($element->description)).'</p>

</div>
        <div class="dropdown-content">
        <a class="bc-update-item" data-title="Update '.$element->category->category_name .'" href="javascript:void(0)" value="' . Url::to(['/client/biz-canvas/update-item', 'id' => $element->id, 'pid' => $pid, 'cat' => $element->category_id]) . '" >
        <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <a href="' . Url::to(['/client/biz-canvas/delete-item', 'id' => $element->id, 'pid' => $pid, 'cat' => $element->category_id]) . '" >
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

$(function(){
  $(".bc-cat-desc").click(function(){

    var title = $(this).data("title");
        $("#bc-desc-title").text(title);
      $("#bc-modal-canvas-desc").modal("show")
        .find("#bc-desc")
        .load($(this).attr("value"));


  });

});



');
?>