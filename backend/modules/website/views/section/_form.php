<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use karpoff\icrop\CropImageUpload;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\modules\website\models\Section */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card">
    <div class="card-body">
		<div class="section-form">

		    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
		    <div class="row">
				<div class="col-md-6">
		    		<?= $form->field($model, 'title')->textInput(['maxlength' => true])?>
		    	</div>
		    </div>

		    <div class="row">
				<div class="col-md-6">
		    		<?= $form->field($model, 'content')->textarea(['rows' => '6'])?>
		    	</div>
		    </div>

		    <div class="row">
		        <div class="col-md-6">		    
		  			<?= $form->field($model, 'image_url')->widget(CropImageUpload::className())?></th>    
		        </div>
		    </div>

		    <div class="form-group">
		        <?= Html::submitButton('Save Content', ['class' => 'btn btn-success']) ?>
		    </div>

		    <?php ActiveForm::end(); ?>

		</div>
	</div>
</div>
