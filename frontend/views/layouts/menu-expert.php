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
            
            ['label' => \Yii::t('app', 'Dashboard'), 'level' => 1, 'url' => ['/expert/dashboard/index'], 'icon' => $dirAssests.'/img/menu-icon/1.svg', 'children' => []],

            ['label' => \Yii::t('app', 'My Profile'), 'level' => 1, 'url' => ['/expert/profile/index'], 'icon' => $dirAssests.'/img/menu-icon/4.svg', 'children' => []],

            ['label' => \Yii::t('app', 'Consultation'), 'level' => 1, 'url' => ['/expert/expert/index'], 'icon' => $dirAssests.'/img/menu-icon/4.svg', 'children' => []],
    
        
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