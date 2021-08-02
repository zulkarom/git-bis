<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BcKeyParner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bc-key-parner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'biz_canvas_id')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
