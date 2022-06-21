<?php

/* @var $this \yii\web\View */
/* @var $content string */
use common\widgets\Alert;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use frontend\assets\HatchniagaAsset2;

HatchniagaAsset2::register($this);
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/hatchniaga');
$web = Yii::getAlias('@web');
?>
<?php

$this->beginPage()?>
<!DOCTYPE html>

<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="<?=Yii::$app->params['appName']?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= $dirAssests?>/logo/mini-logo<?=Yii::$app->params['extension']?>.png">
    <!-- Page Title  -->
    <title><?= Html::encode($this->title) ?></title>
    <!-- StyleSheets  -->
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>

<body class="nk-body npc-default has-apps-sidebar has-sidebar">
<?php

$this->beginBody()?>

    <div class="nk-app-root">

        <?=$this->render('menu', ['dirAssests' => $dirAssests]);?>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
               <?=$this->render('header', ['dirAssests' => $dirAssests]);?>
                <!-- main header @e -->

                <!-- sidebar @s -->
                <?=$this->render('sidebar', ['dirAssests' => $dirAssests]);?>
                <!-- sidebar @e -->
                <!-- content @s -->
                <div class="nk-content ">
                <div class="container-fluid">
                <div class="nk-content-inner">
                <div class="nk-content-body">
                    <?=Alert::widget()?>
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
    <?=$this->render('country', ['dirAssests' => $dirAssests]);?>
    <!-- JavaScript -->


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



<?php

$this->endBody()?>
</body>
</html>
<?php

$this->endPage()?>