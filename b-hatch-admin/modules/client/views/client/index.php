<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\client\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="client-index">
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Name',
                'attribute' => 'name',
                'value' => function($model){
                    return $model->user->fullname;
                }
            ],
            [
                'label' => 'Email',
                'attribute' => 'email',
                'value' => function($model){
                    return $model->user->email;
                }
            ],
            [
                'label' => 'Business Name',
                'attribute' => 'biz_name',
                'value' => function($model){
                    return $model->biz_name;
                }
            ],
            [
                'format' => 'html',
                'label' => 'List of Experts',
                'value' => function($model){
                    return $model->getListOfExperts($model->id);
                } 
            ],
            // [
            //     'label' => 'List of Experts',
            //     'value' => function($model){
            //         if($model->clientExperts){
            //             foreach($model->clientExperts as $clientEx){
            //                return $clientEx->expert->user->fullname; 
            //             }
            //         }
                    
            //     }
            // ],
            

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
</div>
</div>
