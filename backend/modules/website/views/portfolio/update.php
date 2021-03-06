<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use karpoff\icrop\CropImageUpload; 
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\modules\website\models\Portfolio */

$this->title = 'Update Portfolio';
$this->params['breadcrumbs'][] = ['label' => 'Portfolios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
<div class="portfolio-update">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'image_url')->textInput(['maxlength' => true])?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'is_show')->dropDownList( [1 => 'Yes' , 0 => 'No'] ) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tbody><tr>
                  <th style="width: 900px"><?= $form->field($model, 'image_file')->widget(CropImageUpload::className()) ?></th>
                  <th>
                    <?php if($model->image_file): ?>
                        <img src="<?=Url::to(['/website/portfolio/portfolio-image', 'id' => $model->id])?>" width="90" height="90">
                    <?php endif; ?>
                  </th>
                </tr>
              </tbody></table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tbody><tr>
                  <th style="width: 900px"><?= $form->field($model2, 'image_file_hover')->widget(CropImageUpload::className()) ?></th>
                  <th>
                    <?php if($model->image_file_hover): ?>
                        <img src="<?=Url::to(['/website/portfolio/portfolio-image2', 'id' => $model->id])?>" width="90" height="90">
                    <?php endif; ?>    
                  </th>
                </tr>
              </tbody></table>
        </div>
    </div>

    
    

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
