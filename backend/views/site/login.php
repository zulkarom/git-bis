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
                    <h5 class="modal-title text_white">Sign in to start your session</h5>
                </div>
                <div class="modal-body">
                  <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
                    
                        <div class="form-group">
                             <?= $form
                              ->field($model, 'username', ['addon' => ['append' => ['content'=>'<i class="fa fa-user"></i>']]])
                              ->label(false)
                              ->textInput(['class' => 'form-control', 'placeholder' => $model->getAttributeLabel('username')]) ?>
                        </div>
                            <?= $form
                            ->field($model, 'password', ['addon' => ['append' => ['content'=>'<i class="fa fa-lock"></i>']]])
                            ->label(false)
                            ->passwordInput(['class' => 'form-group', 'placeholder' => $model->getAttributeLabel('password')]) ?>
                     



                         <?= Html::submitButton('Sign in', ['class' => 'btn_1 full_width text-center', 'name' => 'login-button']) ?>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>