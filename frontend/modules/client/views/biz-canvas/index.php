<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\assets\CanvasAsset;

CanvasAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\client\models\BizCanvasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Business Canvas';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?= Html::a('Create Business Canvas', ['create'], ['class' => 'btn btn-success']) ?>
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


