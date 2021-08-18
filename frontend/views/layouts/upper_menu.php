<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>


<div class="container-fluid no-gutters">
        <div class="row">
            <div class="col-lg-12 p-0 ">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="line_icon open_miniSide d-none d-lg-block">
                        <img src="<?= $dirAssests?>/img/line_img.png" alt="">
                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">
                            <li>
                                <a class="CHATBOX_open nav-link-notify" href="#"> <img src="<?= $dirAssests?>/img/icon/msg.svg" alt="">   </a>
                            </li>
                            <li>
                                <a class="bell_notification_clicker nav-link-notify" href="#"> <img src="<?= $dirAssests?>/img/icon/bell.svg" alt="">
                                    <!-- <span>2</span> -->
                                </a>
                                <!-- Menu_NOtification_Wrap  -->
                            
                            </li>
                            
                        </div>
                        <div class="profile_info d-flex align-items-center">
                            <div class="profile_thumb mr_20">
                                <img src="<?=Url::to(['/client/profile/profile-image', 'id' => Yii::$app->user->identity->id])?>" alt="#">
                            </div>
                            <div class="author_name">
                                <h4 class="f_s_15 f_w_500 mb-0"><?=Yii::$app->user->identity->fullname?></h4>
                                <p class="f_s_12 f_w_400">Client</p>
                            </div>
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <h5><?=Yii::$app->user->identity->fullname?></h5>
                                </div>
                                <div class="profile_info_details">
                                    <?= Html::a('My Profile',['/client/profile/index']) ?>
                                    <a href="#">Settings</a>
                                    <?= Html::a('Log Out',['/site/logout'],['data-method' => 'post']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>