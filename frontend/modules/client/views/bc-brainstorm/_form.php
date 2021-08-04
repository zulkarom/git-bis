<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BcBrainstorm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bc-brainstorm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput()->label('Title') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'color')->dropDownList( ['blue' => 'Blue' , 'green' => 'Green', 'yellow' => 'Yellow', 'red' => 'Red', 'grey' => 'Grey'] ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
