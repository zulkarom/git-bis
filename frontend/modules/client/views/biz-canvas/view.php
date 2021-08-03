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
          <div>Everyone</div>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Key Activities</div> 
              <div class ="col-2"><i class="fa fa-plus"></i></div>
            </div>
          </h3>
          <div>All</div>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Key Resources</div> 
              <div class ="col-2"><i class="fa fa-plus"></i></div>
            </div>
          </h3>
          <div>All</div>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Value Proposition</div> 
              <div class ="col-2"><i class="fa fa-plus"></i></div>
            </div>
          </h3>
          <div>Everything</div>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Customer Relationship</div> 
              <div class ="col-2"><i class="fa fa-plus"></i></div>
            </div>
          </h3>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Channels</div> 
              <div class ="col-2"><i class="fa fa-plus"></i></div>
            </div>
          </h3>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-10">Customers Segments</div> 
              <div class ="col-2"><i class="fa fa-plus"></i></div>
            </div>
          </h3>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-11">Cost Structure</div> 
              <div class ="col-1"><i class="fa fa-plus"></i></div>
            </div>
          </h3>
        </div>
        <div>
          <h3>
            <div class ="row">
              <div class ="col-11">Revenue Streams</div> 
              <div class ="col-1"><i class="fa fa-plus"></i></div>
            </div>
          </h3>
          <div>Even more</div>
        </div>
      </div>
      </div>
    </div>
  </div>

<div class="white_card card_height_100 mb_30">
  <div class="white_card_header">
  <div class="wrapper">
    <!-- <h4>Business Model Canvas</h4> -->
    <div class="bmc">
      <div>
      </div>
      <div>
      </div>
      <div>
      </div>
      <div>
      </div>
      <div>
      </div>
      <div>
      </div>
      <div>
      </div>
      <div>
      </div>
      <div>
      </div>
      <div>
        <h3>
          <div class ="row">
            <div class ="col-11">Cost Structure</div> 
            <div class ="col-1"><i class="fa fa-plus"></i></div>
          </div>
        </h3>
      </div>
    </div>
  </div>

    
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
');
?>