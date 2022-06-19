<?php
use yii\helpers\Url;
use common\widgets\Menu_hatchniaga;

    //Main
    $item_main[] = ['label' => \Yii::t('app', 'Dashboard'), 'level' => 1, 'url' => ['/expert/dashboard/index'], 'icon' => 'icon ni ni-template'];


    $item_main[] = ['label' => \Yii::t('app', 'Consultation'), 'level' => 1, 'url' => ['/expert/chat/index'], 'icon' => 'icon ni ni-chat-circle']   ;

    $items[] =  ['label' => 'Main', 'level' => 0];
    foreach($item_main as $item){
        $items[] = $item;
    }

    /*//Project
    $item_project[] =   ['label' => 'Projects', 'level' => 2, 'icon' => 'icon ni ni-tile-thumb', 'children' => [
        ['label' => 'Project Card', 'level' => 1, 'url' => ['/client/chat/index'], 'icon' => [], 'children' => []],
        ['label' => 'Project List', 'level' => 1, 'url' => ['/client/chat/index'], 'icon' => [], 'children' => []],
    ]];
    
    $item_project[] = ['label' => \Yii::t('app', 'Image Gallery'), 'level' => 1, 'url' => ['/client/chat/index'], 'icon' => 'icon ni ni-img'];

    $items[] =  ['label' => 'Pre-Built Pages', 'level' => 0];
    foreach($item_project as $item){
        $items[] = $item;
    }*/

    //Profile
    $item_profile[] = ['label' => \Yii::t('app', 'Edit Profile'), 'level' => 1, 'url' => ['/expert/profile/index'], 'icon' => 'icon ni ni-user'];

    $item_profile[] = ['label' => \Yii::t('app', 'Log Out'), 'level' => 1, 'url' => ['/site/logout', 'data-method' => 'post'], 'icon' => 'icon ni ni-signout'];

    $items[] =  ['label' => 'PROFILE', 'level' => 0];
    foreach($item_profile as $item){
        $items[] = $item;
    }

?>

<div class="nk-sidebar" data-content="sidebarMenu">
                    <div class="nk-sidebar-inner" data-simplebar>
                        <ul class="nk-menu nk-menu-md">



                            <?=Menu_hatchniaga::widget($items)?>
                                                     
                        </ul><!-- .nk-menu -->
                    </div>
                </div>