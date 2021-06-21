<?php

use yii\helpers\Html;
// use yii\bootstrap\ActiveForm;
use kartik\widgets\ActiveForm;

$this->title = 'Sign In';

$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/adminpress');
$fieldOptions1 = [
    'options' => ['class' => 'input-group mb-3'],
    'inputTemplate' => "{input}
            <div class='input-group-text'>
              <span class='fa fa-user'></span>
            </div>
          </div>"
];

$fieldOptions2 = [
    'options' => ['class' => 'input-group mb-3'],
    'inputTemplate' => "{input}<div class='input-group-append'>
            <div class='input-group-text'>
              <span class='fa fa-lock'></span>
            </div>
          </div>"
];
?>

<div class="login-box">
    <div class="login-logo">
      <br/><br/>
    <img src="<?= $dirAssests?>/images/logo-invoice.png" alt="AlMukhlisin">
        
  </div>
    <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">frontend LOGIN</p>

		
				<?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                   /*  'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                    'validateOnType' => false,
                    'validateOnChange' => false, */
                ]) ?>
				
		
        <?= $form
            ->field($model, 'username', ['addon' => ['append' => ['content'=>'<i class="fa fa-user"></i>']]])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', ['addon' => ['append' => ['content'=>'<i class="fa fa-lock"></i>']]])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-8">
                <?= $form->field($model, 'rememberMe')->checkbox()->label('Remember Me') ?>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-info btn-block', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

		<?php if ($module->enablePasswordRecovery): ?>
            <p class="text-center">
                <?= Html::a('FORGOT PASSWORD',['/user/recovery/request']) ?>
            </p>
        <?php endif ?>
		



    </div></div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->


