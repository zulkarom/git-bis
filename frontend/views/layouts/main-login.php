<?php
use common\widgets\Alert;
use yii\helpers\Html;
use backend\assets\AdminPress;
use backend\assets\AppAsset;
use kartik\widgets\ActiveForm;

AdminPress::register($this);
AppAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-page" style="justify-content:normal">

<?php $this->beginBody() ?>
<?=$content?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
