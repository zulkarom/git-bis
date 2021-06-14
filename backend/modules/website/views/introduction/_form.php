<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\website\models\Introduction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="introduction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_button')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro_content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
