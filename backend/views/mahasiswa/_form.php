<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Mahasiswa */
/* @var $form yii\widgets\ActiveForm */

?>


<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'jantina')->radioList(array('Lelaki'=>'Lelaki','Perempuan'=>'Perempuan')); ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'kelas')->dropDownList(
			['Kelas A' => 'Kelas A', 'Kelas B' => 'Kelas B', 'Kelas C' => 'Kelas C']
			); ?>

    <!-- <?= $form->field($model, 'subjek')->textInput(['maxlength' => true]) ?> -->

 
 

    
    <?= $form->field($model, 'jenis_pembelajaran')->checkboxList(['Kelas Online' => 'Kelas Online',
         'Kelas Harian' => 'Kelas Harian']) ?>
    <?= $form->field($model, 'filedoc')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
