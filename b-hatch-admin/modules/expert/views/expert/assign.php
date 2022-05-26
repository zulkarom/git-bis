<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Client;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\modules\client\models\ClientProduct */
?>

<div class="client-expert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->widget(Select2::classname(), [
                    'data' =>  ArrayHelper::map(Client::find()->joinWith('user')->all(),'id', 'user.fullname'),
                    'options' => ['placeholder' => 'Select...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    ]);?>



    <div class="form-group">
        <?= Html::submitButton('Add Client', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
