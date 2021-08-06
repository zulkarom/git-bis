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

?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
<div class="white_card card_height_100 mb_30">
    <div class="white_card_header">
        <div class="profile-index">

    
    

    <div class="row">
<div class="col-md-5"><?= $form->field($model, 'fullname')->textInput(['value' => $model->user->fullname])->label('Client Name')?></div>

<div class="col-md-3">
<?= $form->field($model, 'email')->textInput(['value' => $model->user->email]) ?>
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
</div>

 <div class="form-group">
    <?= Html::submitButton('<span class="fa fa-save"></span>  Save Profile', ['class' => 'btn btn-primary']) ?>
</div>
            
            
      <?php ActiveForm::end(); ?>