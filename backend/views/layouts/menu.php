<?php 

use yii\helpers\Url;
use common\widgets\Menu_crypto;

?> 
<!-- <nav class="sidebar dark_sidebar"> -->
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index.html"><img src="<?= $dirAssests?>/pictures/logo-top.png" alt=""></a>
        <a class="small_logo" href="index.html"><img src="<?= $dirAssests?>/pictures/mini-logo.png" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu"> 
                

    <?=Menu_crypto::widget(
    [
            
            ['label' => \Yii::t('app', 'Dashboard'), 'level' => 1, 'url' => ['/site/index'], 'icon' => $dirAssests.'/img/menu-icon/1.svg', 'children' => []],
            
            // ['label' => 'Announcement', 'level' => 1, 'url' => ['/announcement/index'], 'icon' => 'fa fa-bullhorn', 'children' => []],
            
            ['label' => \Yii::t('app', 'Website'), 'level' => 2 , 'icon' => $dirAssests.'/img/menu-icon/Pages.svg', 'children' => [
                ['label' => \Yii::t('app', 'Introduction'), 'url' => ['/website/introduction/index'], 'icon' => 'fa fa-circle'],
                ['label' => \Yii::t('app', 'Section'), 'url' => ['/website/section/index'], 'icon' => 'fa fa-circle'],
                ['label' => \Yii::t('app', 'Portfolio'), 'url' => ['/website/portfolio/index'], 'icon' => 'fa fa-circle'],
            ]],

            ['label' => \Yii::t('app', 'Clients'), 'level' => 1, 'url' => ['/client/client/index'], 'icon' => $dirAssests.'/img/menu-icon/4.svg', 'children' => []],

            ['label' => \Yii::t('app', 'Experts'), 'level' => 1, 'url' => ['/expert/expert/index'], 'icon' => $dirAssests.'/img/menu-icon/4.svg', 'children' => []],

            // ['label' => \Yii::t('app', 'Business Canvas'), 'level' => 1, 'url' => ['/client/biz-canvas/index'], 'icon' => $dirAssests.'/img/menu-icon/18.svg', 'children' => []],

            ['label' => \Yii::t('app', 'Business Canvas'), 'level' => 2 , 'icon' => $dirAssests.'/img/menu-icon/18.svg', 'children' => [
                
                ['label' => \Yii::t('app', 'List of Canvas'), 'url' => ['/client/biz-canvas/index'], 'icon' => 'fa fa-circle'],

                ['label' => \Yii::t('app', 'Categories'), 'url' => ['/bc-category/index'], 'icon' => 'fa fa-circle'],
                
            ]],
        
        ]
    
    )?>

                    
                    
                    
<br /><br /><br /><br /><br /><br />
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
    </ul>
</nav>
<?php 
/* 
$this->registerJs('

$(".has-treeview").click(function(){
    
    if($(this.hasClass("menu-open") == false){
        $(".has-treeview").each(function(i, obj) {
            $(this).removeClass("menu-open");
        });
    }
    
    
});

');


 */
?>