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
/* @var $form ActiveForm */
?>



<div class="row">
    <div class="col-12">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            
        <div class="card">
            <div class="card-body">
                <div class="profile-index">

                    <div class="row">
                        <div class="col-md-5">
                            <?= $form->field($modelUser, 'fullname')->textInput() ?>
                        </div>

                        <div class="col-md-5">
                            <?= $form->field($modelUser, 'email')->textInput() ?>
                         </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5"><?= $form->field($model, 'biz_name')->textInput()?></div>

                        <div class="col-md-5">
                        <?= $form->field($model, 'biz_type')->textInput() ?>
                         </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'biz_phone')->textInput() ?>
                        </div>

                        <div class="col-md-3">
                        <?= $form->field($model, 'biz_fax')->textInput() ?>
                         </div>

                         <div class="col-md-4">
                        <?= $form->field($model, 'biz_email')->textInput() ?>
                         </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <?= $form->field($model, 'biz_main_activity')->textInput() ?>
                        </div>

                        <div class="col-md-3">
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
                            <div class="col-md-10">
                                <?= $form->field($model, 'biz_address')->textArea(['rows' => '3']) ?>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-10">
                            <?php if($modelUser->id): ?>
                               <?= $form->field($modelUser, 'rawPassword')->passwordInput(['maxlength' => true])->label('Reset Password (leave blank if no change)') ?>
                            <?php else: ?>
                               <?= $form->field($modelUser, 'rawPassword')->passwordInput(['maxlength' => true])->label('Password') ?> 
                           <?php endif; ?>
                       </div>
                   </div>                
                        
                </div>
            </div>
        </div>
        <br/>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
            
        <?php ActiveForm::end(); ?>
    </div>
</div>