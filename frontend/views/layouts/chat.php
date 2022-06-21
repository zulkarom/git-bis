<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Modal;
use frontend\assets\HatchniagaAsset;
use frontend\assets\ChatAsset;

HatchniagaAsset::register($this);
ChatAsset::register($this);


$web = Yii::getAlias('@web');
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/hatchniaga');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>

<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?=$dirAssests?>/icon/favicon.png">
    <!-- Page Title  -->
    <title><?= Html::encode($this->title) ?></title>
    <!-- StyleSheets  -->
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body class="nk-body npc-apps apps-only has-apps-sidebar npc-apps-chat no-touch nk-nio-theme has-sidebar chat-profile-autohide">
<?php $this->beginBody() ?>

    <div class="nk-app-root">

        <?php if(Yii::$app->user->identity->role == 1){
            echo $this->render('menu', [    
            'dirAssests' => $dirAssests,
            ]);
        }else{
            echo $this->render('menu-expert', [    
            'dirAssests' => $dirAssests,
            ]);
        }?>
        
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                
                <?php if(Yii::$app->user->identity->role == 1){
                    echo $this->render('header', [    
                    'dirAssests' => $dirAssests,
                    ]);
                }else{
                    echo $this->render('header-expert', [    
                    'dirAssests' => $dirAssests,
                    ]);
                }?>
                <!-- main header @e -->


                <?php if(Yii::$app->user->identity->role == 1){
                    echo $this->render('sidebar', [    
                        'dirAssests' => $dirAssests,
                    ]);
                }else{
                    echo $this->render('sidebar-expert', [    
                        'dirAssests' => $dirAssests,
                    ]);
                }?>

                <?php 
                    if(Yii::$app->controller->id == 'chat'){
                        $c = 'p-0';
                    }else{
                        $c='';
                    }
                ?>

                <div class="nk-content <?=$c?>">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <!-- content @s -->
                            <?= Alert::widget() ?>
                            <?=$content?>
                            <!-- content @e -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
    <?=$this->render('country', [    
        'dirAssests' => $dirAssests,
    ]);
    ?>
    


<?php

Modal::begin([
    'title' => '<h4 id="bc-title"></h4>',
    'id' => 'bc-modal-canvas',
    'size' => 'modal-lg'
]);
echo '<div id="bc-form"></div>';
Modal::end();

Modal::begin([
    'title' => '<h4 id="bc-desc-title"></h4>',
    'id' => 'bc-modal-canvas-desc',
    'size' => 'modal-lg'
]);
echo '<div id="bc-desc"></div>';
Modal::end();

Modal::begin([
    'title' => '<h4>Create Chat Topic</h4>',
    'id' => 'topic',
    'size' => 'modal-lg'
]);
echo '<div id="formTopic"></div>';
Modal::end();

?>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>