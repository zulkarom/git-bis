<?php
use yii\helpers\Html;
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
                <a href="<?=Url::to(['/expert/dashboard/index'])?>">
                    <img src="<?= $dirAssests?>/logo/mini-logo<?=Yii::$app->params['extension']?>.png" width="100%" alt="logo">
                </a>
            </div>
            <div class="nk-header-app-info">
                <a href="<?=Url::to(['/expert/dashboard/index'])?>">
                    <span class="sub-text">Hatchniaga</span>
                    <span class="lead-text">Dashboard</span>
                </a>
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
                    </li>
                    <!-- .nk-menu-item -->
                </ul>
                <!-- Menu -->
            </div>
        </div>
        <div class="nk-header-tools">
            <ul class="nk-quick-nav">
                <li class="dropdown hide-mb-sm">
                    <a data-bs-toggle="modal" href="javascript:void(0)" class="nk-quick-nav-icon"><em class="icon ni ni-globe"></em></a>
                </li>
                <li class="dropdown chats-dropdown hide-mb-sm">
                    <a href="javascript:void(0)" class="dropdown-toggle nk-quick-nav-icon">
                        <div class="icon-status icon-status-na"><em class="icon ni ni-comments"></em></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                        <div class="dropdown-head">
                            <span class="sub-title nk-dropdown-title">Recent Chats</span>
                            <a href="#">Setting</a>
                        </div>
                        <div class="dropdown-body">
                            <ul class="chat-list">
                                <li class="chat-item">
                                    <a class="chat-link" href="html/apps/chats.html">
                                        <div class="chat-media user-avatar">
                                            <span>IH</span>
                                            <span class="status dot dot-lg dot-gray"></span>
                                        </div>
                                        <div class="chat-info">
                                            <div class="chat-from">
                                                <div class="name">Iliash Hossain</div>
                                                <span class="time">Now</span>
                                            </div>
                                            <div class="chat-context">
                                                <div class="text">You: Please confrim if you got my last messages.</div>
                                                <div class="status delivered">
                                                    <em class="icon ni ni-check-circle-fill"></em>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- .chat-item -->
                                <li class="chat-item is-unread">
                                    <a class="chat-link" href="html/apps/chats.html">
                                        <div class="chat-media user-avatar bg-pink">
                                            <span>AB</span>
                                            <span class="status dot dot-lg dot-success"></span>
                                        </div>
                                        <div class="chat-info">
                                            <div class="chat-from">
                                                <div class="name"><?=Yii::$app->user->identity->fullname?></div>
                                                <span class="time">4:49 AM</span>
                                            </div>
                                            <div class="chat-context">
                                                <div class="text">Hi, I am Ishtiyak, can you help me with this problem ?</div>
                                                <div class="status unread">
                                                    <em class="icon ni ni-bullet-fill"></em>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- .chat-item -->
                                <li class="chat-item">
                                    <a class="chat-link" href="html/apps/chats.html">
                                        <div class="chat-media user-avatar">
                                            <img src="<?= $dirAssests?>/images/avatar/b-sm.jpg" alt="">
                                        </div>
                                        <div class="chat-info">
                                            <div class="chat-from">
                                                <div class="name">George Philips</div>
                                                <span class="time">6 Apr</span>
                                            </div>
                                            <div class="chat-context">
                                                <div class="text">Have you seens the claim from Rose?</div>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- .chat-item -->
                                <li class="chat-item">
                                    <a class="chat-link" href="html/apps/chats.html">
                                        <div class="chat-media user-avatar user-avatar-multiple">
                                            <div class="user-avatar">
                                                <img src="<?= $dirAssests?>/images/avatar/c-sm.jpg" alt="">
                                            </div>
                                            <div class="user-avatar">
                                                <span>AB</span>
                                            </div>
                                        </div>
                                        <div class="chat-info">
                                            <div class="chat-from">
                                                <div class="name">Softnio Group</div>
                                                <span class="time">27 Mar</span>
                                            </div>
                                            <div class="chat-context">
                                                <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                <div class="status sent">
                                                    <em class="icon ni ni-check-circle"></em>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- .chat-item -->
                                <li class="chat-item">
                                    <a class="chat-link" href="html/apps/chats.html">
                                        <div class="chat-media user-avatar">
                                            <img src="<?= $dirAssests?>/images/avatar/a-sm.jpg" alt="">
                                            <span class="status dot dot-lg dot-success"></span>
                                        </div>
                                        <div class="chat-info">
                                            <div class="chat-from">
                                                <div class="name">Larry Hughes</div>
                                                <span class="time">3 Apr</span>
                                            </div>
                                            <div class="chat-context">
                                                <div class="text">Hi Frank! How is you doing?</div>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- .chat-item -->
                                <li class="chat-item">
                                    <a class="chat-link" href="html/apps/chats.html">
                                        <div class="chat-media user-avatar bg-purple">
                                            <span>TW</span>
                                        </div>
                                        <div class="chat-info">
                                            <div class="chat-from">
                                                <div class="name">Tammy Wilson</div>
                                                <span class="time">27 Mar</span>
                                            </div>
                                            <div class="chat-context">
                                                <div class="text">You: I just bought a new computer but i am having some problem</div>
                                                <div class="status sent">
                                                    <em class="icon ni ni-check-circle"></em>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- .chat-item -->
                            </ul><!-- .chat-list -->
                        </div><!-- .nk-dropdown-body -->
                        <div class="dropdown-foot center">
                            <a href="html/chats.html">View All</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown notification-dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle nk-quick-nav-icon">
                        <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                        <div class="dropdown-head">
                            <span class="sub-title nk-dropdown-title">Notifications</span>
                            <a href="#">Mark All as Read</a>
                        </div>
                        <div class="dropdown-body">
                            <div class="nk-notification">
                                <div class="nk-notification-item dropdown-inner">
                                    <div class="nk-notification-icon">
                                        <em class="icon icon-circle bg-primary-dim ni ni-share"></em>
                                    </div>
                                    <div class="nk-notification-content">
                                        <div class="nk-notification-text">Iliash shared <span>Dashlite-v2</span> with you.</div>
                                        <div class="nk-notification-time">Just now</div>
                                    </div>
                                </div>
                                <div class="nk-notification-item dropdown-inner">
                                    <div class="nk-notification-icon">
                                        <em class="icon icon-circle bg-info-dim ni ni-edit"></em>
                                    </div>
                                    <div class="nk-notification-content">
                                        <div class="nk-notification-text">Iliash <span>invited</span> you to edit <span>DashLite</span> folder</div>
                                        <div class="nk-notification-time">2 hrs ago</div>
                                    </div>
                                </div>
                                <div class="nk-notification-item dropdown-inner">
                                    <div class="nk-notification-icon">
                                        <em class="icon icon-circle bg-primary-dim ni ni-share"></em>
                                    </div>
                                    <div class="nk-notification-content">
                                        <div class="nk-notification-text">You have shared <span>project v2</span> with Parvez.</div>
                                        <div class="nk-notification-time">7 days ago</div>
                                    </div>
                                </div>
                                <div class="nk-notification-item dropdown-inner">
                                    <div class="nk-notification-icon">
                                        <em class="icon icon-circle bg-success-dim ni ni-spark"></em>
                                    </div>
                                    <div class="nk-notification-content">
                                        <div class="nk-notification-text">Your <span>Subscription</span> renew successfully.</div>
                                        <div class="nk-notification-time">2 month ago</div>
                                    </div>
                                </div>
                            </div><!-- .nk-notification -->
                        </div><!-- .nk-dropdown-body -->
                        <div class="dropdown-foot center">
                            <a href="#">View All</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown list-apps-dropdown d-lg-none">
                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                        <div class="icon-status icon-status-na"><em class="icon ni ni-menu-circled"></em></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        <div class="dropdown-body">
                            <ul class="list-apps">
                                <li>
                                    <a href="<?=Url::to(['/expert/dashboard/index'])?>">
                                        <span class="list-apps-media"><em class="icon ni ni-dashlite bg-primary text-white"></em></span>
                                        <span class="list-apps-title">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=Url::to(['/expert/profile/index'])?>">
                                        <span class="list-apps-media"><em class="icon ni ni-chat-circle bg-info-dim"></em></span>
                                        <span class="list-apps-title">Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=Url::to(['/expert/biz-canvas/index'])?>">
                                        <span class="list-apps-media"><em class="icon ni ni-inbox bg-purple-dim"></em></span>
                                        <span class="list-apps-title">Biz Canvas</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=Url::to(['/expert/chat/index'])?>">
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
                            <img class="icon" src="<?= $dirAssests?>/images/flags/english-sq.png" alt="">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                        <ul class="language-list">
                            <li>
                                <a href="#" class="language-item">
                                    <img src="<?= $dirAssests?>/images/flags/english.png" alt="" class="language-flag">
                                    <span class="language-name">English</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="language-item">
                                    <img src="<?= $dirAssests?>/images/flags/spanish.png" alt="" class="language-flag">
                                    <span class="language-name">Espa??ol</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="language-item">
                                    <img src="<?= $dirAssests?>/images/flags/french.png" alt="" class="language-flag">
                                    <span class="language-name">Fran??ais</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="language-item">
                                    <img src="<?= $dirAssests?>/images/flags/turkey.png" alt="" class="language-flag">
                                    <span class="language-name">T??rk??e</span>
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
                                <li><a href="<?=Url::to(['/site/logout', 'data-method' => 'post'])?>"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        </div>
        </div>
        </div>