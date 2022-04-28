<?php

use yii\helpers\Html;
use yii\widgets\ListView;
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
    <p>
     <?php echo Html::button('Create Business Canvas',['value' => Url::to(['/client/biz-canvas/create']), 'class' => 'btn btn-success', 'id' => 'modalBttnPartner']);

            $this->registerJs('
            $(function(){
              $("#modalBttnPartner").click(function(){
                  $("#createPartner").modal("show")
                    .find("#formCreatePartner")
                    .load($(this).attr("value"));
              });
            });
            ');
        ?>
    </p>
    <br/>

<div class="biz-canvas-index">

    <div class="card">
      <div class="card-body">

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
         'pager' => [
                'class' => 'yii\bootstrap4\LinkPager',
            ],
         
        
         'options' => [
             'class' => 'row g-gs',
             'id' => false
             
         ],
         'itemOptions' => ['tag' => null],
            'itemView' => '_list_item',
        ]) ?>

        </div>
    </div>
</div>


