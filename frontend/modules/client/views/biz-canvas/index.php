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
     <?php echo Html::button('<span class="fa fa-plus"></span> Create Business Canvas',['value' => Url::to(['/client/biz-canvas/create']), 'class' => 'btn btn-success btn-sm', 'id' => 'modalBttnPartner']);

            Modal::begin([
                    'title' => '<h4>Add Key Partner</h4>',
                    'id' =>'createPartner',
                    'size' => 'modal-lg',
                ]);

            echo '<div id="formCreatePartner"></div>';

            Modal::end();

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

    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
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
                            return Html::a('<span class="fa fa-search"></span> View',['view', 'id' => $model->id],['class'=>'btn btn-primary btn-sm']);
                        }
                        ],
                
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>


