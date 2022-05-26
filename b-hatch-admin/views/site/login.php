<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\Common;

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

<br/><br/><br/><br/><br/><br/>
<div class="main">

    <section class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content">

                <?php $form = ActiveForm::begin(); ?>
                <center><img src="<?= $directoryAsset ?>/pictures/logo-top.png" title="Bisnet" class="img-responsive " style="width:55%;margin:auto"></center>
                    <h2 class="form-title">Admin Login</h2>
                        <?= $form
                            ->field($model, 'username')
                            ->label(false)
                            ->textInput(['placeholder' => 'Your Username', 'class' => 'form-input']) 
                         ?>
                        <?= $form
                            ->field($model, 'password')
                            ->label(false)
                            ->passwordInput(['placeholder' => 'Password', 'class' => 'form-input'])
                        ?>

                        <?= Html::submitButton('Sign in', ['class' => 'form-submit', 'name' => 'submit']) ?>
                   
                     <?php ActiveForm::end(); ?>
                
                <br/>
            </div>
        </div>
        <br/><br/><br/><br/><br/>
    </section>

</div>
