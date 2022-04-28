<?php
use yii\helpers\Url;

?>

<div class="nk-sidebar" data-content="sidebarMenu">
                    <div class="nk-sidebar-inner" data-simplebar>
                        <ul class="nk-menu nk-menu-md">
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Main</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item">
                                <a href="<?=Url::to(['/client/dashboard/index'])?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                    <span class="nk-menu-text">Dashboard</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="<?=Url::to(['/client/biz-canvas/index'])?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-speed"></em></span>
                                    <span class="nk-menu-text">Business Canvas</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="<?=Url::to(['/client/chat'])?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span>
                                    <span class="nk-menu-text">Consultation</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Pre-Built Pages</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                    <span class="nk-menu-text">Projects</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="html/project-card.html" class="nk-menu-link"><span class="nk-menu-text">Project Cards</span></a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="html/project-list.html" class="nk-menu-link"><span class="nk-menu-text">Project List</span></a>
                                    </li>
                                </ul><!-- .nk-menu-sub -->
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-item">
                                <a href="html/gallery.html" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-img"></em></span>
                                    <span class="nk-menu-text">Image Gallery</span>
                                </a>
                            </li><!-- .nk-menu-item -->
                            <li class="nk-menu-heading">
                                <h6 class="overline-title text-primary-alt">Profile</h6>
                            </li><!-- .nk-menu-heading -->
                            <li class="nk-menu-item has-sub">
                                <a href="<?=Url::to(['/client/profile/index'])?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                    <span class="nk-menu-text">Edit Profile</span>
                                </a>
                                <a href="<?=Url::to(['/site/logout', 'data-method' => 'post'])?>" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-img"></em></span>
                                    <span class="nk-menu-text">Log Out</span>
                                </a>
                            </li><!-- .nk-menu-item -->                            
                        </ul><!-- .nk-menu -->
                    </div>
                </div>