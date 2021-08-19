<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\expert\models\ExpertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultation';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="row">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'itemView' => function($model) use ($dirAssests){
            ?>
            
            <div class="col-md-12">
                        
                <div class="row el-element-overlay">
                    
                          
                                <a href="<?=Url::to(['/chat/', 'id' => $model->expert_id])?>">
                                <div class="col-md-2 col-lg-2 col-xl-2 box-col-2">
                                  <div class="card custom-card">
                                    <div class="card-header"><img class="img-fluid" src="<?=$dirAssests?>/img/profilebox/2.jpg" alt="" data-original-title="" title=""></div>
                                    <div class="card-profile"><img class="rounded-circle" src="<?=Url::to(['/client/profile/expert-image', 'id' => $model->expert->user->id])?>" alt="" data-original-title="" title=""></div>
                                    <div class="text-center profile-details">
                                      <h4><?=$model->expert->user->fullname?></h4>
                                      <h6><?=$model->expert->expertText?></h6>
                                    </div>
                                  </div>
                              </div>
                              </a>

                    
                </div>

            </div>
            
            
            <?php
        }
    ]); ?>
  </div>

