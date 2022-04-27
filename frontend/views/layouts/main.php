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
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body class="nk-body npc-default has-apps-sidebar has-sidebar ">
<?php $this->beginBody() ?>

    <div class="nk-app-root">
        
        <?=$this->render('menu', [    
            'web' => $web,
        ]);
        ?>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                
               <?=$this->render('header', [    
                    'web' => $web,
                ]);
                ?>
                <!-- main header @e -->

                <!-- sidebar @s -->
                <?=$this->render('sidebar', [    
                    'web' => $web,
                ]);
                ?>
                <!-- sidebar @e -->
                <!-- content @s -->
                <?= Alert::widget() ?>
                <?=$content?>
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


<?php


Modal::begin([
    'title' => '<h4 id="bc-title"></h4>',
    'id' =>'bc-modal-canvas',
    'size' => 'modal-lg',
]);
echo '<div id="bc-form"></div>';
Modal::end();

Modal::begin([
    'title' => '<h4 id="bc-desc-title"></h4>',
    'id' =>'bc-modal-canvas-desc',
    'size' => 'modal-lg',
]);
echo '<div id="bc-desc"></div>';
Modal::end();

Modal::begin([
        'title' => '<h4>Create Chat Topic</h4>',
        'id' =>'topic',
        'size' => 'modal-lg'
    ]);
echo '<div id="formTopic"></div>';
Modal::end();

?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>