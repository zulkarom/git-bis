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

<p>
    <?= Html::a('Add Portfolio Image', ['/website/portfolio/create'], ['class' => 'btn btn-success']) ?>
</p>
<br/>

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
                        'label' => 'Image Url',
                        'value' => function($model){
                            return $model->image_url;
                        }
                    ],
                    [
                        'format' => 'html',
                        'label' => 'Image',
                        'value' => function($model){
                            if($model->image_file){
                                return '<img src="'.Url::to(['/website/portfolio/portfolio-image', 'id' => $model->id]).'" width="90" height="90">';
                            }else{
                                return "";
                            }
                        }
                    ],
                    [
                        'format' => 'html',
                        'label' => 'Image Hover',
                        'value' => function($model){
                            if($model->image_file_hover){
                                return '<img src="'.Url::to(['/website/portfolio/portfolio-image2', 'id' => $model->id]).'" width="90" height="90">';
                            }else{
                                return "";
                            }
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn',
                        'contentOptions' => ['style' => 'width: 10%'],
                        'template' => '{update} {delete}',
                        //'visible' => false,
                        'buttons'=>[
                            'update'=>function ($url, $model) {
                                return Html::a('<span class="fa fa-edit"></span> UPDATE',['update', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                            },
                            'delete'=>function ($url, $model) {
                                return Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger btn-sm',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this image?',
                                    'method' => 'post',
                                ],
                            ]) 
        ;
                            }
                        ],
                    
                    ], 
                ],
            ]); ?>

        </div>
    </div>
</div>

<?php


// $js = "function ajaxSubmit(element){
//     $.ajax({url: '".Url::to(['/website/portfolio/ajax'])."', 
//     timeout: 1000,     // timeout milliseconds
//     type: 'POST',  // http method
//     data: { 
//         image: $('#portfolio-image_file').val(),
//     },
//     success: function(result){
//         $('#result-submit').html(result);
//     },
//     error: function (jqXhr, textStatus, errorMessage) { // error callback 
//         $('#result-submit').append('Error: ' + errorMessage);
//     }
  
  
//   });
// }
// ";

// $this->registerJs($js);

// $this->registerJs("
// $('#btn-run').click(function(){
//     $('#btn-action').val(1);
//     if(confirm('Are you sure to run this autoload?')){
//         ajaxSubmit();
//     }
    
// });
// ");

?>
