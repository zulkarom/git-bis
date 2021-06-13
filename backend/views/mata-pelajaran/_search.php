<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MataPelajaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mata-pelajaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pelajaran') ?>

    <?= $form->field($model, 'result_id') ?>

    <?= $form->field($model, 'psubjek') ?>

    <?= $form->field($model, 'gred') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
