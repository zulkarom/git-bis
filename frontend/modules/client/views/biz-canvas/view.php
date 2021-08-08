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
    border: none;
    height: 1px;
    width: 100%;
    /* Set the hr color */
    color: #333; /* old IE */
    background-color: #333; /* Modern Browsers */
}

.hide {
  display: none;
}
    
.myDIV:hover + .hide {
  display: block;
  color: red;
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

.note-hover-accessories {
    position: absolute;
    z-index: 30;
}
.note-hover-accessories .bottom-container, .note-hover-accessories .right-container {
    display: flex;
    flex-direction: column;
    position: absolute;
    box-shadow: 0 10px 20px rgb(0 0 0 / 19%), 0 6px 6px rgb(0 0 0 / 23%);
    cursor: pointer;
}

.note-color-pick {
    display: flex;
    padding: .5em .25em;
    background-color: #fff;
    box-shadow: 0 10px 20px rgb(0 0 0 / 19%), 0 6px 6px rgb(0 0 0 / 23%);
    width: 100%;
}

.note-color-pick>.note-edit-button {
    margin-left: auto;
    color: #bbb;
    font-weight: 800;
    cursor: pointer;
    padding-right: .5rem;
}
</style>

<div class="white_card card_height_100 mb_30" style="overflow-x: scroll;">
  <div class="white_card_header">
    
    
      <!-- <h1>The Business Model Canvas</h1> -->
      <!-- Canvas -->
      <table id="bizcanvas" cellspacing="0" border="3">
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
              <?php if($partners){
                foreach($partners as $partner){
                  echo '<div class="dropdown"><div class = "note '.$partner->color.'">'.$partner->title.'</div>
                  <div class = "note '.$partner->color.'">'.$partner->description.'</div>
                  
                  
                  <div class="dropdown-content">
                    <a class="updatePartner" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-parner/update', 'id' => $partner->id, 'pid' => $model->id]) . '" >
                    <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <a href="' . Url::to(['/client/bc-key-parner/delete', 'id' => $partner->id, 'pid' => $model->id]) . '" ><span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
                  </div>
                  
                  </div>
                  <br/>';
                }
              }?>
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
              <?php if($activities){
                foreach($activities as $activity){
                  echo '<div class="dropdown"><div class = "note '.$activity->color.'">'.$activity->title.'</div>
                  <div class = "note '.$activity->color.'">'.$activity->description.'</div>
                  <div class="dropdown-content">
                    <a class="updateActivity" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-activity/update', 'id' => $activity->id, 'pid' => $model->id]) . '" >
                    <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <a href="' . Url::to(['/client/bc-key-activity/delete', 'id' => $activity->id, 'pid' => $model->id]) . '" ><span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
                  </div>
                  
                  </div>
                  <br/>';
                }
              }?>
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
              <?php if($propositions){
                foreach($propositions as $proposition){
                  echo '<div class="dropdown"><div class = "note '.$proposition->color.'">'.$proposition->title.'</div>
                  <div class = "note '.$proposition->color.'">'.$proposition->description.'</div>
                  <div class="dropdown-content">
                    <a class="updateProposition" href="javascript:void(0)" value="' . Url::to(['/client/bc-val-proposition/update', 'id' => $proposition->id, 'pid' => $model->id]) . '" >
                    <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <a href="' . Url::to(['/client/bc-val-proposition/delete', 'id' => $proposition->id, 'pid' => $model->id]) . '" ><span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
                  </div>
                  
                  </div>
                  <br/>';
                }
              }?>
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
              <?php if($relationships){
                foreach($relationships as $relationship){
                  echo '<div class="dropdown"><div class = "note '.$relationship->color.'">'.$relationship->title.'</div>
                  <div class = "note '.$relationship->color.'">'.$relationship->description.'</div>
                  <div class="dropdown-content">
                    <a class="updateRelationship" href="javascript:void(0)" value="' . Url::to(['/client/bc-cust-relation/update', 'id' => $relationship->id, 'pid' => $model->id]) . '" >
                    <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <a href="' . Url::to(['/client/bc-cust-relation/delete', 'id' => $relationship->id, 'pid' => $model->id]) . '" ><span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
                  </div>
                  
                  </div>
                  <br/>';
                }
              }?>
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
              <?php if($segments){
                foreach($segments as $segment){
                  echo '<div class="dropdown"><div class = "note '.$segment->color.'">'.$segment->title.'</div>
                  <div class = "note '.$segment->color.'">'.$segment->description.'</div>
                  <div class="dropdown-content">
                    <a class="updateSegment" href="javascript:void(0)" value="' . Url::to(['/client/bc-cust-segment/update', 'id' => $segment->id, 'pid' => $model->id]) . '" >
                    <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <a href="' . Url::to(['/client/bc-cust-segment/delete', 'id' => $segment->id, 'pid' => $model->id]) . '" ><span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
                  </div>
                  
                  </div>
                  <br/>';
                }
              }?>
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
              <?php if($resources){
                foreach($resources as $resource){
                  echo '<div class="dropdown"><div class = "note '.$resource->color.'">'.$resource->title.'</div>
                  <div class = "note '.$resource->color.'">'.$resource->description.'</div>
                  <div class="dropdown-content">
                    <a class="updateResource" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-resource/update', 'id' => $resource->id, 'pid' => $model->id]) . '" >
                    <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <a href="' . Url::to(['/client/bc-key-resource/delete', 'id' => $resource->id, 'pid' => $model->id]) . '" ><span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
                  </div>
                  
                  </div>
                  <br/>';
                }
              }?>
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
              <?php if($channels){
                foreach($channels as $channel){
                  echo '<div class="dropdown"><div class = "note '.$channel->color.'">'.$channel->title.'</div>
                  <div class = "note '.$channel->color.'">'.$channel->description.'</div>
                  <div class="dropdown-content">
                    <a class="updateChannel" href="javascript:void(0)" value="' . Url::to(['/client/bc-channel/update', 'id' => $channel->id, 'pid' => $model->id]) . '" >
                    <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <a href="' . Url::to(['/client/bc-channel/delete', 'id' => $channel->id, 'pid' => $model->id]) . '" ><span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
                  </div>
                  
                  </div>
                  <br/>';
                }
              }?>
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
              <?php if($structures){
                foreach($structures as $structure){
                  echo '<div class="dropdown"><div class = "note '.$structure->color.'">'.$structure->title.'</div>
                  <div class = "note '.$structure->color.'">'.$structure->description.'</div>
                  <div class="dropdown-content">
                    <a class="updateStructure" href="javascript:void(0)" value="' . Url::to(['/client/bc-cost-structure/update', 'id' => $structure->id, 'pid' => $model->id]) . '" >
                    <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <a href="' . Url::to(['/client/bc-cost-structure/delete', 'id' => $structure->id, 'pid' => $model->id]) . '" ><span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
                  </div>
                  
                  </div>
                  <br/>';
                }
              }?>
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
              <?php if($revenues){
                foreach($revenues as $revenue){
                  echo '<div class="dropdown"><div class = "note '.$revenue->color.'">'.$revenue->title.'</div>
                  <div class = "note '.$revenue->color.'">'.$revenue->description.'</div>
                  <div class="dropdown-content">
                    <a class="updateStream" href="javascript:void(0)" value="' . Url::to(['/client/bc-rev-stream/update', 'id' => $revenue->id, 'pid' => $model->id]) . '" >
                    <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <a href="' . Url::to(['/client/bc-rev-stream/delete', 'id' => $revenue->id, 'pid' => $model->id]) . '" ><span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
                  </div>
                  
                  </div>
                  <br/>';
                }
              }?>
            </p>
          </td>
        </tr>
      </table>
    
    <hr>
    
      <table id="bizcanvas" cellspacing="0" border="3">
        <tr>
          <td colspan="10">
            <h4>
              <div class ="row">
              <div class ="col-11">Brainstorming Space</div> 
              <div class ="col-1" align="right">
                <?php 
                  echo '<a class="modalBttnSpace" href="javascript:void(0)" value="' . Url::to(['/client/bc-brainstorm/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                ?>
              </div>
              </div>
            </h4>
            <p>
              <?php if($spaces){
                foreach($spaces as $space){
                  echo '<div class="dropdown"><div class = "note '.$space->color.'">'.$space->title.'</div>
                  <div class = "note '.$space->color.'">'.$space->description.'</div>
                  <div class="dropdown-content">
                    <a class="updateSpace" href="javascript:void(0)" value="' . Url::to(['/client/bc-brainstorm/update', 'id' => $space->id, 'pid' => $model->id]) . '" >
                    <span class="note-edit-button">&nbsp<b>EDIT</b></span></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <a href="' . Url::to(['/client/bc-brainstorm/delete', 'id' => $space->id, 'pid' => $model->id]) . '" ><span class="note-edit-button"><b><font color ="red">X</font></b>&nbsp</span></a>
                  </div>
                  
                  </div>
                  <br/>';
                }
              }?>
            </p>
          </td>
        </tr>
      </table>
      <!-- /Canvas -->
    

    </div>
  </div>

<?php


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