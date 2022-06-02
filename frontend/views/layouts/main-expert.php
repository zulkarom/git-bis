<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use yii\bootstrap4\Modal;

AppAsset::register($this);

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
    <link rel="shortcut icon" href="<?=$web?>/images/favicon.png">
    <!-- Page Title  -->
    <title><?= Html::encode($this->title) ?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?=$web?>/dlite/assets/css/dashlite.css?ver=3.0.1">
    <link id="skin-default" rel="stylesheet" href="<?=$web?>/dlite/assets/css/theme.css?ver=3.0.1">
    <link rel="stylesheet" type="text/css" href="<?=$web?>/dlite/assets/css/libs/fontawesome-icons.css"> 
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body class="nk-body npc-default has-apps-sidebar has-sidebar no-touch nk-nio-theme">
<?php $this->beginBody() ?>

    <div class="nk-app-root">
        
        <?=$this->render('menu-expert', [    
            'web' => $web,
        ]);
        ?>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
               <?=$this->render('header-expert', [    
                    'web' => $web,
                ]);
                ?>
                <!-- main header @e -->

                <!-- sidebar @s -->
                <?=$this->render('sidebar-expert', [    
                    'web' => $web,
                ]);
                ?>
                <!-- sidebar @e -->
                <!-- content @s -->
                <div class="nk-content ">
                <div class="container-fluid">
                <div class="nk-content-inner">
                <div class="nk-content-body">
                    <?= Alert::widget() ?>
                    <?=$content?>
                </div>
                </div>
                </div>
                </div>
                <!-- content @e -->
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
    <!-- JavaScript -->
    <script src="<?=$web?>/dlite/assets/js/bundle.js?ver=3.0.1"></script>
    <script src="<?=$web?>/dlite/assets/js/scripts.js?ver=3.0.1"></script>
    <script src="<?=$web?>/dlite/assets/js/charts/gd-analytics.js?ver=3.0.1"></script>
    <script src="<?=$web?>/dlite/assets/js/libs/jqvmap.js?ver=3.0.1"></script>
    <script src="<?=$web?>/dlite/assets/js/charts/gd-default.js?ver=3.0.1"></script>
    <script src="<?=$web?>/dlite/js/example-chart.js?ver=3.0.1"></script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>