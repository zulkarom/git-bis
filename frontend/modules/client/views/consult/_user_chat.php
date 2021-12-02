<?php 
$web = Yii::getAlias('@web');
?>

<div class="user-chat w-100 overflow-hidden">
                <div class="user-chat-overlay"></div>
                <div class="chat-welcome-section">
                    <div class="row w-100 justify-content-center">
                        <div class="col-xxl-5 col-md-7">
                            <div class="p-4 text-center">
                                <div class="avatar-xl mx-auto mb-4">
                                    <div class="avatar-title bg-soft-primary rounded-circle">
                                        <i class="bx bxs-message-alt-detail display-4 text-primary m-0"></i>
                                    </div>
                                </div>

                                <h4>Hatchniaga Consultation</h4>
                                <p class="text-muted mb-4">Hatchniaga an online incubation platform for entrepreneurs who are looking for a starting-point for their business. The entrepreneurs are able to transform indigenous ideas into a rapidly growing companies providing products and services to the market via our online incubation platform.</p>

    
                            </div>
                        </div>
                    </div>
                </div> 
     

                <div class="chat-content d-lg-flex">
                    <!-- start chat conversation section -->
                    <div class="w-100 overflow-hidden position-relative">
                        <!-- conversation user -->
                        <div id="users-chat">
                        <div class="p-3 p-lg-4 user-chat-topbar">
                            <div class="row align-items-center">
                                <div class="col-sm-4 col-8">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 d-block d-lg-none me-3">
                                            <a href="javascript: void(0);" class="user-chat-remove font-size-18 p-1"><i class="bx bx-chevron-left align-middle"></i></a>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="d-flex align-items-center">                            
                                                <div class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3 ms-0">
                                                    <img src="<?=$web?>/chat/images/users/avatar-2.jpg" class="rounded-circle avatar-sm" alt="">
                                                    <span class="user-status"></span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h6 class="text-truncate mb-0 font-size-18"><a href="#" class="user-profile-show text-reset">Bella Cote</a></h6>
                                                    <p class="text-truncate text-muted mb-0"><small class="user-topic-text">Online</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-4">
                                    <ul class="list-inline user-chat-nav text-end mb-0">                                        
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class='bx bx-search'></i>
                                                </button>
                                                <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                    <div class="search-box p-2">
                                                        <input type="text" class="form-control" placeholder="Search.." id="searchChatMessage">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                            <button type="button" class="btn nav-btn" data-bs-toggle="modal" data-bs-target=".audiocallModal">
                                                <i class='bx bxs-phone-call' ></i>
                                            </button>
                                        </li>

                                        <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                            <button type="button" class="btn nav-btn" data-bs-toggle="modal" data-bs-target=".videocallModal">
                                                <i class='bx bx-video' ></i>
                                            </button>
                                        </li>

                                        <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                            <button type="button" class="btn nav-btn user-profile-show">
                                                <i class='bx bxs-info-circle' ></i>
                                            </button>
                                        </li>

                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class='bx bx-dots-vertical-rounded' ></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none user-profile-show" href="#">View Profile <i class="bx bx-user text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none" href="#" data-bs-toggle="modal" data-bs-target=".audiocallModal">Audio <i class="bx bxs-phone-call text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none" href="#" data-bs-toggle="modal" data-bs-target=".videocallModal">Video <i class="bx bx-video text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Archive <i class="bx bx-archive text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Muted <i class="bx bx-microphone-off text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Delete <i class="bx bx-trash text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>                                        
                                    </ul>                                    
                                </div>
                            </div>
                 
                        </div>
                        <!-- end chat user head -->

                        <!-- start chat conversation -->

                        <div class="chat-conversation p-3 p-lg-4 " id="chat-conversation" data-simplebar>
                            <ul class="list-unstyled chat-conversation-list" id="users-conversation">        
                  
                            </ul>
                        </div>

                        <!-- end chat conversation end -->
                        </div>

                        <!-- conversation group -->
                        <div id="channel-chat">
                        <div class="p-3 p-lg-4 user-chat-topbar">
                            <div class="row align-items-center">
                                <div class="col-sm-4 col-8">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 d-block d-lg-none me-3">
                                            <a href="javascript: void(0);" class="user-chat-remove font-size-18 p-1"><i class="bx bx-chevron-left align-middle"></i></a>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <div class="d-flex align-items-center">                            
                                                <div class="flex-shrink-0 chat-user-img online user-own-img align-self-center me-3">
                                                    <img src="<?=$web?>/chat/images/users/user-dummy-img.jpg" class="rounded-circle avatar-sm" alt="">                            
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h6 class="text-truncate mb-0 font-size-18"><a href="#" class="user-profile-show text-reset">Design Phase 2</a></h6>
                                                    <p class="text-truncate text-muted mb-0"><small>24 Members</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-4">
                                    <ul class="list-inline user-chat-nav text-end mb-0">                                        
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class='bx bx-search'></i>
                                                </button>
                                                <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                                                    <div class="search-box p-2">
                                                        <input type="text" class="form-control" placeholder="Search..">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-inline-item d-none d-lg-inline-block me-2 ms-0">
                                            <button type="button" class="btn nav-btn user-profile-show">
                                                <i class='bx bxs-info-circle'></i>
                                            </button>
                                        </li>

                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class='bx bx-dots-vertical-rounded' ></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none user-profile-show" href="#">View Profile <i class="bx bx-user text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none" href="#" data-bs-toggle="modal" data-bs-target=".audiocallModal">Audio <i class="bx bxs-phone-call text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none" href="#" data-bs-toggle="modal" data-bs-target=".videocallModal">Video <i class="bx bx-video text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Archive <i class="bx bx-archive text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Muted <i class="bx bx-microphone-off text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Delete <i class="bx bx-trash text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>                                        
                                    </ul>                                    
                                </div>
                            </div>
              
                        </div>
                        <!-- end chat user head -->

                        <!-- start chat conversation -->

                        <div class="chat-conversation p-3 p-lg-4" id="chat-conversation" data-simplebar>
                            <ul class="list-unstyled chat-conversation-list" id="channel-conversation">         
        
                            </ul>
                        </div>
                        <!-- end chat conversation end -->
                        </div>
    
                        <!-- start chat input section -->
                        <div class="chat-input-section p-3 p-lg-4"> 
                            <form id="chatinput-form">
                                <div class="row g-0 align-items-center">                                    
                                    <div class="col-auto">
                                        <div class="chat-input-links me-md-2">
                                            <div class="links-list-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="More">
                                                <button type="button" class="btn btn-link text-decoration-none btn-lg waves-effect" data-bs-toggle="collapse" data-bs-target="#chatinputmorecollapse" aria-expanded="false" aria-controls="chatinputmorecollapse">
                                                    <i class="bx bx-dots-horizontal-rounded align-middle"></i>
                                                </button>
                                            </div>
                                            <div class="links-list-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Emoji">
                                                <button type="button" class="btn btn-link text-decoration-none btn-lg waves-effect emoji-btn" id="emoji-btn">
                                                    <i class="bx bx-smile align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="position-relative">
                                            <div class="chat-input-feedback">
                                                Please Enter a Message
                                            </div>
                                            <input autocomplete="off" type="text" class="form-control form-control-lg chat-input" id="chat-input" placeholder="Type your message...">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="chat-input-links ms-2 gap-md-1">
                                            <div class="links-list-item d-none d-sm-block"  data-bs-container=".chat-input-links" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-html="true"  data-bs-placement="top" data-bs-content="<div class='loader-line'><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div><div class='line'></div></div>">
                                                <button type="button" class="btn btn-link text-decoration-none btn-lg waves-effect">
                                                    <i class="bx bx-microphone align-middle"></i>
                                                </button>
                                            </div>
                                            <div class="links-list-item">
                                                <button type="submit" class="btn btn-primary btn-lg chat-send waves-effect waves-light" data-bs-toggle="collapse" data-bs-target=".chat-input-collapse.show" >
                                                    <i class="bx bxs-send align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="chat-input-collapse collapse" id="chatinputmorecollapse">
                                <div class="card mb-0">
                                    <div class="card-body py-3">
                                        <!-- Swiper -->
                                        <div class="swiper chatinput-links">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2 position-relative">
                                                        <div>
                                                            <input id="attachedfile-input" type="file" class="d-none">
                                                            <label for="attachedfile-input" class="avatar-sm mx-auto stretched-link">
                                                                <span class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                    <i class="bx bx-paperclip"></i>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <h5 class="font-size-11 text-uppercase mt-3 mb-0 text-body text-truncate">Attached</h5>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2">
                                                        <div class="avatar-sm mx-auto">
                                                            <div class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                <i class="bx bxs-camera"></i>
                                                            </div>
                                                        </div>
                                                        <h5 class="font-size-11 text-uppercase text-truncate mt-3 mb-0"><a href="#" class="text-body stretched-link">Camera</a></h5>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2">
                                                        <div class="avatar-sm mx-auto">
                                                            <div class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                <i class="bx bx-images"></i>
                                                            </div>
                                                        </div>
                                                        
                                                        <h5 class="font-size-11 text-uppercase text-truncate mt-3 mb-0"><a href="#" class="text-body stretched-link">Gallery</a></h5>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2">
                                                        <div class="avatar-sm mx-auto">
                                                            <div class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                <i class="bx bx-headphone"></i>
                                                            </div>
                                                        </div>
                                                        
                                                        <h5 class="font-size-11 text-uppercase text-truncate mt-3 mb-0"><a href="#" class="text-body stretched-link">Audio</a></h5>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2">
                                                        <div class="avatar-sm mx-auto">
                                                            <div class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                <i class="bx bx-current-location"></i>
                                                            </div>
                                                        </div>
                                                        
                                                        <h5 class="font-size-11 text-uppercase text-truncate mt-3 mb-0"><a href="#" class="text-body stretched-link">Location</a></h5>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="text-center px-2">
                                                        <div class="avatar-sm mx-auto">
                                                            <div class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                <i class="bx bxs-user-circle"></i>
                                                            </div>
                                                        </div>
                                                        <h5 class="font-size-11 text-uppercase text-truncate mt-3 mb-0"><a href="#" class="text-body stretched-link" data-bs-toggle="modal" data-bs-target=".contactModal">Contacts</a></h5>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide d-block d-sm-none">
                                                    <div class="text-center px-2">
                                                        <div class="avatar-sm mx-auto">
                                                            <div class="avatar-title font-size-18 bg-soft-primary text-primary rounded-circle">
                                                                <i class="bx bx-microphone"></i>
                                                            </div>
                                                        </div>
                                                        <h5 class="font-size-11 text-uppercase text-truncate mt-3 mb-0"><a href="#" class="text-body stretched-link">Audio</a></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="chat-input-collapse replyCollapse collapse">
                                <div class="card mb-0">
                                    <div class="card-body py-3">
                                        <div class="replymessage-block mb-0 d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <h5 class="conversation-name">Jean Berwick</h5>
                                                <p class="mb-0">Yeah everything is fine. Our next meeting tomorrow at 10.00 AM</p>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-sm btn-link mt-n2 me-n3 font-size-18" data-bs-toggle="collapse" data-bs-target=".replyCollapse.show">
                                                    <i class="bx bx-x align-middle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end chat input section -->
                    </div>
                    <!-- end chat conversation section -->
    
                    <!-- start User profile detail sidebar -->
                    <div class="user-profile-sidebar">

                        <div class="p-3 border-bottom">
                            <div class="user-profile-img">
                                <img src="<?=$web?>/chat/images/users/avatar-2.jpg" class="profile-img rounded" alt="">
                                <div class="overlay-content rounded">
                                    <div class="user-chat-nav p-2">
                                        <div class="d-flex w-100">
                                            <div class="flex-grow-1">
                                                <button type="button" class="btn nav-btn text-white user-profile-show d-none d-lg-block">
                                                    <i class="bx bx-x"></i>
                                                </button>
                                                <button type="button" class="btn nav-btn text-white user-profile-show d-block d-lg-none">
                                                    <i class="bx bx-left-arrow-alt"></i>
                                                </button>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="dropdown">
                                                    <button class="btn nav-btn text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class='bx bx-dots-vertical-rounded'></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none user-profile-show" href="#">View Profile <i class="bx bx-user text-muted"></i></a>
                                                        <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none" href="#" data-bs-toggle="modal" data-bs-target=".audiocallModal">Audio <i class="bx bxs-phone-call text-muted"></i></a>
                                                        <a class="dropdown-item d-flex justify-content-between align-items-center d-lg-none" href="#" data-bs-toggle="modal" data-bs-target=".videocallModal">Video <i class="bx bx-video text-muted"></i></a>
                                                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Archive <i class="bx bx-archive text-muted"></i></a>
                                                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Muted <i class="bx bx-microphone-off text-muted"></i></a>
                                                        <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Delete <i class="bx bx-trash text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-auto p-3">
                                        <h5 class="user-name mb-1 text-truncate">Bella Cote</h5>
                                        <p class="font-size-14 text-truncate mb-0"><i class="bx bxs-circle font-size-10 text-success me-1 ms-0"></i> Online</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End profile user -->

                        <!-- Start user-profile-desc -->
                        <div class="p-4 user-profile-desc" data-simplebar>

                            <div class="text-center border-bottom">
                                <div class="row">
                                    <div class="col-sm col-4">
                                        <div class="mb-4">
                                            <button type="button" class="btn avatar-sm p-0">
                                                <span class="avatar-title rounded bg-light text-body">
                                                    <i class="bx bxs-message-alt-detail"></i>
                                                </span>
                                            </button>
                                            <h5 class="font-size-11 text-uppercase text-muted mt-2">Message</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm col-4">
                                        <div class="mb-4">
                                            <button type="button" class="btn avatar-sm p-0 favourite-btn">
                                                <span class="avatar-title rounded bg-light text-body">
                                                    <i class="bx bx-heart"></i>
                                                </span>
                                            </button>
                                            <h5 class="font-size-11 text-uppercase text-muted mt-2">Favourite</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm col-4">
                                        <div class="mb-4">
                                            <button type="button" class="btn avatar-sm p-0" data-bs-toggle="modal" data-bs-target=".audiocallModal">
                                                <span class="avatar-title rounded bg-light text-body">
                                                    <i class="bx bxs-phone-call"></i>
                                                </span>
                                            </button>
                                            <h5 class="font-size-11 text-uppercase text-muted mt-2">Audio</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm col-4">
                                        <div class="mb-4">
                                            <button type="button" class="btn avatar-sm p-0" data-bs-toggle="modal" data-bs-target=".videocallModal">
                                                <span class="avatar-title rounded bg-light text-body">
                                                    <i class="bx bx-video"></i>
                                                </span>
                                            </button>
                                            <h5 class="font-size-11 text-uppercase text-muted mt-2">Video</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm col-4">
                                        <div class="mb-4">
                                            <div class="dropdown">
                                                <button class="btn avatar-sm p-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="avatar-title bg-light text-body rounded">
                                                        <i class='bx bx-dots-horizontal-rounded'></i>
                                                    </span>
                                                </button>
                            
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Archive <i class="bx bx-archive text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Muted <i class="bx bx-microphone-off text-muted"></i></a>
                                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Delete <i class="bx bx-trash text-muted"></i></a>
                                                </div>
                                            </div>
                                            <h5 class="font-size-11 text-uppercase text-muted mt-2">More</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-muted pt-4">
                                <h5 class="font-size-11 text-uppercase">Status :</h5>
                                <p class="mb-4">If several languages coalesce, the grammar of the resulting.</p>
                            </div>

                            <div class="pb-2">
                                <h5 class="font-size-11 text-uppercase mb-2">Info :</h5>
                                <div>
                                    <div class="d-flex align-items-end">
                                        <div class="flex-grow-1">
                                            <p class="text-muted font-size-14 mb-1">Name</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-sm btn-soft-primary">Edit</button>
                                        </div>
                                    </div>
                                    <h5 class="font-size-14 text-truncate">Bella Cote</h5>
                                </div>

                                <div class="mt-4">
                                    <p class="text-muted font-size-14 mb-1">Email</p>
                                    <h5 class="font-size-14">adc@123.com</h5>
                                </div>

                                <div class="mt-4">
                                    <p class="text-muted font-size-14 mb-1">Location</p>
                                    <h5 class="font-size-14 mb-0">California, USA</h5>
                                </div>
                            </div>
                            <hr class="my-4">

                            <div>
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5 class="font-size-11 text-muted text-uppercase">Group in common</h5>
                                    </div>
                                </div>
            
                                <ul class="list-unstyled chat-list mx-n4">
                                    <li>
                                        <a href="javascript: void(0);">
                                            <div class="d-flex align-items-center">                            
                                                <div class="flex-shrink-0 avatar-xs me-2">
                                                    <span class="avatar-title rounded-circle bg-soft-light text-dark">
                                                        #
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-truncate mb-0">Landing Design</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">
                                            <div class="d-flex align-items-center">                            
                                                <div class="flex-shrink-0 avatar-xs me-2">
                                                    <span class="avatar-title rounded-circle bg-soft-light text-dark">
                                                        #
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-truncate mb-0">Design Phase 2</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <hr class="my-4">

                            <div>
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h5 class="font-size-11 text-muted text-uppercase">Media</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="#" class="font-size-12 d-block mb-2">Show all</a>
                                    </div>
                                </div>
                                <div class="profile-media-img">
                                    <div class="media-img-list">
                                        <a href="#">
                                            <img src="<?=$web?>/chat/images/small/img-1.jpg" alt="media img" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="media-img-list">
                                        <a href="#">
                                            <img src="<?=$web?>/chat/images/small/img-2.jpg" alt="media img" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="media-img-list">
                                        <a href="#">
                                            <img src="<?=$web?>/chat/images/small/img-3.jpg" alt="media img" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="media-img-list">
                                        <a href="#">
                                            <img src="<?=$web?>/chat/images/small/img-4.jpg" alt="media img" class="img-fluid">
                                            <div class="bg-overlay">+ 15</div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div>
                                <div>
                                    <h5 class="font-size-11 text-muted text-uppercase mb-3">Attached Files</h5>
                                </div>
            
                                <div>
                                    <div class="card p-2 border mb-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                                <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="bx bx-file"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 text-truncate mb-1">design-phase-1-approved.pdf</h5>
                                                <p class="text-muted font-size-13 mb-0">12.5 MB</p>
                                            </div>

                                            <div class="flex-shrink-0 ms-3">
                                                <div class="d-flex gap-2">
                                                    <div>
                                                        <a href="#" class="text-muted px-1">
                                                            <i class="bx bxs-download"></i>
                                                        </a>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Share <i class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card p-2 border mb-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                                <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="bx bx-image"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 text-truncate mb-1">Image-1.jpg</h5>
                                                <p class="text-muted font-size-13 mb-0">4.2 MB</p>
                                            </div>

                                            <div class="flex-shrink-0 ms-3">
                                                <div class="d-flex gap-2">
                                                    <div>
                                                        <a href="#" class="text-muted px-1">
                                                            <i class="bx bxs-download"></i>
                                                        </a>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Share <i class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card p-2 border mb-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                                <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="bx bx-image"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 text-truncate mb-1">Image-2.jpg</h5>
                                                <p class="text-muted font-size-13 mb-0">3.1 MB</p>
                                            </div>

                                            <div class="flex-shrink-0 ms-3">
                                                <div class="d-flex gap-2">
                                                    <div>
                                                        <a href="#" class="text-muted px-1">
                                                            <i class="bx bxs-download"></i>
                                                        </a>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Share <i class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card p-2 border mb-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs ms-1 me-3">
                                                <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="bx bx-file"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 text-truncate mb-1">Landing-A.zip</h5>
                                                <p class="text-muted font-size-13 mb-0">6.7 MB</p>
                                            </div>

                                            <div class="flex-shrink-0 ms-3">
                                                <div class="d-flex gap-2">
                                                    <div>
                                                        <a href="#" class="text-muted px-1">
                                                            <i class="bx bxs-download"></i>
                                                        </a>
                                                    </div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Share <i class="bx bx-share-alt ms-2 text-muted"></i></a>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Bookmark <i class="bx bx-bookmarks text-muted ms-2"></i></a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end user-profile-desc -->
                    </div>
                    <!-- end User profile detail sidebar -->
                </div>