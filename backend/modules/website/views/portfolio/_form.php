<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use karpoff\icrop\CropImageUpload; 
/* @var $this yii\web\View */
/* @var $model backend\modules\website\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="portfolio-form">

    
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'image_url')->textInput(['maxlength' => true])?>

        <?= $form->field($model, 'image_file')->widget(CropImageUpload::className()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>