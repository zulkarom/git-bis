<?php
use common\widgets\Alert;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;


$web = Yii::getAlias('@web');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?=$web?>/dlite/images/mini-logo.png">
    <!-- Page Title  -->
    <title><?= Html::encode($this->title) ?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?=$web?>/dlite/assets/css/dashlite.css?ver=3.0.1">
    <link id="skin-default" rel="stylesheet" href="<?=$web?>/dlite/assets/css/theme.css?ver=3.0.1">
    
    <?php $this->head() ?>
</head>
<body class="nk-body npc-default pg-auth">

<?php $this->beginBody() ?>
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <?=$content?>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="<?=$web?>/dlite/assets/js/bundle.js?ver=3.0.1"></script>
    <script src="<?=$web?>/dlite/assets/js/scripts.js?ver=3.0.1"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
