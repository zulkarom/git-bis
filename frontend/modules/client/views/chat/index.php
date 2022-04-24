<?php
use yii\helpers\Url;    
$web = Yii::getAlias('@web');

if(Yii::$app->user->identity->role == 1){
    $userUrl = Url::to(['/chat/chat-test/get-list-experts']);
}else{
    $userUrl = Url::to(['/chatExpert/chat/get-list-clients']);
}
?>

<input type="hidden" id="userUrl" value="<?=$userUrl?>">
<div class="nk-content p-0">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-chat">
                <div class="nk-chat-aside">
                    <div class="nk-chat-aside-head">
                        <div class="nk-chat-aside-user">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle dropdown-indicator" data-bs-toggle="dropdown">
                                    <div class="user-avatar">
                                        <img src="<?=$web?>/dlite/images/avatar/b-sm.jpg" alt="">
                                    </div>
                                    <div class="title">Chats</div>
                                </a>
                                <div class="dropdown-menu">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="html/apps/chats-contacts.html"><span>Contacts</span></a></li>
                                        <li><a href="html/apps/chats-channels.html"><span>Channels</span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><span>Help</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-chat-aside-user -->
                        <ul class="nk-chat-aside-tools g-2">
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-round btn-icon btn-light dropdown-toggle" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-setting-alt-fill"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><span>Settings</span></a></li>
                                            <li class="divider"></li>
                                            <li><a href="#"><span>Message Requests</span></a></li>
                                            <li><a href="#"><span>Archives Chats</span></a></li>
                                            <li><a href="#"><span>Unread Chats</span></a></li>
                                            <li><a href="#"><span>Group Chats</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" class="btn btn-round btn-icon btn-light">
                                    <em class="icon ni ni-edit-alt-fill"></em>
                                </a>
                            </li>
                        </ul><!-- .nk-chat-aside-tools -->
                    </div><!-- .nk-chat-aside-head -->
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
                                <li class="chat-item">
                                    
                                        <div id="current-expert"></div>
                                        <div class="list-expert"></div>
                                    
                                    <div class="chat-actions">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#">Mute Conversion</a></li>
                                                    <li><a href="#">Hide Conversion</a></li>
                                                    <li><a href="#">Delete Conversion</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Mark as Unread</a></li>
                                                    <li><a href="#">Ignore Messages</a></li>
                                                    <li><a href="#">Block Messages</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li><!-- .chat-item -->
                            </ul><!-- .chat-list -->
                        </div><!-- .nk-chat-list -->
                    </div>
                </div><!-- .nk-chat-aside -->
                <div class="nk-chat-body profile-shown">
                    <div class="nk-chat-head">
                        <ul class="nk-chat-head-info">
                            <li class="nk-chat-body-close">
                                <a href="javascript:void(0)" class="btn btn-icon btn-trigger nk-chat-hide ms-n1"><em class="icon ni ni-arrow-left"></em></a>
                            </li>
                            <li class="nk-chat-head-user">
                                <div class="user-card">
                                    <div class="user-avatar bg-purple">
                                        <span>IH</span>
                                    </div>
                                    <div class="user-info">
                                        <div class="lead-text">Iliash Hossain</div>
                                        <div class="sub-text"><span class="d-none d-sm-inline me-1">Active </span> 35m ago</div>
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
                        <div class="chat is-you">
                            <div class="chat-avatar">
                                <div class="user-avatar bg-purple">
                                    <span>IH</span>
                                </div>
                            </div>
                            <div class="chat-content">
                                <div class="chat-bubbles">
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> Hello! </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> I found an issues when try to purchase the product. </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="chat-meta">
                                    <li>Iliash Hossain</li>
                                    <li>29 Apr, 2020 4:28 PM</li>
                                </ul>
                            </div>
                        </div><!-- .chat -->
                        <div class="chat is-me">
                            <div class="chat-content">
                                <div class="chat-bubbles">
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> Thanks for inform. We just solved the issues. Please check now. </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="chat-meta">
                                    <li>Abu Bin Ishtiyak</li>
                                    <li>29 Apr, 2020 4:12 PM</li>
                                </ul>
                            </div>
                        </div><!-- .chat -->
                        <div class="chat is-you">
                            <div class="chat-avatar">
                                <div class="user-avatar bg-purple">
                                    <span>IH</span>
                                </div>
                            </div>
                            <div class="chat-content">
                                <div class="chat-bubbles">
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> This is really cool. </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> It’s perfect. Thanks for letting me know. </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="chat-meta">
                                    <li>Iliash Hossain</li>
                                    <li>29 Apr, 2020 4:28 PM</li>
                                </ul>
                            </div>
                        </div><!-- .chat -->
                        <div class="chat-sap">
                            <div class="chat-sap-meta"><span>12 May, 2020</span></div>
                        </div><!-- .chat-sap -->
                        <div class="chat is-you">
                            <div class="chat-avatar">
                                <div class="user-avatar bg-purple">
                                    <span>IH</span>
                                </div>
                            </div>
                            <div class="chat-content">
                                <div class="chat-bubbles">
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> Hey, I am facing problem as i can not login into application. Can you help me to reset my password? </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="chat-meta">
                                    <li>3:49 PM</li>
                                </ul>
                            </div>
                        </div><!-- .chat -->
                        <div class="chat is-you">
                            <div class="chat-avatar no-meta">
                                <div class="user-avatar bg-purple">
                                    <span>IH</span>
                                </div>
                            </div>
                            <div class="chat-content">
                                <div class="chat-bubbles">
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> Can you check this urgently? </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .chat -->
                        <div class="chat is-you">
                            <div class="chat-avatar">
                                <div class="user-avatar bg-purple">
                                    <span>IH</span>
                                </div>
                            </div>
                            <div class="chat-content">
                                <div class="chat-bubbles">
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> really appricate if you look this quickly? </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="chat-meta">
                                    <li>3:54 PM</li>
                                </ul>
                            </div>
                        </div><!-- .chat -->
                        <div class="chat is-me">
                            <div class="chat-content">
                                <div class="chat-bubbles">
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> Definately. We are happy to help you. </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="chat-meta">
                                    <li>3:55 PM</li>
                                </ul>
                            </div>
                        </div><!-- .chat -->
                        <div class="chat is-you">
                            <div class="chat-avatar">
                                <div class="user-avatar bg-purple">
                                    <span>IH</span>
                                </div>
                            </div>
                            <div class="chat-content">
                                <div class="chat-bubbles">
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> Thank you! Let me know when it done. </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="chat-meta">
                                    <li>3:55 PM</li>
                                </ul>
                            </div>
                        </div><!-- .chat -->
                        <div class="chat is-me">
                            <div class="chat-content">
                                <div class="chat-bubbles">
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> We just reset your account. Please check your email for verification. </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="chat-bubble">
                                        <div class="chat-msg"> Please confirm if your got email </div>
                                        <ul class="chat-msg-more">
                                            <li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li>
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li>
                                                            <li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="chat-meta">
                                    <li><span>Now</span> <em class="icon ni ni-check-circle-fill"></em></li>
                                </ul>
                            </div>
                        </div><!-- .chat -->
                    </div><!-- .nk-chat-panel -->
                    <div class="nk-chat-editor">
                        <div class="nk-chat-editor-upload  ms-n1">
                            <a href="#" class="btn btn-sm btn-icon btn-trigger text-primary toggle-opt" data-target="chat-upload"><em class="icon ni ni-plus-circle-fill"></em></a>
                            <div class="chat-upload-option" data-content="chat-upload">
                                <ul class="">
                                    <li><a href="#"><em class="icon ni ni-img-fill"></em></a></li>
                                    <li><a href="#"><em class="icon ni ni-camera-fill"></em></a></li>
                                    <li><a href="#"><em class="icon ni ni-mic"></em></a></li>
                                    <li><a href="#"><em class="icon ni ni-grid-sq"></em></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-chat-editor-form">
                            <div class="form-control-wrap">
                                <textarea class="form-control form-control-simple no-resize" rows="1" id="default-textarea" placeholder="Type your message..."></textarea>
                            </div>
                        </div>
                        <ul class="nk-chat-editor-tools g-2">
                            <li>
                                <a href="#" class="btn btn-sm btn-icon btn-trigger text-primary"><em class="icon ni ni-happyf-fill"></em></a>
                            </li>
                            <li>
                                <button id= "btn-send" class="btn btn-round btn-primary btn-icon"><em class="icon ni ni-send-alt"></em></button>
                            </li>
                        </ul>
                    </div><!-- .nk-chat-editor -->
                    <div class="nk-chat-profile visible" data-simplebar>
                        <div class="user-card user-card-s2 my-4">
                            <div class="user-avatar md bg-purple">
                                <span>IH</span>
                            </div>
                            <div class="user-info">
                                <h5>Iliash Hossain</h5>
                                <span class="sub-text">Active 35m ago</span>
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
                                    <h6 class="title overline-title">Options</h6>
                                    <span class="indicator-icon"><em class="icon ni ni-chevron-down"></em></span>
                                </a>
                                <div class="chat-profile-body collapse show" id="chat-options">
                                    <div class="chat-profile-body-inner">
                                        <ul class="chat-profile-options">
                                            <li><a class="chat-option-link" href="#"><em class="icon icon-circle bg-light ni ni-edit-alt"></em><span class="lead-text">Nickname</span></a></li>
                                            <li><a class="chat-option-link chat-search-toggle" href="#"><em class="icon icon-circle bg-light ni ni-search"></em><span class="lead-text">Search In Conversation</span></a></li>
                                            <li><a class="chat-option-link" href="#"><em class="icon icon-circle bg-light ni ni-circle-fill"></em><span class="lead-text">Change Theme</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .chat-profile-group -->
                            <div class="chat-profile-group">
                                <a href="#" class="chat-profile-head" data-bs-toggle="collapse" data-bs-target="#chat-settings">
                                    <h6 class="title overline-title">Settings</h6>
                                    <span class="indicator-icon"><em class="icon ni ni-chevron-down"></em></span>
                                </a>
                                <div class="chat-profile-body collapse show" id="chat-settings">
                                    <div class="chat-profile-body-inner">
                                        <ul class="chat-profile-settings">
                                            <li>
                                                <div class="custom-control custom-control-sm custom-switch">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="chat-notification-enable">
                                                    <label class="custom-control-label" for="chat-notification-enable">Notifications</label>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="chat-option-link" href="#">
                                                    <em class="icon icon-circle bg-light ni ni-bell-off-fill"></em>
                                                    <div>
                                                        <span class="lead-text">Ignore Messages</span>
                                                        <span class="sub-text">You won’t be notified when message you.</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="chat-option-link" href="#">
                                                    <em class="icon icon-circle bg-light ni ni-alert-fill"></em>
                                                    <div>
                                                        <span class="lead-text">Something Wrong</span>
                                                        <span class="sub-text">Give feedback and report conversion.</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .chat-profile-group -->
                            <div class="chat-profile-group">
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
                            </div><!-- .chat-profile-group -->
                        </div> <!-- .chat-profile -->
                    </div><!-- .nk-chat-profile -->
                </div><!-- .nk-chat-body -->
            </div><!-- .nk-chat -->
        </div>
    </div>
</div>