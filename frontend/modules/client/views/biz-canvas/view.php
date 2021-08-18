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
            <h4>
            <div class ="row">
              <div class ="col-10">Key Partners</div> 
              <div class ="col-2"><font class="text-align"></font>
                <?php 
                echo '<a class="modalBttnPartner" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-parner/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                    ?>
              </div>
            </div>
            </h4>
            <p>
            <div class ="row">
              <?php if($partners){
                foreach($partners as $partner){
                    echo stickynote($partner, 'key-parner', $model->id);
                    
 
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="2">
            <h4>
              <div class ="row">
              <div class ="col-10">Key Activities</div> 
              <div class ="col-2">
                <?php
                echo '<a class="modalBttnActivity" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-activity/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                    ?>
              </div>
              </div>
            </h4>
            <p>
            <div class ="row">
              <?php if($activities){
                foreach($activities as $activity){
                    echo stickynote($activity, 'key-activity', $model->id);
 
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="2" rowspan="2">
            <h4>
              <div class ="row">
              <div class ="col-9">Value Proposition</div> 
              <div class ="col-3">
                <?php 
                  echo '<a class="modalBttnProposition" href="javascript:void(0)" value="' . Url::to(['/client/bc-val-proposition/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
            </div>
            </h4>
            <p>
             <div class ="row">
              <?php if($propositions){
                foreach($propositions as $proposition){
                    echo stickynote($proposition, 'val-proposition', $model->id);
                    
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="2">
            <h4>
              <div class ="row">
              <div class ="col-10">Customer Relationship</div> 
              <div class ="col-2">
                <?php 
                  echo '<a class="modalBttnRelationship" href="javascript:void(0)" value="' . Url::to(['/client/bc-cust-relation/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
              </div>
            </h4>
            <p>
            <div class ="row">
              <?php if($relationships){
                foreach($relationships as $relationship){
                    echo stickynote($relationship, 'cust-relation', $model->id);
                    
  
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="2" rowspan="2">
            <h4>
              <div class ="row">
              <div class ="col-10">Customers Segments</div> 
              <div class ="col-2">
                <?php 
                  echo '<a class="modalBttnSegment" href="javascript:void(0)" value="' . Url::to(['/client/bc-cust-segment/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
              </div>
            </h4>
            <p>
            <div class ="row">
              <?php if($segments){
                foreach($segments as $segment){
                    
                    echo stickynote($segment, 'cust-segment', $model->id);

                }
              }?>
              </div>
            </p>
          </td>
        </tr>

        <!-- Lower part -->
        <tr>
          <td colspan="2">
            <h4>
              <div class ="row">
              <div class ="col-10">Key Resources</div> 
              <div class ="col-2">
                <?php 
                  echo '<a class="modalBttnResources" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-resource/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
              </div>
            </h4>
            <p>
            <div class ="row">
              <?php if($resources){
                foreach($resources as $resource){
                    
                    echo stickynote($resource, 'key-resource', $model->id);
                    
     
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="2">
            <h4>
              <div class ="row">
              <div class ="col-10">Channels</div> 
              <div class ="col-2">
                <?php 
                  echo '<a class="modalBttnChannel" href="javascript:void(0)" value="' . Url::to(['/client/bc-channel/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
              </div>
            </h4>
            <p>
             <div class ="row">
              <?php if($channels){
                foreach($channels as $channel){
                    
                    echo stickynote($channel, 'channel', $model->id);
                    
                }
              }?>
              </div>
            </p>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <h4>
              <div class ="row">
              <div class ="col-11">Cost Structure</div> 
              <div class ="col-1">
                <?php 
                  echo '<a class="modalBttnStructure" href="javascript:void(0)" value="' . Url::to(['/client/bc-cost-structure/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                ?>
              </div>
              </div>
            </h4>
            <p>
            <div class ="row">
              <?php if($structures){
                foreach($structures as $structure){
                    
                    echo stickynote($structure, 'cost-structure', $model->id, 6);
                    
                }
              }?>
              </div>
            </p>
          </td>
          <td colspan="5">
            <h4>
              <div class ="row">
              <div class ="col-11">Revenue Streams</div> 
              <div class ="col-1">
                <?php 
                  echo '<a class="modalBttnStream" href="javascript:void(0)" value="' . Url::to(['/client/bc-rev-stream/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
              </div>
            </h4>
            <p>
            <div class="row">
              <?php if($revenues){
                foreach($revenues as $revenue){
                    echo stickynote($revenue, 'rev-stream', $model->id, 6);
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
              <div class ="col-11"><h4>Brainstorming Space</h4></div> 
              <div class ="col-1" align="right">
                <?php 
                  echo '<a class="modalBttnSpace" href="javascript:void(0)" value="' . Url::to(['/client/bc-brainstorm/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                ?>
              </div>
              </div>
            
            <p>
            <div class="row">
            	
            
              <?php if($spaces){
                foreach($spaces as $space){
                    echo stickynote($space, 'brainstorm', $model->id, 3);
                 
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

function stickynote($space, $item, $pid, $col = 12){
    return '<div class="col-md-'.$col.'"><div class="dropdown" style="margin-bottom:7px">
    
                  <div class = "note '.$space->color.'">
    
<p style="font-size:12px; color:#000000;border-bottom:1px solid rgba(0, 0, 0, 0.07);">'.Html::encode($space->title).'</p>
    
<p style="font-size:11px; color:#000000;">'. nl2br(Html::encode($space->description)).'</p>
    
    
    
    
</div>
    
                  <div class="dropdown-content">
                    <a class="updateSpace" href="javascript:void(0)" value="' . Url::to(['/client/bc-'.$item.'/update', 'id' => $space->id, 'pid' => $pid]) . '" >
                    <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <a href="' . Url::to(['/client/bc-'.$item.'/delete', 'id' => $space->id, 'pid' => $pid]) . '" >
<span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
                  </div>
      
                  </div>
</div>
                  ';
}


$this->registerJs('
$(function(){
  $(".modalBttnPartner").click(function(){
      $("#createPartner").modal("show")
        .find("#formCreatePartner")
        .load($(this).attr("value"));
  });
  $(".updatePartner").click(function(){
      $("#updtPartner").modal("show")
        .find("#formUpdatePartner")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnActivity").click(function(){
      $("#createActivity").modal("show")
        .find("#formCreateActivity")
        .load($(this).attr("value"));
  });
  $(".updateActivity").click(function(){
      $("#updtActivity").modal("show")
        .find("#formUpdateActivity")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnResources").click(function(){
      $("#createResources").modal("show")
        .find("#formCreateResources")
        .load($(this).attr("value"));
  });
  $(".updateResource").click(function(){
      $("#updtResource").modal("show")
        .find("#formUpdateResource")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnProposition").click(function(){
      $("#createProposition").modal("show")
        .find("#formCreateProposition")
        .load($(this).attr("value"));
  });
  $(".updateProposition").click(function(){
      $("#updtProposition").modal("show")
        .find("#formUpdateProposition")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnRelationship").click(function(){
      $("#createRelationship").modal("show")
        .find("#formCreateRelationship")
        .load($(this).attr("value"));
  });
  $(".updateRelationship").click(function(){
      $("#updtRelationship").modal("show")
        .find("#formUpdateRelationship")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnChannel").click(function(){
      $("#createChannel").modal("show")
        .find("#formCreateChannel")
        .load($(this).attr("value"));
  });
  $(".updateChannel").click(function(){
      $("#updtChannel").modal("show")
        .find("#formUpdateChannel")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnSegment").click(function(){
      $("#createSegment").modal("show")
        .find("#formCreateSegment")
        .load($(this).attr("value"));
  });
  $(".updateSegment").click(function(){
      $("#updtSegment").modal("show")
        .find("#formUpdateSegment")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnStructure").click(function(){
      $("#createStructure").modal("show")
        .find("#formCreateStructure")
        .load($(this).attr("value"));
  });
  $(".updateStructure").click(function(){
      $("#updtStructure").modal("show")
        .find("#formUpdateStructure")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnStream").click(function(){
      $("#createStream").modal("show")
        .find("#formCreateStream")
        .load($(this).attr("value"));
  });
  $(".updateStream").click(function(){
      $("#updtStream").modal("show")
        .find("#formUpdateStream")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnSpace").click(function(){
      $("#createSpace").modal("show")
        .find("#formCreateSpace")
        .load($(this).attr("value"));
  });
  $(".updateSpace").click(function(){
      $("#updtSpace").modal("show")
        .find("#formUpdateSpace")
        .load($(this).attr("value"));
  });
});

');
?>