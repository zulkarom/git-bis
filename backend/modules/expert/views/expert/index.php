<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\expert\models\ExpertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Experts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-index">

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
                'label' => 'Expert Type',
                'format' => 'html',
                'attribute' => 'expert_type',
                'filter' => Html::activeDropDownList($searchModel, 'expert_type', $searchModel->expertType() ,['class'=> 'form-control','prompt' => 'Choose Type']),
                'value' => function($model){
                    return $model->expertText;
                }
            ],           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>


</div>
