<?php

use yii\helpers\Html;
use yii\grid\GridView;
use karpoff\icrop\CropImageUpload; 
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\website\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portfolio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">
        <div class="portfolio-form">

            
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'image_url')->widget(CropImageUpload::className()) ?>

                <div class="form-group">
                    <button type="button" class="btn btn-success" id="btn-run"><span class="fa fa-plus"></span>Add Image</button>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>


<div class="card">
    <div class="card-body">
       <!--  <div class="card-header"><b>List of Portfolio Image</b></div> -->
        <div class="portfolio-index">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'format' => 'html',
                        'label' => 'Name',
                        'value' => function($model){
                            return $model->image_url;
                        }
                    ],
                    [
                        'format' => 'html',
                        'label' => 'Image',
                        'value' => function($model){
                            return '';
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width: 10%'],
                        'template' => '{update}',
                        //'visible' => false,
                        'buttons'=>[
                            'update'=>function ($url, $model) {
                                return Html::a('<span class="fa fa-edit"></span> UPDATE',['update', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                            }
                        ],
                    
                    ], 
                ],
            ]); ?>

        </div>
    </div>
</div>

<?php


$js = "function ajaxSubmit(element){
    $.ajax({url: '".Url::to(['/website/portfolio/ajax'])."', 
    timeout: 1000,     // timeout milliseconds
    type: 'POST',  // http method
    data: { 
        image: $('#portfolio-image_url').val(),
    },
    success: function(result){
        $('#result-submit').html(result);
    },
    error: function (jqXhr, textStatus, errorMessage) { // error callback 
        $('#result-submit').append('Error: ' + errorMessage);
    }
  
  
  });
}
";

$this->registerJs($js);

$this->registerJs("
$('#btn-run').click(function(){
    $('#btn-action').val(1);
    if(confirm('Are you sure to run this autoload?')){
        ajaxSubmit();
    }
    
});
");

?>
