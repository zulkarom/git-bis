<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MataPelajaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mata-pelajaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'result_id')->textInput() ?>

    <?= $form->field($model, 'psubjek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gred')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
