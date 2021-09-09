<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\chat\models\ChatTopicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chat Topics';
$this->params['breadcrumbs'][] = $this->title;
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/crypto');
?>
<div class="chat-topic-index">
<div class="row">
    
    <div class="col-md-3">
    
    <?php  
    
    echo '  <div class="container-fluid">
              
          <div class="card custom-card">
            <div class="card-header"><img class="img-fluid" src="'.$dirAssests.'/img/profilebox/2.jpg" alt="" data-original-title="" title=""></div>
            <div class="card-profile"><img class="rounded-circle" src="'. Url::to(['/client/profile/expert-image', 'id' => $expert->user->id]) .'" alt="" data-original-title="" title=""></div>
            <div class="text-center profile-details">
              <h4>'.$expert->user->fullname.'</h4>
              <h6>'.$expert->expertText.'</h6>
          
      </div> </div> </div>
      ';
    
    ?>
    
    </div>
    <div class="col-md-9">
    <p>
        <?= Html::a('Create Chat Topic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'topic',

            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 10%'],
                'template' => '{view}',
                //'visible' => false,
                'buttons'=>[
                    'view'=>function ($url, $model) use ($expert) {
                        return Html::a('View',['/chat/', 'id' => $expert->id, 'tid' => $model->id],['class'=>'btn btn-primary btn-sm']);
                    }
                ],
            
            ],
        ],
    ]); ?>
</div>


</div>
