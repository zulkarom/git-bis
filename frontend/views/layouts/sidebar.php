<?php
use yii\helpers\Url;
use common\widgets\Menu_crypto;

    //Main
    $item_main[] = ['label' => \Yii::t('app', 'Dashboard'), 'level' => 1, 'url' => ['/client/dashboard/index'], 'icon' => 'icon ni ni-dashboard'];

    $item_main[] = ['label' => \Yii::t('app', 'Business Canvas'), 'level' => 1, 'url' => ['/client/biz-canvas/index'], 'icon' => 'icon ni ni-speed'];

    $item_main[] = ['label' => \Yii::t('app', 'Consultation'), 'level' => 1, 'url' => ['/client/chat/index'], 'icon' => 'icon ni ni-bitcoin-cash']   ;

    $items[] =  ['label' => 'Main', 'level' => 0];
    foreach($item_main as $item){
        $items[] = $item;
    }

    //Project
    $item_project[] =   ['label' => 'Projects', 'level' => 2, 'icon' => 'icon ni ni-tile-thumb', 'children' => [
        ['label' => 'Project Card', 'level' => 1, 'url' => ['/client/chat/index'], 'icon' => [], 'children' => []],
        ['label' => 'Project List', 'level' => 1, 'url' => ['/client/chat/index'], 'icon' => [], 'children' => []],
    ]];
    
    $item_project[] = ['label' => \Yii::t('app', 'Image Gallery'), 'level' => 1, 'url' => ['/client/chat/index'], 'icon' => 'icon ni ni-img'];

    $items[] =  ['label' => 'Pre-Built Pages', 'level' => 0];
    foreach($item_project as $item){
        $items[] = $item;
    }

    //Profile
    $item_profile[] = ['label' => \Yii::t('app', 'Edit Profile'), 'level' => 1, 'url' => ['/client/profile/index'], 'icon' => 'icon ni ni-dashboard'];

    $item_profile[] = ['label' => \Yii::t('app', 'Log Out'), 'level' => 1, 'url' => ['/site/logout', 'data-method' => 'post'], 'icon' => 'icon ni ni-speed'];

    $items[] =  ['label' => 'PROFILE', 'level' => 0];
    foreach($item_profile as $item){
        $items[] = $item;
    }

?>

<div class="nk-sidebar" data-content="sidebarMenu">
                    <div class="nk-sidebar-inner" data-simplebar>
                        <ul class="nk-menu nk-menu-md">



                            <?=Menu_crypto::widget($items)?>
                                                     
                        </ul><!-- .nk-menu -->
                    </div>
                </div>