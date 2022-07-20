<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\client\models\BizCanvasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>


<div class="supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput()->label('<b>Title</b>') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('<b>Description</b>') ?>

    <div class="form-group">
        <?= Html::submitButton('Save Canvas', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  </div>
</div>