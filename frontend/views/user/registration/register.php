<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\models\Common;


$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@backend/assets/frontLogin');

$this->title = 'Sign Up Form by Hatchniaga';
$this->params['breadcrumbs'][] = $this->title;

?>

<style type="text/css">
.loginhere {
    margin-top: 31px !important ;
}
h2 {
    font-size: 16px !important;
    margin-bottom: 15px !important;
    margin-top: 15px !important;
}
.signup-content {
    padding: 25px 85px !important;
}
</style>


<div class="main">

    <section class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content">

                <?php $form = ActiveForm::begin([
                    'id' => 'signup-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                    'validateOnType' => false,
                    'validateOnChange' => false,
                ]); ?>
                <center><img src="<?= $directoryAsset ?>/pictures/logo-top.png" title="Hatchniaga" class="img-responsive " style="width:55%;margin:auto"></center>
                    <h2 class="form-title">Create account</h2>
                        <?= $form
			            ->field($model, 'role')
			            ->dropDownList(Common::role(), ['prompt' => 'Select User Category', 'class' => 'form-input'])
			            ->label(false)
			           ?>
                        <?= $form
				            ->field($model, 'username')
				            ->label(false)
				            ->textInput(['placeholder' => 'Your Email', 'class' => 'form-input']) 
				         ?>
                        <?= $form
				            ->field($model, 'fullname')
				            ->label(false)
				            ->textInput(['placeholder' => 'Your Name', 'class' => 'form-input']) 
				        ?>
                        <?= $form
							->field($model, 'password')
							->label(false)
							->passwordInput(['placeholder' => 'Password', 'class' => 'form-input'])
						?>
                        <?= $form
							->field($model, 'password_repeat')
							->label(false)
							->passwordInput(['placeholder' => 'Repeat your password', 'class' => 'form-input']) 
						?>
                        <!-- <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"></span></span>I agree all statements in  <a href="#" class="term-service"><u>Terms of service</u></a></label> -->

                        <?= Html::submitButton('Sign up', ['class' => 'form-submit', 'name' => 'submit']) ?>
                   
                     
                
                <p class="loginhere">
                    Already have an account ? <?= Html::a('Login here', ['/user/security/login'], ['class' => 'loginhere-link']) ?>
                </p>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </section>

</div>
