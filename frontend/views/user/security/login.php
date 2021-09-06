<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\models\Common;
use dektrium\user\widgets\Connect;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@backend/assets/frontLogin');

$this->title = 'Sign In Form by Hatchniaga';
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
/*.signup-content {
    padding: 25px 85px !important;
}*/
</style>

<br/><br/>
<div class="main">

    <section class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content">

                <?php $form = ActiveForm::begin(); ?>
                <center><img src="<?= $directoryAsset ?>/pictures/logo-top.png" title="Bisnet" class="img-responsive " style="width:55%;margin:auto"></center>
                    <h2 class="form-title">Login account</h2>
                        <?= $form
                        ->field($model, 'role')
                        ->dropDownList(Common::role(), ['prompt' => 'Select User Category', 'class' => 'form-input'])
                        ->label(false)
                       ?>
                        <?= $form
                            ->field($model, 'login')
                            ->label(false)
                            ->textInput(['placeholder' => 'Your Email', 'class' => 'form-input']) 
                         ?>
                        <?= $form
                            ->field($model, 'password')
                            ->label(false)
                            ->passwordInput(['placeholder' => 'Password', 'class' => 'form-input'])
                        ?>

                        <?= Html::submitButton('Sign in', ['class' => 'form-submit', 'name' => 'submit']) ?>
                   
                     <?php ActiveForm::end(); ?>
                
                <p class="loginhere">
                    Dont have an account ? <?= Html::a('Register here', ['/user/register'], ['class' => 'loginhere-link']) ?>
                    <br/>
                    Forgot password ? <?= Html::a('Click here', ['/user/recovery/request'], ['class' => 'loginhere-link']) ?>
                </p>
                <br/>
            </div>
        </div>
        <br/><br/>
    </section>

</div>

		
		
        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>
