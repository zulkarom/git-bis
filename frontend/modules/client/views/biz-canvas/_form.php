<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BcKeyParner */
/* @var $form yii\widgets\ActiveForm */
?>


<?php Pjax::begin() ?>
    <?php $form = ActiveForm::begin(['id' => 'form-' . $cat, 'options' => ['data-pjax' => true]]); ?>

    <?= $form->field($model, 'title')->textInput()->label('Title') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>




<div class="form-group highlight-addon field-bckeyactivity-color required">
<label class="has-star pt-0">Color</label>
<br />
<?php  
$colors = ['blue' => 'Blue' , 'green' => 'Green', 'yellow' => 'Yellow', 'red' => 'Red', 'grey' => 'Grey'];

foreach($colors as $key => $color){
    if($model->isNewRecord){
        $model->color = 'yellow';
    }
    $check = $key == $model->color ? 'checked' : '';

    $nnn = $model->formName();
    echo '
<input type="radio" name="'.$nnn.'[color]" id="'.$key.'" value="'.$key.'" '.$check.' />
<label for="'.$key.'"><span class="'.$key.'"></span></label>

';
}

?>


<div class="help-block invalid-feedback"></div>

</div>
    


    
    <br/>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php Pjax::end() ?>


