<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Modal;
use frontend\assets\HatchniagaAsset;

HatchniagaAsset::register($this);


$web = Yii::getAlias('@web');

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
    <link rel="shortcut icon" href="<?=$web?>/dlite/images/favicon.png">
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
            'web' => $web,
            ]);
        }else{
            echo $this->render('menu-expert', [    
            'web' => $web,
            ]);
        }?>
        
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                
               <?=$this->render('chat_header', [    
                    'web' => $web,
                ]);
                ?>
                <!-- main header @e -->


                <?php if(Yii::$app->user->identity->role == 1){
                    echo $this->render('sidebar', [    
                        'web' => $web,
                    ]);
                }else{
                    echo $this->render('sidebar-expert', [    
                        'web' => $web,
                    ]);
                }?>

                <div class="nk-content p-0">
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
        'web' => $web,
    ]);
    ?>
    






<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>