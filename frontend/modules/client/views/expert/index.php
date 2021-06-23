<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\expert\models\ExpertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultation';
$this->params['breadcrumbs'][] = $this->title;

$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/adminpress');
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
                                echo'<div class="col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1"> <img src="'.$dirAssests.'/images/users/1.jpg" alt="user" />
                                                <div class="el-overlay">
                                                    <ul class="el-info">
                                                        <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?= $dirAssests?>/images/users/1.jpg"><i class="icon-magnifier"></i></a></li>
                                                        <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="el-card-content">
                                                <h3 class="box-title">'.$clientEx->expert->user->fullname.'</h3> <small>'.$clientEx->expert->expertText.'</small>
                                                <br/> </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                        }
                    ?>

                    
                </div>

</div>
