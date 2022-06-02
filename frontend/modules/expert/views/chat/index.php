<?php
use yii\helpers\Html;;
use yii\helpers\Url;    
use yii\bootstrap4\Modal;
use kartik\select2\Select2;
use backend\models\Expert;
use yii\helpers\ArrayHelper;

$web = Yii::getAlias('@web');

$own_id = Yii::$app->user->identity->id;
$loadUrl = Url::to(['/chat/default/load-message']);
$deleteMsgUrl = Url::to(['/chat/default/delete-message']);
$refreshUrl = Url::to(['/chat/default/refresh-message']);
$createUrl = Url::to(['/chat/default/create-topic']);
$deleteUrl = Url::to(['/chat/default/delete-topic']);
$updateUrl = Url::to(['/chat/default/update-topic']);


$userUrl = Url::to(['/chatExpert/chat/get-list-clients']);
$topicUrl = Url::to(['/chatExpert/chat/get-list-topics']);
$chatUrl = Url::to(['/chatExpert/default/index']);
$canvasUrl = Url::to(['/chatExpert/chat/get-biz-canvas']);
$canvasLinkUrl = Url::to(['/expert/biz-canvas/view', 'id' => '']);
$url = Url::to(['/expert/profile/profile-image', 'id' => '']);
$url2 = Url::to(['/expert/profile/client-image', 'id' => '']);
$dataUrl = Url::to(['/chatExpert/default/send-message']);
?>
                      
<input type="hidden" id="own_id" value="<?=$own_id?>">
<input type="hidden" id="userUrl" value="<?=$userUrl?>">
<input type="hidden" id="topicUrl" value="<?=$topicUrl?>">
<input type="hidden" id="chatUrl" value="<?=$chatUrl?>">
<input type="hidden" id="canvasUrl" value="<?=$canvasUrl?>">
<input type="hidden" id="canvasLinkUrl" value="<?=$canvasLinkUrl?>">
<input type="hidden" id="url" value="<?=$url?>">
<input type="hidden" id="url2" value="<?=$url2?>">
<input type="hidden" id="dataUrl" value="<?=$dataUrl?>">
<input type="hidden" id="loadUrl" value="<?=$loadUrl?>">
<input type="hidden" id="deleteUrl" value="<?=$deleteUrl?>">
<input type="hidden" id="refreshUrl" value="<?=$refreshUrl?>">
<input type="hidden" id="createUrl" value="<?=$createUrl?>">
<input type="hidden" id="deleteMsgUrl" value="<?=$deleteMsgUrl?>">
<input type="hidden" id="updateUrl" value="<?=$updateUrl?>">

<div class="nk-chat">
    <div class="nk-chat-aside ">
        <div class="nk-chat-aside-head">
            <div class="nk-chat-aside-user">
                
                <ul class="nav nav-tabs mt-n3">
                    <li class="nav-item">
                        <a id="a-expert" class="nav-link active" data-bs-toggle="tab" href="#tabItem1">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a id="a-topic" class="nav-link" data-bs-toggle="tab" href="#tabItem2">Topics</a>
                    </li>
                </ul>
                
            </div>
        </div><!-- .nk-chat-aside-head -->
        <div class="tab-content">
            <div class="tab-pane active" id="tabItem1">
                <div class="nk-chat-aside-body" data-simplebar>
                    <div class="nk-chat-aside-search">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-left">
                                    <em class="icon ni ni-search"></em>
                                </div>
                                <input type="text" class="form-control form-round" id="default-03" placeholder="Search by name">
                            </div>
                        </div>
                    </div>
                    <div class="nk-chat-list">
                        <h6 class="title overline-title-alt">Messages</h6>
                        <ul class="chat-list">
                            <div id="current-expert"></div>
                            <div class="list-expert"></div>
                            <!-- .chat-item -->
                        </ul><!-- .chat-list -->
                    </div><!-- .nk-chat-list -->
                </div>
            </div>
            <div class="tab-pane" id="tabItem2">
                <div class="nk-chat-aside-body" data-simplebar>
                    <div class="nk-chat-aside-search">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-left">
                                    <em class="icon ni ni-search"></em>
                                </div>
                                <input type="text" class="form-control form-round" id="default-03" placeholder="Search by name">
                            </div>
                        </div>
                    </div>
                    <div class="nk-chat-list">
                        <h6 class="title overline-title-alt">Messages</h6>
                        <ul class="chat-list">
                            <div id="current-topic"></div>
                            <div class="list-topic"></div>
                            <!-- .chat-item -->
                        </ul><!-- .chat-list -->
                    </div><!-- .nk-chat-list -->
                </div>
            </div>
        </div>
        
    </div><!-- .nk-chat-aside -->
    <div id="group-header" class="nk-chat-body profile-shown" >
        <div class="nk-chat-head">
            <ul class="nk-chat-head-info">
                <li class="nk-chat-body-close">
                    <a href="javascript:void(0)" class="btn btn-icon btn-trigger nk-chat-hide ms-n1"><em class="icon ni ni-arrow-left"></em></a>
                </li>
                <li class="nk-chat-head-user">
                    <div class="user-card">
                        <div class="user-avatar bg-purple">
                            <img src="" alt="" class="exp-profile">
                        </div>
                        <div class="user-info">
                            <div class="lead-text"><span class="lead-name"></span></div>
                            <div class="sub-text"><span class="sub-name d-none d-sm-inline me-1"></span></div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="nk-chat-head-tools">
                <li><a href="#" class="btn btn-icon btn-trigger text-primary"><em class="icon ni ni-call-fill"></em></a></li>
                <li><a href="#" class="btn btn-icon btn-trigger text-primary"><em class="icon ni ni-video-fill"></em></a></li>
                <li class="d-none d-sm-block">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger text-primary" data-bs-toggle="dropdown"><em class="icon ni ni-setting-fill"></em></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <ul class="link-list-opt no-bdr">
                                <li><a class="dropdown-item" href="#"><em class="icon ni ni-archive"></em><span>Make as Archive</span></a></li>
                                <li><a class="dropdown-item" href="#"><em class="icon ni ni-cross-c"></em><span>Remove Conversion</span></a></li>
                                <li><a class="dropdown-item" href="#"><em class="icon ni ni-setting"></em><span>More Options</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="me-n1 me-md-n2"><a href="#" class="btn btn-icon btn-trigger text-primary chat-profile-toggle"><em class="icon ni ni-alert-circle-fill"></em></a></li>
            </ul>
            <div class="nk-chat-head-search">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <div class="form-icon form-icon-left">
                            <em class="icon ni ni-search"></em>
                        </div>
                        <input type="text" class="form-control form-round" id="chat-search" placeholder="Search in Conversation">
                    </div>
                </div>
            </div><!-- .nk-chat-head-search -->
        </div><!-- .nk-chat-head -->
        <div class="nk-chat-panel" data-simplebar>
            <div class="btn-previous-message" align="center">
              
            </div>
            <div class="chat-sap">
                
            </div><!-- .chat-sap -->

            <div id="current-chat-box"></div>
            <div id="chat-box"></div><!-- .chat -->
            
            
            
        </div><!-- .nk-chat-panel -->
        <div class="nk-chat-editor btn-send-message">
            
        </div><!-- .nk-chat-editor -->
        <div class="nk-chat-profile visible" data-simplebar>
            <div class="user-card user-card-s2 my-4">
                <div class="user-avatar md bg-purple">
                    <img src="" alt="" class="exp-profile">
                </div>
                <div class="user-info">
                    <h5><span class="lead-name"></span></h5>
                    <span class="sub-name"></span>
                </div>
                <div class="user-card-menu dropdown">
                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#"><em class="icon ni ni-eye"></em><span>View Profile</span></a></li>
                            <li><a href="#"><em class="icon ni ni-na"></em><span>Block Messages</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="chat-profile">
                <div class="chat-profile-group">
                    <a href="#" class="chat-profile-head" data-bs-toggle="collapse" data-bs-target="#chat-options">
                        <h6 class="title overline-title">Client Details</h6>
                        <span class="indicator-icon"><em class="icon ni ni-chevron-down"></em></span>
                    </a>
                    <div class="chat-profile-body collapse show" id="chat-options">
                        <div class="chat-profile-body-inner">
                            <ul class="chat-profile-options">
                                <li><a class="chat-option-link" href="#"><em class="icon icon-circle bg-light ni ni-edit-alt"></em><span class="company-name"></span></a></li>
                                <li><a class="chat-option-link chat-search-toggle" href="#"><em class="icon icon-circle bg-light ni ni-search"></em><span class="lead-text">Search In Conversation</span></a></li>
                                <li><a class="chat-option-link" href="#"><em class="icon icon-circle bg-light ni ni-circle-fill"></em><span class="lead-text">Change Theme</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .chat-profile-group -->
                <div class="chat-profile-group">
                    <a href="#" class="chat-profile-head" data-bs-toggle="collapse" data-bs-target="#chat-settings">
                        <h6 class="title overline-title">Biz Canvas</h6>
                        <span class="indicator-icon"><em class="icon ni ni-chevron-down"></em></span>
                    </a>
                    <div class="chat-profile-body collapse show" id="chat-settings">
                        <div class="chat-profile-body-inner">
                            <ul class="chat-profile-settings">
                                <div class="biz-canvas"></div>
                            </ul>
                        </div>
                    </div>
                </div><!-- .chat-profile-group -->
                <!-- .chat-profile-group -->
            </div> <!-- .chat-profile -->
        </div><!-- .nk-chat-profile -->
    </div><!-- .nk-chat-body -->
</div><!-- .nk-chat -->