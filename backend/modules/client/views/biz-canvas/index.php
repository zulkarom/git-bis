<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BizCanvasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Biz Canvas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biz-canvas-index">
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            [
                'label' => 'Client Name',
                'attribute' => 'name',
                'value' => function($model){
                    return $model->user->fullname;
                }
            ],
            
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 10%'],
                'template' => '{view}',
                //'visible' => false,
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return Html::a('<span class="fa fa-eye"></span> VIEW',['view', 'id' => $model->id],['class'=>'btn btn-info btn-sm']);
                    }
                ],
            
            ],
        ],
    ]); ?>


</div>
