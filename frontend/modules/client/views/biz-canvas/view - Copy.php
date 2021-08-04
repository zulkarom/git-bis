<?php

use yii\helpers\Html;
use backend\assets\CanvasAsset;
use yii\bootstrap4\Modal;
use yii\helpers\Url;

CanvasAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\client\models\BizCanvasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Business Canvas';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
  table, td, th {  
    border: 2px solid;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    padding: 15px;
  }
</style>

<div class="white_card card_height_100 mb_30">
  <div class="white_card_header">
    <div class="wrapper">
      <!-- <h4>Business Model Canvas</h4> -->
      <div class="bmc">
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Key Partners</div> 
              <div class ="col-2">
                <?php 
                echo '<a class="modalBttnPartner" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-parner/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                    ?>
              </div>
            </div>
          </h3>
            <div class ="row">
              <div class ="col-11">
                <div>Everyone</div>
              </div>
            </div>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Key Activities</div> 
              <div class ="col-2">
                <?php 
                echo '<a class="modalBttnActivity" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-activity/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                    ?>
              </div>
            </div>
          </h3>
          <div>All</div>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Key Resources</div> 
              <div class ="col-2">
                <?php 
                  echo '<a class="modalBttnResources" href="javascript:void(0)" value="' . Url::to(['/client/bc-key-resource/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
            </div>
          </h3>
          <div>All</div>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Value Proposition</div> 
              <div class ="col-2">
                <?php 
                  echo '<a class="modalBttnProposition" href="javascript:void(0)" value="' . Url::to(['/client/bc-val-proposition/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
            </div>
          </h3>
          <div>Everything</div>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Customer Relationship</div> 
              <div class ="col-2">
                <?php 
                  echo '<a class="modalBttnRelationship" href="javascript:void(0)" value="' . Url::to(['/client/bc-cust-relation/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
            </div>
          </h3>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Channels</div> 
              <div class ="col-2">
                <?php 
                  echo '<a class="modalBttnChannel" href="javascript:void(0)" value="' . Url::to(['/client/bc-channel/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
            </div>
          </h3>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Customers Segments</div> 
              <div class ="col-2">
                <?php 
                  echo '<a class="modalBttnSegment" href="javascript:void(0)" value="' . Url::to(['/client/bc-cust-segment/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
            </div>
          </h3>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-11">Cost Structure</div> 
              <div class ="col-1">
                <?php 
                  echo '<a class="modalBttnStructure" href="javascript:void(0)" value="' . Url::to(['/client/bc-cost-structure/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
            </div>
          </h3>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-11">Revenue Streams</div> 
              <div class ="col-1">
                <?php 
                  echo '<a class="modalBttnStream" href="javascript:void(0)" value="' . Url::to(['/client/bc-rev-stream/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
            </div>
          </h3>
          <div>Even more</div>
        </div>
      </div>
      </div>

      <br/>
      <table>
      <tr>
        <th>
            <div class ="row">
              <div class ="col-11">Brainstorming Space</div> 
              <div class ="col-1" align="right">
                <?php 
                  echo '<a class="modalBttnSpace" href="javascript:void(0)" value="' . Url::to(['/client/bc-brainstorm/create', 'pid' => $model->id]) . '" >&nbsp<span class="fa fa-plus"></span></a>';
                
                ?>
              </div>
            </div>
          <div>Even more</div>
        </th>
      </tr>
    </table>

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
});

$(function(){
  $(".modalBttnActivity").click(function(){
      $("#createActivity").modal("show")
        .find("#formCreateActivity")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnResources").click(function(){
      $("#createResources").modal("show")
        .find("#formCreateResources")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnProposition").click(function(){
      $("#createProposition").modal("show")
        .find("#formCreateProposition")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnRelationship").click(function(){
      $("#createRelationship").modal("show")
        .find("#formCreateRelationship")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnChannel").click(function(){
      $("#createChannel").modal("show")
        .find("#formCreateChannel")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnSegment").click(function(){
      $("#createSegment").modal("show")
        .find("#formCreateSegment")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnStructure").click(function(){
      $("#createStructure").modal("show")
        .find("#formCreateStructure")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnStream").click(function(){
      $("#createStream").modal("show")
        .find("#formCreateStream")
        .load($(this).attr("value"));
  });
});

$(function(){
  $(".modalBttnSpace").click(function(){
      $("#createSpace").modal("show")
        .find("#formCreateSpace")
        .load($(this).attr("value"));
  });
});

');
?>