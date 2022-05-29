<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\expert\models\ClientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'client_type') ?>

    <?= $form->field($model, 'biz_name') ?>

    <?= $form->field($model, 'biz_address') ?>

    <?php // echo $form->field($model, 'biz_phone') ?>

    <?php // echo $form->field($model, 'biz_fax') ?>

    <?php // echo $form->field($model, 'biz_email') ?>

    <?php // echo $form->field($model, 'biz_type') ?>

    <?php // echo $form->field($model, 'biz_main_activity') ?>

    <?php // echo $form->field($model, 'biz_date_execution') ?>

    <?php // echo $form->field($model, 'biz_reg_no') ?>

    <?php // echo $form->field($model, 'biz_capital') ?>

    <?php // echo $form->field($model, 'profile_file') ?>

    <?php // echo $form->field($model, 'personal_updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
