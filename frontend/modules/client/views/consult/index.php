<?php 
$web = Yii::getAlias('@web');
?>

<div class="layout-wrapper d-lg-flex">

            <!-- Start left sidebar-menu -->
            <div class="side-menu flex-lg-column">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M8.5,18l3.5,4l3.5-4H19c1.103,0,2-0.897,2-2V4c0-1.103-0.897-2-2-2H5C3.897,2,3,2.897,3,4v12c0,1.103,0.897,2,2,2H8.5z M7,7h10v2H7V7z M7,11h7v2H7V11z"/></svg>
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M8.5,18l3.5,4l3.5-4H19c1.103,0,2-0.897,2-2V4c0-1.103-0.897-2-2-2H5C3.897,2,3,2.897,3,4v12c0,1.103,0.897,2,2,2H8.5z M7,7h10v2H7V7z M7,11h7v2H7V11z"/></svg>
                        </span>
                    </a>
                </div>
                <!-- end navbar-brand-box -->

                <!-- Start side-menu nav -->
                <div class="flex-lg-column my-0 sidemenu-navigation">
                    <ul class="nav nav-pills side-menu-nav" role="tablist">
					
					
					
					<li class="nav-item dropdown profile-user-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?=$web?>/chat/images/users/avatar-1.jpg" alt="" class="profile-user rounded-circle">
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item d-flex align-items-center justify-content-between" id="pills-user-tab" data-bs-toggle="pill" href="#pills-user" role="tab">Profile <i class="bx bx-user-circle text-muted ms-1"></i></a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" id="pills-setting-tab" data-bs-toggle="pill" href="#pills-setting" role="tab">Setting <i class="bx bx-cog text-muted ms-1"></i></a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="auth-changepassword.html">Change Password <i class="bx bx-lock-open text-muted ms-1"></i></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="auth-logout.html">Log out <i class="bx bx-log-out-circle text-muted ms-1"></i></a>
                            </div>
                        </li>
						
						<li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-container=".sidemenu-navigation" title="Back">
                            <a class="nav-link" href="#" role="tab">
                                <i class='bx bx-chevron-left'></i>
                            </a>
                        </li>
						
						<li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-container=".sidemenu-navigation" title="Chats">
                            <a class="nav-link active" id="pills-chat-tab" data-bs-toggle="pill" href="#pills-chat" role="tab">
                               <i class='bx bxs-user-detail'></i>
                            </a>
                        </li>
                    
        
                    
         
                        <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" data-bs-container=".sidemenu-navigation" title="Bookmark">
                            <a class="nav-link" id="pills-bookmark-tab" data-bs-toggle="pill" href="#pills-bookmark" role="tab">
                                <i class='bx bx-bookmarks'></i>
                            </a>
                        </li>
      
           
                        
                    </ul>
                </div>
                <!-- end side-menu nav -->
            </div>
            <!-- end left sidebar-menu -->

            <!-- start chat-leftsidebar -->
            <div class="chat-leftsidebar">

                <div class="tab-content">
                    <!-- Start Profile tab-pane -->
                    <div class="tab-pane" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab">
                        <!-- Start profile content -->
                        <div>
                            <div class="user-profile-img">
                                <img src="<?=$web?>/chat/images/small/img-4.jpg" class="profile-img" style="height: 160px;" alt="">
                                <div class="overlay-content">
                                    <div>
                                        <div class="user-chat-nav p-2 ps-3">
                    
                                            <div class="d-flex w-100 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="text-white mb-0">My Profile</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">
                                                        <button class="btn nav-btn text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class='bx bx-dots-vertical-rounded'></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Info <i class="bx bx-info-circle ms-2 text-muted"></i></a>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Setting <i class="bx bx-cog text-muted ms-2"></i></a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Help <i class="bx bx-help-circle ms-2 text-muted"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center p-3 p-lg-4 border-bottom pt-2 pt-lg-2 mt-n5 position-relative">
                                <div class="mb-lg-3 mb-2">
                                    <img src="<?=$web?>/chat/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="">
                                </div>

                                <h5 class="font-size-16 mb-1 text-truncate">Adam Zampa</h5>
                                <p class="text-muted font-size-14 text-truncate mb-0">Front end Developer</p>
                            </div>
                            <!-- End profile user -->

                            <!-- Start user-profile-desc -->
                            <div class="p-4 profile-desc" data-simplebar>
                                <div class="text-muted">
                                    <p class="mb-4">If several languages coalesce, the grammar of the resulting language is more simple.</p>
                                </div>

                                <div>
                                    <div class="d-flex py-2">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bx bx-user align-middle text-muted"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">Adam Zampa</p>
                                        </div>
                                    </div>

                                    <div class="d-flex py-2">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bx bx-message-rounded-dots align-middle text-muted"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">adc@123.com</p>
                                        </div>
                                    </div>
            
                                    <div class="d-flex py-2">
                                        <div class="flex-shrink-0 me-3">
                                            <i class="bx bx-location-plus align-middle text-muted"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0">California, USA</p>
                                        </div>
                                    </div>
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
                        <!-- End profile content -->
                    </div> 
                    <!-- End Profile tab-pane -->

                    <!-- Start chats tab-pane -->
                    
                    <!-- End chats tab-pane -->

                    <!-- Start contacts tab-pane -->
                    <?=$this->render('_tab_consultants')?>
                    <!-- End contacts tab-pane -->

 

                    <!-- Start bookmark tab-pane -->
                    <?=$this->render('_tab_topics')?>
                    <!-- End bookmark tab-pane -->
                    
               
                </div>
                <!-- end tab content -->
            </div>
            <!-- end chat-leftsidebar -->

            <!-- Start User chat -->
            <?=$this->render('_user_chat')?>
                <!-- end user chat content -->
            </div>
            <!-- End User chat -->

            <!-- Start Add contact Modal -->
            <div class="modal fade" id="addContact-exampleModal" tabindex="-1" role="dialog" aria-labelledby="addContact-exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content modal-header-colored shadow-lg border-0">
                        <div class="modal-header">
                            <h5 class="modal-title text-white font-size-16" id="addContact-exampleModalLabel">Create Contact</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body p-4">
                            <form>
                                <div class="mb-3">
                                    <label for="addcontactemail-input" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="addcontactemail-input" placeholder="Enter Email">
                                </div>
                                <div class="mb-3">
                                    <label for="addcontactname-input" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="addcontactname-input" placeholder="Enter Name">
                                </div>
                                <div class="mb-0">
                                    <label for="addcontact-invitemessage-input" class="form-label">Invatation Message</label>
                                    <textarea class="form-control" id="addcontact-invitemessage-input" rows="3" placeholder="Enter Message"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Invite</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Add contact Modal -->

            <!-- audiocall Modal -->
            <div class="modal fade audiocallModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content shadow-lg border-0">
                        <div class="modal-body p-0">
                            <div class="text-center p-4 pb-0">
                                <div class="avatar-xl mx-auto mb-4">
                                    <img src="<?=$web?>/chat/images/users/avatar-2.jpg" alt="" class="img-thumbnail rounded-circle">
                                </div>

                                <div class="d-flex justify-content-center align-items-center mt-4">
                                    <div class="avatar-md h-auto">
                                        <button type="button" class="btn btn-light avatar-sm rounded-circle">
                                            <span class="avatar-title bg-transparent text-muted font-size-20">
                                                <i class="bx bx-microphone-off"></i>
                                            </span>
                                        </button>
                                        <h5 class="font-size-11 text-uppercase text-muted mt-2">Mute</h5>
                                    </div>
                                    <div class="avatar-md h-auto">
                                        <button type="button" class="btn btn-light avatar-sm rounded-circle">
                                            <span class="avatar-title bg-transparent text-muted font-size-20">
                                                <i class="bx bx-volume-full"></i>
                                            </span>
                                        </button>
                                        <h5 class="font-size-11 text-uppercase text-muted mt-2">Speaker</h5>
                                    </div>
                                    <div class="avatar-md h-auto">
                                        <button type="button" class="btn btn-light avatar-sm rounded-circle">
                                            <span class="avatar-title bg-transparent text-muted font-size-20">
                                                <i class="bx bx-user-plus"></i>
                                            </span>
                                        </button>
                                        <h5 class="font-size-11 text-uppercase text-muted mt-2">Add New</h5>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="button" class="btn btn-danger avatar-md call-close-btn rounded-circle" data-bs-dismiss="modal">
                                        <span class="avatar-title bg-transparent font-size-24">
                                            <i class="mdi mdi-phone-hangup"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <div class="p-4 bg-soft-primary mt-n4">
                                <div class="mt-4 text-center">
                                    <h5 class="font-size-18 mb-0 text-truncate">Bella Cote</h5>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <!-- audiocall Modal -->

            <!-- videocall Modal -->
            <div class="modal fade videocallModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content shadow-lg border-0">
                        <div class="modal-body p-0">
                            <img src="<?=$web?>/chat/images/users/avatar-2.jpg" alt="" class="videocallModal-bg">
                            <div class="position-absolute start-0 end-0 bottom-0">
                                <div class="text-center">
                                    <div class="d-flex justify-content-center align-items-center text-center">
                                        <div class="avatar-md h-auto">
                                            <button type="button" class="btn btn-light avatar-sm rounded-circle">
                                                <span class="avatar-title bg-transparent text-muted font-size-20">
                                                    <i class="bx bx-microphone-off"></i>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="avatar-md h-auto">
                                            <button type="button" class="btn btn-light avatar-sm rounded-circle">
                                                <span class="avatar-title bg-transparent text-muted font-size-20">
                                                    <i class="bx bx-volume-full"></i>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="avatar-md h-auto">
                                            <button type="button" class="btn btn-light avatar-sm rounded-circle">
                                                <span class="avatar-title bg-transparent text-muted font-size-20">
                                                    <i class="bx bx-video-off"></i>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="avatar-md h-auto">
                                            <button type="button" class="btn btn-light avatar-sm rounded-circle">
                                                <span class="avatar-title bg-transparent text-muted font-size-20">
                                                    <i class="bx bx-refresh"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
    
                                    <div class="mt-4">
                                        <button type="button" class="btn btn-danger avatar-md call-close-btn rounded-circle" data-bs-dismiss="modal">
                                            <span class="avatar-title bg-transparent font-size-24">
                                                <i class="mdi mdi-phone-hangup"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
    
                                <div class="p-4 bg-primary mt-n4">
                                    <div class="text-white mt-4 text-center">
                                        <h5 class="font-size-18 text-truncate mb-0 text-white">Bella Cote</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->

            <!-- Start Add pinned tab Modal -->
            <div class="modal fade pinnedtabModal" tabindex="-1" role="dialog" aria-labelledby="pinnedtabModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content modal-header-colored shadow-lg border-0">
                        <div class="modal-header">
                            <h5 class="modal-title text-white font-size-16" id="pinnedtabModalLabel">Bookmark</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="font-size-16 mb-0">10 Pinned tabs</h5>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <div>
                                        <button type="button" class="btn btn-sm btn-soft-primary"><i class="bx bx-plus"></i> Pin</button>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-bookmark-list mx-n4" data-simplebar style="max-height: 299px;">
                                <ul class="list-unstyled chat-list">
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs me-3">
                                                <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="bx bx-file"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 text-truncate mb-1"><a href="#" class="p-0">design-phase-1-approved.pdf</a></h5>
                                                <p class="text-muted font-size-13 mb-0">12.5 MB</p>
                                            </div>

                                            <div class="flex-shrink-0 ms-3">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle font-size-18 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs me-3">
                                                <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="bx bx-pin"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 text-truncate mb-1"><a href="#" class="p-0">Bg Pattern</a></h5>
                                                <p class="text-muted font-size-13 mb-0">https://bgpattern.com/</p>
                                            </div>

                                            <div class="flex-shrink-0 ms-3">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle font-size-18 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs me-3">
                                                <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="bx bx-image"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 text-truncate mb-1"><a href="#" class="p-0">Image-001.jpg</a></h5>
                                                <p class="text-muted font-size-13 mb-0">4.2 MB</p>
                                            </div>

                                            <div class="flex-shrink-0 ms-3">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle font-size-18 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs me-3">
                                                <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="bx bx-pin"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 text-truncate mb-1"><a href="#" class="p-0">Images</a></h5>
                                                <p class="text-muted font-size-13 mb-0">https://images123.com/</p>
                                            </div>

                                            <div class="flex-shrink-0 ms-3">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle font-size-18 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs me-3">
                                                <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="bx bx-pin"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 text-truncate mb-1"><a href="#" class="p-0">Bg Gradient</a></h5>
                                                <p class="text-muted font-size-13 mb-0">https://bggradient.com/</p>
                                            </div>

                                            <div class="flex-shrink-0 ms-3">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle font-size-18 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs me-3">
                                                <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="bx bx-image"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 text-truncate mb-1"><a href="#" class="p-0">Image-012.jpg</a></h5>
                                                <p class="text-muted font-size-13 mb-0">3.1 MB</p>
                                            </div>

                                            <div class="flex-shrink-0 ms-3">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle font-size-18 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 avatar-xs me-3">
                                                <div class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                    <i class="bx bx-file"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 text-truncate mb-1"><a href="#" class="p-0">analytics dashboard.zip</a></h5>
                                                <p class="text-muted font-size-13 mb-0">6.7 MB</p>
                                            </div>

                                            <div class="flex-shrink-0 ms-3">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle font-size-18 text-muted px-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Open <i class="bx bx-folder-open ms-2 text-muted"></i></a>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Edit <i class="bx bx-pencil ms-2 text-muted"></i></a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">Delete <i class="bx bx-trash ms-2 text-muted"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Add pinned tab Modal -->

            <!-- forward Modal -->
            <div class="modal fade forwardModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal-header-colored shadow-lg border-top-0">
                        <div class="modal-header">
                            <h5 class="modal-title text-white font-size-16">Share this Message</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                        <div class="modal-body p-4">
                            <div>
                                <div class="replymessage-block mb-2">
                                    <h5 class="conversation-name">Jean Berwick</h5>
                                    <p class="mb-0">Yeah everything is fine. Our next meeting tomorrow at 10.00 AM</p>
                                </div>
                                <textarea class="form-control" placeholder="Type your message..." rows="2"></textarea>
                            </div>
                            <hr class="my-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control bg-light border-0 pe-0" placeholder="Search here.." 
                                aria-label="Example text with button addon" aria-describedby="forwardSearchbtn-addon">
                                <button class="btn btn-light" type="button" id="forwardSearchbtn-addon"><i class='bx bx-search align-middle'></i></button>
                            </div>

                            <div class="d-flex align-items-center px-1">
                                <div class="flex-grow-1">
                                    <h4 class="mb-0 font-size-11 text-muted text-uppercase">Contacts</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-sm btn-primary">Share All</button>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 150px;" class="mx-n4 px-1">
                                <div>
                                    <div class="contact-list-title">
                                        A
                                    </div>

                                    <ul class="list-unstyled contact-list">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Albert Rodarte</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Allison Etter</h5>                        
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end contact list A -->

                                <div class="mt-3">
                                    <div class="contact-list-title">
                                        C
                                    </div>

                                    <ul class="list-unstyled contact-list">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Craig Smiley</h5>
                                                </div>                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end contact list C -->

                                <div class="mt-3">
                                    <div class="contact-list-title">
                                        D
                                    </div>

                                    <ul class="list-unstyled contact-list">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Daniel Clay</h5>  
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Doris Brown</h5>
                                                </div>
                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <!-- end contact list D -->

                                <div class="mt-3">
                                    <div class="contact-list-title">
                                        I
                                    </div>

                                    <ul class="list-unstyled contact-list">
                
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Iris Wells</h5>
                                                </div>                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end contact list I -->

                                <div class="mt-3">
                                    <div class="contact-list-title">
                                        J
                                    </div>

                                    <ul class="list-unstyled contact-list">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Juan Flakes</h5>
                                                </div>                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">John Hall</h5>
                                                </div>                                                
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Joy Southern</h5>
                                                </div>                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end contact list J -->

                                <div class="mt-3">
                                    <div class="contact-list-title">
                                        M
                                    </div>

                                    <ul class="list-unstyled contact-list">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Mary Farmer</h5>
                                                </div>                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Mark Messer</h5>
                                                </div>                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Michael Hinton</h5>
                                                </div>
                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <!-- end contact list M -->

                                <div class="mt-3">
                                    <div class="contact-list-title">
                                        O
                                    </div>

                                    <ul class="list-unstyled contact-list">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Ossie Wilson</h5>
                                                </div>                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <!-- end contact list O -->

                                <div class="mt-3">
                                    <div class="contact-list-title">
                                        P
                                    </div>

                                    <ul class="list-unstyled contact-list">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Phillis Griffin</h5>
                                                </div>
                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Paul Haynes</h5>
                                                </div>
                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <!-- end contact list P -->

                                <div class="mt-3">
                                    <div class="contact-list-title">
                                        R
                                    </div>

                                    <ul class="list-unstyled contact-list">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Rocky Jackson</h5>
                                                </div>
                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <!-- end contact list R -->

                                <div class="mt-3">
                                    <div class="contact-list-title">
                                        S
                                    </div>

                                    <ul class="list-unstyled contact-list mb-0">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Sara Muller</h5>
                                                </div>
                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Simon Velez</h5>
                                                </div>
                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-14 m-0">Steve Walker</h5>
                                                </div>
                        
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-sm btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <!-- end contact list S -->
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <!-- forward Modal -->

            <!-- contactModal -->
            
            <!-- contactModal -->
        </div>
        <!-- JAVASCRIPT -->
        <script src="<?=$web?>/chat/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?=$web?>/chat/libs/simplebar/simplebar.min.js"></script>
        <script src="<?=$web?>/chat/libs/node-waves/waves.min.js"></script>
        
        <!-- glightbox js -->
        <script src="<?=$web?>/chat/libs/glightbox/js/glightbox.min.js"></script>

        <!-- Swiper JS -->
        <script src="<?=$web?>/chat/libs/swiper/swiper-bundle.min.js"></script>

<script src="<?=$web?>/chat/libs/fg-emoji-picker/fgEmojiPicker.js"></script>

<?=$this->render('_index_init_js')?>
 
 