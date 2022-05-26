<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\expert\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .mr_left {
     margin-left: 10px; 
    }
</style>
<div class="client-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
              'contentOptions' => ['style' => 'width: 2%']
            ],
            [
                'format' => 'raw',
                'attribute' => 'client_name',
                'label' => 'Client Name',
                // 'contentOptions' => ['style' => 'width: 5%'],
                'value' => function($model){
                    return Html::a('<div class="profile_info d-flex align-items-center">
                                <img class="rounded-circle" src="'. Url::to(['/expert/profile/client-image', 'id' => $model->user->id]) .'" alt="" data-original-title="" title=""><div class="mr_left">'.$model->user->fullname.'</div></div>',['/chatExpert/', 'id' => $model->id]);
                    return ;
                }
            ],
            // ['class' => 'yii\grid\ActionColumn',
            //     // 'contentOptions' => ['style' => 'width: 10%'],
            //     'template' => '{view}',
            //     //'visible' => false,
            //     'buttons'=>[
            //         'view'=>function ($url, $model) {
            //             return Html::a('View',['/chatExpert/', 'id' => $model->id],['class'=>'btn btn-primary btn-sm']);
            //         },
            //     ],
            
            // ],
        ],
    ]); ?>


</div>
