<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'client_type')->textInput() ?>

    <?= $form->field($model, 'biz_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biz_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biz_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biz_fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biz_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biz_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biz_main_activity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biz_date_execution')->textInput() ?>

    <?= $form->field($model, 'biz_reg_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biz_capital')->textInput() ?>

    <?= $form->field($model, 'personal_updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
