<?php
use backend\modules\expert\models\Expert;
use yii\bootstrap\Html;
use yii\helpers\Url;

$web = Yii::getAlias('@web');

$own_id = Yii::$app->user->identity->id;
$loadUrl = Url::to([
    '/chat/default/load-message'
]);
$deleteMsgUrl = Url::to([
    '/chat/default/delete-message'
]);
$refreshUrl = Url::to([
    '/chat/default/refresh-message'
]);
$createUrl = Url::to([
    '/chat/default/create-topic'
]);
$deleteUrl = Url::to([
    '/chat/default/delete-topic'
]);
$updateUrl = Url::to([
    '/chat/default/update-topic'
]);
$role = Yii::$app->user->identity->role;

if (Yii::$app->user->identity->role == 1) {
    $userUrl = Url::to([
        '/chat/chat-test/get-list-experts'
    ]);
    $topicUrl = Url::to([
        '/chat/chat-test/get-list-topics'
    ]);
    $chatUrl = Url::to([
        '/chat/default/index'
    ]);
    $url = Url::to([
        '/client/profile/profile-image',
        'id' => ''
    ]);
    $url2 = Url::to([
        '/client/profile/expert-image',
        'id' => ''
    ]);
    $dataUrl = Url::to([
        '/chat/default/send-message'
    ]);
} else {
    $userUrl = Url::to([
        '/chatExpert/chat/get-list-clients'
    ]);
    $topicUrl = Url::to([
        '/chatExpert/chat/get-list-topics'
    ]);
    $chatUrl = Url::to([
        '/chatExpert/default/index'
    ]);
    $url = Url::to([
        '/expert/profile/profile-image',
        'id' => ''
    ]);
    $url2 = Url::to([
        '/expert/profile/client-image',
        'id' => ''
    ]);
    $dataUrl = Url::to([
        '/chatExpert/default/send-message'
    ]);
}

?>

<style type="text/css">
   .center {
     margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .loader {
      border: 16px solid #f3f3f3; /* Light grey */
      border-top: 16px solid #3498db; /* Blue */
      border-radius: 50%;
      width: 120px;
      height: 120px;
      animation: spin 2s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

</style>

<input type="hidden" id="own_id" value="<?=$own_id?>">
<input type="hidden" id="role" value="<?=$role?>">
<input type="hidden" id="userUrl" value="<?=$userUrl?>">
<input type="hidden" id="topicUrl" value="<?=$topicUrl?>">
<input type="hidden" id="chatUrl" value="<?=$chatUrl?>">
<input type="hidden" id="url" value="<?=$url?>">
<input type="hidden" id="url2" value="<?=$url2?>">
<input type="hidden" id="dataUrl" value="<?=$dataUrl?>">
<input type="hidden" id="loadUrl" value="<?=$loadUrl?>">
<input type="hidden" id="refreshUrl" value="<?=$refreshUrl?>">
<input type="hidden" id="createUrl" value="<?=$createUrl?>">
<input type="hidden" id="deleteUrl" value="<?=$deleteUrl?>">
<input type="hidden" id="deleteMsgUrl" value="<?=$deleteMsgUrl?>">
<input type="hidden" id="updateUrl" value="<?=$updateUrl?>">


<div class="nk-chat">
    <div class="nk-chat-aside ">
        <div class="nk-chat-aside-head">
            <div class="nk-chat-aside-user">

                <ul class="nav nav-tabs mt-n3">
                    <li class="nav-item">
                        <a id="a-expert" class="nav-link active" data-bs-toggle="tab" href="#tabItem1">Experts</a>
                    </li>
                    <li class="nav-item">
                        <a id="a-topic" class="nav-link" data-bs-toggle="tab" href="#tabItem2">Topics</a>
                    </li>
                </ul>

            </div>
        </div><!-s- .nk-chat-aside-head -->
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
                    <div class="nk-chat-aside-panel nk-chat-fav">
                        <h6 class="title overline-title-alt">Topics</h6>
                        <ul class="fav-list">
                            <li class="new-topic">

                            </li>
                        </ul><!-- .fav-list -->
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
    <div id="group-main" class="nk-chat-main" style="display:block;">
        <div class="center">
            <center><p><b><font size="6px">HATCHNIAGA CONSULTATION</font></b><br/>
            <font size="4px">Choose the expert to get started.</font></p>
            </center>
        </div>
    </div>
    <div id="group-header" class="nk-chat-body profile-shown" style="display:none;">
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
                        <h6 class="title overline-title">Expert Details</h6>
                        <span class="indicator-icon"><em class="icon ni ni-chevron-down"></em></span>
                    </a>
                    <div class="chat-profile-body collapse show" id="chat-options">
                        <div class="chat-profile-body-inner">
                            <ul class="chat-profile-options">
                                <li><div class="chat-option-link" href="#"><em class="icon icon-circle bg-light ni ni-edit-alt"></em><span class="company-name"></span></div></li>
                                <li><div class="chat-option-link chat-search-toggle"><em class="icon icon-circle bg-light ni ni-search"></em><span class="company-detail"></span></div></li>
                                <!-- <li><a class="chat-option-link" href="#"><em class="icon icon-circle bg-light ni ni-circle-fill"></em><span class="lead-text">Change Theme</span></a></li> -->
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

                                <?php
                                if ($model) {
                                    foreach ($model as $biz) {
                                        echo '<li>
                                                <a class="chat-option-link" href="' . Url::to([
                                            '/client/biz-canvas/view',
                                            'id' => $biz->id
                                        ]) . '" target="_blank">
                                                    <em class="icon icon-circle bg-light ni ni-circle-fill"></em>
                                                    <div>
                                                        <span class="lead-text">' . $biz->title . '</span>
                                                        <span class="sub-text">' . $biz->description . '</span>
                                                    </div>
                                                </a>
                                            </li>';
                                    }
                                }

                                ?>

                            </ul>
                        </div>
                    </div>
                </div><!-- .chat-profile-group -->
                <!-- <div class="chat-profile-group">
                    <a href="#" class="chat-profile-head" data-bs-toggle="collapse" data-bs-target="#chat-photos">
                        <h6 class="title overline-title">Shared Photos</h6>
                        <span class="indicator-icon"><em class="icon ni ni-chevron-down"></em></span>
                    </a>
                    <div class="chat-profile-body collapse show" id="chat-photos">
                        <div class="chat-profile-body-inner">
                            <ul class="chat-profile-media">
                                <li><a href="#"><img src="<?=$web?>/dlite/images/slides/slide-a.jpg" alt=""></a></li>
                                <li><a href="#"><img src="<?=$web?>/dlite/images/slides/slide-b.jpg" alt=""></a></li>
                                <li><a href="#"><img src="<?=$web?>/dlite/images/slides/slide-c.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div> --><!-- .chat-profile-group -->
            </div> <!-- .chat-profile -->
        </div><!-- .nk-chat-profile -->
    </div><!-- .nk-chat-body -->
</div><!-- .nk-chat -->

<div class="modal fade" id="modalDefault">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Create Topic</h5>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputTopic">Topic</label>
                        <input type="text" class="form-control" id="inputTopic">
                    </div>

                    <div class="form-group col-md-12">
                        <!-- <label for="inputExpert">Expert</label> -->
                        <label for="inputTopic">Expert</label>
                        <?php

                        echo Html::dropDownList('id', null, Expert::listExpertByClient(Yii::$app->user->identity->client->id), [
                            'class' => 'form-control',
                            'id' => 'exp-id',
                            'prompt' => 'Please Select'
                        ])?>

                    </div>
                    <br/>

                </div>
                <button id="submit-topic" type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateModalTopic">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
            <div class="modal-header">
                <h5 class="modal-title">Update Topic</h5>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputTopic">Topic</label>
                        <input type="text" class="form-control" id="inputUpdtTopic">
                    </div>


                    <br/>

                </div>
                <button id="submit-updt-topic" type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<div id="modalSpinner" class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
            <div class="center">
                <div class="loader"></div>
            </div>
    </div>
</div>