<?php 

use yii\helpers\Url;
use common\widgets\Menu_crypto;
use yii\helpers\Html;

/* 
 * $dirAssests mixed
 *  */

?> 
<div class="nk-apps-sidebar is-dark">
            <div class="nk-apps-brand">
                <a href="<?=Url::to(['/client/dashboard/index'])?>" class="logo-link">
                    <img class="logo-light logo-img" src="<?=$web?>/dlite/images/mini-logo.png" srcset="<?=$web?>/dlite/images/logo-small2x.png 2x" alt="logo">
                    <img class="logo-dark logo-img" src="<?=$web?>/dlite/images/logo-dark-small.png" srcset="<?=$web?>/dlite/images/logo-dark-small2x.png 2x" alt="logo-dark">
                </a>
            </div>
            <div class="nk-sidebar-element">
                <div class="nk-sidebar-body">
                    <div class="nk-sidebar-content" data-simplebar>
                        <div class="nk-sidebar-menu">
                            <!-- Menu -->
                            <ul class="nk-menu apps-menu">
                                <li class="nk-menu-item">
                                    <a href="<?=Url::to(['/client/dashboard/index'])?>" class="nk-menu-link" title="Dashboard">
                                        <span class="nk-menu-icon"><em class="icon ni ni-template"></em></span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-hr"></li>
                                <li class="nk-menu-item">
                                    <a href="<?=Url::to(['/client/biz-canvas/index'])?>" class="nk-menu-link" title="Business Canvas">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="<?=Url::to(['/client/chat'])?>" class="nk-menu-link" title="Consultation">
                                        <span class="nk-menu-icon"><em class="icon ni ni-chat-circle"></em></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                       
                        <div class="dropdown-menu dropdown-menu-md m-1 nk-sidebar-profile-dropdown" data-content="profileDD">
                            <div class="dropdown-inner user-card-wrap d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>AB</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">Abu Bin Ishtiyak</span>
                                        <span class="sub-text text-soft">info@softnio.com</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?=Url::to(['/client/profile/index'])?>"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?=Url::to(['/site/logout', 'data-method' => 'post'])?>"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>