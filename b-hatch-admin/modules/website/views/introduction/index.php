<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\website\models\IntroductionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Introduction';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-body">
        <div class="introduction-index">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'title',
                    'title_content',
                    'title_button',
                    'intro_content:ntext',

                    ['class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width: 10%'],
                        'template' => '{update}',
                        //'visible' => false,
                        'buttons'=>[
                            'update'=>function ($url, $model) {
                                return Html::a('<span class="fa fa-edit"></span> UPDATE',['update', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                            }
                        ],
                    
                    ],   
                ],
            ]); ?>


        </div>
    </div>
</div>