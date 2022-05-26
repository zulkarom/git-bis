<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\website\models\Introduction */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card">
    <div class="card-body">
		<div class="introduction-form">

		    <?php $form = ActiveForm::begin(); ?>

		    <div class="row">
				<div class="col-md-6">
		    		<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
		    	</div>
		    </div>

		    <div class="row">
				<div class="col-md-6">
		    		<?= $form->field($model, 'title_content')->textInput(['maxlength' => true]) ?>
		    	</div>
		    </div>

		    <div class="row">
				<div class="col-md-6">
		    		<?= $form->field($model, 'title_button')->textInput(['maxlength' => true]) ?>
		    	</div>
		    </div>

		    <div class="row">
				<div class="col-md-6">
		    		<?= $form->field($model, 'intro_content')->textarea(['rows' => 6]) ?>
		    	</div>
		    </div>

		    <div class="form-group">
		        <?= Html::submitButton('Save Introduction', ['class' => 'btn btn-success']) ?>
		    </div>

		    <?php ActiveForm::end(); ?>

		</div>
	</div>
</div>
