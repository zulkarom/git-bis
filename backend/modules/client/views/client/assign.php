<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\modules\account\models\Product;

/* @var $this yii\web\View */
/* @var $model backend\modules\client\models\ClientProduct */
?>

<div class="client-expert-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <div class="form-group">
        <?= Html::submitButton('Add Expert', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
