<?php
use common\widgets\Alert;
use yii\helpers\Html;
use backend\assets\CryptoAsset;
use backend\assets\FrontLogin;
use kartik\widgets\ActiveForm;

CryptoAsset::register($this);
FrontLogin::register($this);

$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/crypto');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= $dirAssests?>/pictures/mini-logo.png" type="image/png">
    <title><?= Html::encode($this->title) ?></title>

    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<?=$content?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
