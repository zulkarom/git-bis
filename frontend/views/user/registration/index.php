<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\models\Common;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/views/myasset');

$this->title = 'Briged Gayong';
$this->params['breadcrumbs'][] = $this->title;


$fieldOptionsRole = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptionsUsername = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

?>

<style type="text/css">
    
    .scroll {
    overflow-y: auto;
}

</style>




 <?php $form = ActiveForm::begin()?>
				
<div class="admin-form theme-info scroll" id="login1" style="position: fixed;
    top: 0px;
    right: 0px;
    width: 300px;
    height: 100%;
    margin-top: 0px;
    background-color: #fff;">

		
			
		<div class="panel panel-info mt10 br-n" style="box-shadow: none">
		

			<a href="<?=Url::to(['/../home'])?>"><img src="<?= $directoryAsset ?>/img/logo_transparent.png" title="E-FASI" class="img-responsive " style="width:65%;margin:auto"></a>
			<font size="4px"><center><b>PENDAFTARAN</b></center></font>
			<!-- end .form-header section -->
			
				<div class="panel-body bg-light p30">
					<div class="row">
						<div class="col-sm-12 pr30">
														<div class="section">
				<?= $form
            ->field($model, 'role')
            ->dropDownList(Common::role(), ['prompt' => 'Pilih Kategori Pengguna' ])
            ->label(false)?>
			</div>

							<div class="section">

                <?= $form
				->field($model, 'username')
				->label(false)
				->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>
				</div>

				</div>
				</div>
			
			<div class="panel-footer clearfix p10 ph15">

                
                    <?= Html::submitButton('Next', ['class' => 'button btn-primary mr10 pull-right', 'name' => 'signup-button']) ?>
                </div>
				
				
				

            <?php ActiveForm::end(); ?>
			
			
         <div class="panel-footer clearfix p10 ph15">
		 <p>
                <?= Html::a('HALAMAN LOG MASUK',
                           ['/user/login'],['class' => 'field-label text-muted mb10 pull-right', 'tabindex' => '5']
                                ) ?>
            </p>
            <p>
                <?= Html::a('KEMBALI HALAMAN UTAMA',
                           ['/../home'],['class' => 'field-label text-muted mb10 pull-right', 'tabindex' => '5']
                                ) ?>
            </p>
		 </div>
			
			</div>
			
		</div>
