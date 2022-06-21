<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use common\models\Common;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use karpoff\icrop\CropImageUpload;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Fasi */
/* @var $form ActiveForm */

$this->title = "My Profile";
$model->email = $user->email;
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
<div class="card">
        <div class="card-body">

    
    

    <div class="row">
<div class="col-md-6"><?= $form->field($model, 'fullname')->textInput(['value' => $model->user->fullname])->label('Client Name')?></div>

<div class="col-md-3">
<?= $form->field($model, 'email')->textInput(['readonly' => 'readonly']) ?>
 </div>

</div>

 <div class="row">
<div class="col-md-6"><?= $form->field($model, 'biz_name')->textInput()?></div>

<div class="col-md-6">
<?= $form->field($model, 'biz_type')->textInput() ?>
 </div>

</div>

   <div class="row">
<div class="col-md-4">
    <?= $form->field($model, 'biz_phone')->textInput() ?>
</div>

<div class="col-md-4">
<?= $form->field($model, 'biz_fax')->textInput() ?>
 </div>

 <div class="col-md-4">
<?= $form->field($model, 'biz_email')->textInput() ?>
 </div>

</div>

<div class="row">
<div class="col-md-4">
    <?= $form->field($model, 'biz_main_activity')->textInput() ?>
</div>

<div class="col-md-4">
<?= $form->field($model, 'biz_reg_no')->textInput() ?>
 </div>

 <div class="col-md-2">
<?php if($model->isNewRecord){$model->biz_date_execution = date('Y-m-d');}?>
         <?=$form->field($model, 'biz_date_execution')->widget(DatePicker::classname(), [
        'removeButton' => false,
        'pickerIcon' => '<i class="fa fa-calendar"></i>',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,   
        ],
    ]);
?>
 </div>

  <div class="col-md-2">
    <?php if($model->biz_capital == 0){$model->biz_capital = "";}?>
        <?= $form->field($model, 'biz_capital')->textInput() ?>
 </div>

</div>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'biz_address')->textArea(['rows' => '2']) ?>
    </div>

<div class="col-md-6"><?= $form->field($model, 'biz_description')->textArea(['row' => 2])->label('Business Description')?>
    
</div>

</div>
   

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tbody><tr>
              <th style="width: 900px"><?= $form->field($model, 'profile_file')->widget(CropImageUpload::className())?></th>
              <th><img src="<?=Url::to(['/client/profile/profile-image', 'id' => Yii::$app->user->identity->id])?>" width="90" height="90"></th>
            </tr>
          </tbody></table>
    </div>
</div>


</div><!-- profile-index -->
</div>

<br/>
 <div class="form-group">
    <?= Html::submitButton('Save Profile', ['class' => 'btn btn-primary']) ?>
</div>
            
            
      <?php ActiveForm::end(); ?>