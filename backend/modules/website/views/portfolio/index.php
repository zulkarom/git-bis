<?php

use yii\helpers\Html;
use yii\grid\GridView;
use specialist\icrop\CropImageUpload;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\website\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portfolio';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>


<div class="card">
    <div class="card-body">
        <div class="portfolio-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'image_url')->widget(CropImageUpload::className()) ?>

            <div class="form-group">
                <?= Html::submitButton('Add Image', ['class' => 'btn btn-success btn-sm']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>


<div class="card">
    <div class="card-body">
        <div class="card-header"><b>List of Portfolio Image</b></div>
        <div class="portfolio-index">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'format' => 'html',
                        'label' => 'Name',
                        'value' => function($model){
                            return $model->image_url;
                        }
                    ],
                    [
                        'format' => 'html',
                        'label' => 'Image',
                        'value' => function($model){
                            return '';
                        }
                    ],
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
