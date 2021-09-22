<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\assets\CanvasAsset;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
\yii\web\YiiAsset::register($this);
CanvasAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\client\models\BizCanvasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Business Canvas';
$this->params['breadcrumbs'][] = $this->title;
?>


    <p>
     <?php echo Html::button('<span class="fa fa-plus"></span> Create Business Canvas',['value' => Url::to(['/client/biz-canvas/create']), 'class' => 'btn btn-success', 'id' => 'modalBttnPartner']);

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

<div class="biz-canvas-index">

    <div class="box">
      <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'label' => 'Title',
                        'value' => function($model){
                            return $model->title;
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{view}',
                        //'visible' => false,
                        'buttons'=>[
                        'view'=>function ($url, $model) {
                            return Html::a('<span class="fa fa-search"></span> View',['view', 'id' => $model->id],['class'=>'btn btn-primary']);
                        }
                        ],
                
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>


