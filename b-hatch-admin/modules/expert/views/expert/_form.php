<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\expert\models\Expert */
/* @var $form yii\widgets\ActiveForm */
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
                        <div class="col-md-10">
                            <?= $form->field($model, 'expert_type')->dropDownList($model->expertType()) ?>
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
