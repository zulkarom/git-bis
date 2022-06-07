<?php
use yii\helpers\Url;
?>

<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
        <div class="nk-menu-trigger d-xl-none ms-n1">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-header-app-name">
            <div class="nk-header-app-logo">
                <img src="<?=$web?>/dlite/images/mini-logo.png" width="100%" alt="logo">
            </div>
            <div class="nk-header-app-info">
                <span class="sub-text"><?=Yii::$app->params['appName']?></span>
                <span class="lead-text">Dashboard</span>
            </div>
        </div>
        <div class="nk-header-menu is-light">
            <div class="nk-header-menu-inner">
                <!-- Menu -->
                <ul class="nk-menu nk-menu-main">
                    <li class="nk-menu-item">
                        <a href="javascript:void(0)" class="nk-menu-link">
                            <span class="nk-menu-text">Overview</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="javascript:void(0)" class="nk-menu-link">
                            <span class="nk-menu-text">Components</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                </ul>
                <!-- Menu -->
            </div>
        </div>
        <div class="nk-header-tools">
            <ul class="nk-quick-nav">


                <li class="dropdown notification-dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle nk-quick-nav-icon">
                        <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                    </a>

                </li>
                <li class="dropdown list-apps-dropdown d-lg-none">
                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                        <div class="icon-status icon-status-na"><em class="icon ni ni-menu-circled"></em></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        <div class="dropdown-body">
                            <ul class="list-apps">
                                <li>
                                    <a href="<?=Url::to(['/client/dashboard/index'])?>">
                                        <span class="list-apps-media"><em class="icon ni ni-dashlite bg-primary text-white"></em></span>
                                        <span class="list-apps-title">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=Url::to(['/client/profile/index'])?>">
                                        <span class="list-apps-media"><em class="icon ni ni-chat-circle bg-info-dim"></em></span>
                                        <span class="list-apps-title">Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=Url::to(['/client/biz-canvas/index'])?>">
                                        <span class="list-apps-media"><em class="icon ni ni-inbox bg-purple-dim"></em></span>
                                        <span class="list-apps-title">Biz Canvas</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=Url::to(['/client/chat/index'])?>">
                                        <span class="list-apps-media"><em class="icon ni ni-chat bg-success-dim"></em></span>
                                        <span class="list-apps-title">Consultation</span>
                                    </a>
                                </li>
                            </ul>
                        </div><!-- .nk-dropdown-body -->
                    </div>
                </li>
                <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                    <a href="javascript:void(0)" class="dropdown-toggle nk-quick-nav-icon">
                        <div class="quick-icon border border-light">
                            <img class="icon" src="<?=$web?>/dlite/images/flags/english-sq.png" alt="">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                        <ul class="language-list">
                            <li>
                                <a href="#" class="language-item">
                                    <img src="<?=$web?>/dlite/images/flags/english.png" alt="" class="language-flag">
                                    <span class="language-name">English</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="language-item">
                                    <img src="<?=$web?>/dlite/images/flags/spanish.png" alt="" class="language-flag">
                                    <span class="language-name">Español</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="language-item">
                                    <img src="<?=$web?>/dlite/images/flags/french.png" alt="" class="language-flag">
                                    <span class="language-name">Français</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="language-item">
                                    <img src="<?=$web?>/dlite/images/flags/turkey.png" alt="" class="language-flag">
                                    <span class="language-name">Türkçe</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li><!-- .dropdown -->
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                        <div class="user-toggle">
                            <div class="user-avatar sm">
                                <em class="icon ni ni-user-alt"></em>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                            <div class="user-card">
                                <div class="user-avatar">
                                    <span>AB</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text"><?=Yii::$app->user->identity->fullname?></span>
                                    <span class="sub-text"><?=Yii::$app->user->identity->email?></span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="<?=Url::to(['/client/profile/index'])?>"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                            </ul>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="<?=Url::to(['/site/logout','data-method' => 'post'])?>"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        </div>
        </div>
        </div>