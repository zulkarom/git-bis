<?php 

use yii\helpers\Url;
use common\widgets\Menu;

?> 
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">   
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
                

        <?=Menu::widget(
        [
                
                ['label' => \Yii::t('app', 'Dashboard'), 'level' => 1, 'url' => ['/client/dashboard/index'], 'icon' => $dirAssests.'/images/svg-icon/sidebar-menu/dashboard.svg'],

                ['label' => \Yii::t('app', 'My Profile'), 'level' => 1, 'url' => ['/client/profile/index'], 'icon' => $dirAssests.'/images/svg-icon/user.svg'],

                ['label' => \Yii::t('app', 'Consultation'), 'level' => 1, 'url' => ['/client/expert/index'], 'icon' => $dirAssests.'/images/svg-icon/sidebar-menu/comment.svg'],

                ['label' => \Yii::t('app', 'Consultation'), 'level' => 1, 'url' => ['/client/expert/index'], 'icon' => $dirAssests.'/images/svg-icon/sidebar-menu/comment.svg'],

                ['label' => \Yii::t('app', 'Business Canvas'), 'level' => 1, 'url' => ['/client/biz-canvas/index'], 'icon' => $dirAssests.'/images/svg-icon/sidebar-menu/apps.svg'],

                ['label' => \Yii::t('app', 'Log Out'), 'level' => 1, 'url' => ['/site/logout'], ['data-method' => 'post'], 'icon' => $dirAssests.'/images/svg-icon/logout.svg'],
        
            
            ]
        
        )?>
        </ul>
    </section>
</aside>
