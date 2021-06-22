<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use dektrium\user\models\LoginForm;
use yii\helpers\Html;
use yii\helpers\Url;

//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/views/myasset');

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module $module
 */

$this->title = 'Briged Gayong';
$this->params['breadcrumbs'][] = $this->title;



$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];


?>
<style type="text/css">
    
    .scroll {
    overflow-y: auto;
}

</style>
<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>


                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                    'validateOnType' => false,
                    'validateOnChange' => false,
                ]) ?>
				
				
				<div class="admin-form theme-info scroll" id="login1" style="position: fixed;
    top: 0px;
    right: 0px;
    width: 300px;
    height: 100%;
    margin-top: 0px;
    background-color: #fff;">

		
			
		<div class="panel panel-info mt10 br-n" style="box-shadow: none">
		

			<a href="<?=Url::to(['/../home'])?>"><img src="<?= $directoryAsset ?>/img/login.png" title="Briged Gayong" class="img-responsive " style="width:65%;margin:auto"></a>
            <font size="4px"><center><b>LOGIN</b></center></font>
			<!-- end .form-header section -->
			
				<div class="panel-body bg-light p30">
					<div class="row">
						<div class="col-sm-12 pr30">
														<div class="section">

				

<?php 
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='fa fa-credit-card form-control-feedback'></span>"
];
?>

<?= $form->field($model, 'role', [
                        'inputOptions' => [
                            'autofocus' => 'autofocus',
                            'class' => 'form-control',
                            'tabindex' => '1']])->dropDownList([1 => 'KADET', 2 => 'PEGAWAI', 3 => 'JURULATIH & GURULATIH', 4 => 'ANAK GAYONG'])->label('LOGIN SEBAGAI',['class'=>'field-label text-muted mb10']);
                    ?>

               <?=$form->field($model, 'login',
                        $fieldOptions1)
						->label('NO KAD PENGENALAN',['class'=>'field-label text-muted mb10'])
            ->textInput(['placeholder' => 'No. Kad Pengenalan'])
                    ;
                    ?>
					
					</div>
							<div class="section">


				
                    <?= $form->field(
                        $model,
                        'password',
                        $fieldOptions2)
                        ->passwordInput(['placeholder' => 'Kata Laluan'])
                         ->label('KATA LALUAN',['class'=>'field-label text-muted mb10'])
                           
                         ?>

                <?php /// $form->field($model, 'rememberMe')->checkbox(['tabindex' => '3']) ?>
				
				</div>
				</div>
				</div>
							<!-- end section -->
							
				<div class="panel-footer clearfix p10 ph15">
                                

                                <?= Html::submitButton(
                    Yii::t('user', 'LOG MASUK'),
                    ['class' => 'button btn-primary mr10 pull-right', 'tabindex' => '4']
                ) ?>
	
	
	
				</div>

                

                <?php ActiveForm::end(); ?>
				<br />
         <div class="panel-footer clearfix p10 ph15">
        
        <?php if ($module->enableRegistration): ?>
            <p class="text-center">
                <?= Html::a('DAFTAR', ['/user-register/register'], ['class' => 'field-label text-muted mb10']) ?>
            </p>
        <?php endif ?>
		
		<?php if ($module->enablePasswordRecovery): ?>
            <p class="text-center">
                <?= Html::a('LUPA KATA LALUAN',
                           ['/user/recovery/request'],['class' => 'field-label text-muted mb10', 'tabindex' => '5']
                                ) ?>
            </p>
        <?php endif ?>
		
		<?php if ($module->enableConfirmation): ?>
            <p class="text-center">
                <?= Html::a('HANTAR KEMBALI EMAIL PENGESAHAN', ['/user/registration/resend'],['class' => 'field-label text-muted mb10', 'tabindex' => '6']) ?>
            </p>
        <?php endif ?>
		
		
		  <p class="text-center">
                <?= Html::a('KEMBALI HALAMAN UTAMA', ['/../home'],['class' => 'field-label text-muted mb10', 'tabindex' => '6']) ?>
            </p>
		
		
        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>
		
		</div>
		
				</div>
			
		</div>



<!-- $this->registerJs('
	$("#login-form-role").change(function(){
		var val = $(this).val();
		if(val == 1){
			window.location.href = "'. Yii::$app->params["login-frontend"] .'";
		}else if(val == 2){
			window.location.href = "'. Yii::$app->params["login-pegawai"] .'";
		}
		
	});


'); -->
