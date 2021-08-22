<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Recover your password');
$this->params['breadcrumbs'][] = $this->title;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@backend/assets/frontLogin');
?>

         
<style type="text/css">
h2 {
    font-size: 16px !important;
    margin-bottom: 15px !important;
    margin-top: 15px !important;
}
/*.signup-content {
    padding: 25px 85px !important;
}*/
</style>
               
 <br/><br/><br/><br/><br/><br/><br/>       
<div class="main">

    <section class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content">
<center><img src="<?= $directoryAsset ?>/pictures/logo-top.png" title="Hatchniaga" class="img-responsive " style="width:55%;margin:auto"></center>
  <h2 class="form-title">RESET PASSWORD</h2>
  

        
         <?php $form = ActiveForm::begin([
                    'id' => 'password-recovery-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                ]); ?>
             <?= $form
                ->field($model, 'email')
                ->label(false)
                ->textInput(['placeholder' => 'Your Email', 'class' => 'form-input']) 
             ?>

          <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'form-submit', 'name' => 'submit']) ?><br>
    <?php ActiveForm::end(); ?>
        


    <!-- ################################################################################################ -->
    <!-- / main body -->

 </div>
        </div>
         <br/><br/><br/><br/><br/><br/><br/><br/>
    </section>

</div>