<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\expert\models\ExpertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultation';
$this->params['breadcrumbs'][] = $this->title;

$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/crypto');
?>
<div class="expert-index">

  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row el-element-overlay">
                    <?php
                        if($clientExpert){
                            foreach($clientExpert as $clientEx){
                                echo '
                                <a href="'.Url::to(['/chat/', 'id' => $clientEx->expert_id]).'">
                                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                                  <div class="card custom-card">
                                    <div class="card-header"><img class="img-fluid" src="'.$dirAssests.'/img/profilebox/2.jpg" alt="" data-original-title="" title=""></div>
                                    <div class="card-profile"><img class="rounded-circle" src="'.$dirAssests.'/img/profilebox/8.jpg" alt="" data-original-title="" title=""></div>
                                    <div class="text-center profile-details">
                                      <h4>'.$clientEx->expert->user->fullname.'</h4>
                                      <h6>'.$clientEx->expert->expertText.'</h6>
                                    </div>
                                  </div>
                              </div>
                              </a>';
                            }
                        }
                    ?>

                    
                </div>

</div>
