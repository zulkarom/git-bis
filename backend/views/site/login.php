<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
?>

  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
    <div class="row justify-content-center">
      
        <div class="col-lg-6">
            <!-- sign_in  -->
            <div class="modal-content cs_modal">
                <div class="modal-header justify-content-center theme_bg_1">
                    <h5 class="modal-title text_white">Log in</h5>
                </div>
                <div class="modal-body">
                  <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
                    
                        <div class="form-group">
                             <?= $form
                              ->field($model, 'username')
                              ->label(false)
                              ->textInput(['class' => 'form-control', 'placeholder' => 'Enter your username']) ?>
                        </div>
                            <?= $form
                            ->field($model, 'password')
                            ->label(false)
                            ->passwordInput(['class' => 'form-group', 'placeholder' => $model->getAttributeLabel('password')]) ?>
                     



                         <?= Html::submitButton('Sign in', ['class' => 'btn_1 full_width text-center', 'name' => 'login-button']) ?>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>