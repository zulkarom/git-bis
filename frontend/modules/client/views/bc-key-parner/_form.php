<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BcKeyParner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bc-key-parner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput()->label('Title') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'color')->dropDownList( ['blue' => 'Blue' , 'green' => 'Green', 'yellow' => 'Yellow', 'red' => 'Red', 'grey' => 'Grey'] ) ?>

    <!-- <div class="row">
        <div class="col-2">
            <div class="square blue"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="square green"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="square yellow"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="square red"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="square grey"></div>
        </div>
    </div> -->
    
    <br/>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
