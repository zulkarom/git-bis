<?php

/* @var $this \yii\web\View */
/* @var $content string */
use backend\assets\AppAsset;
use backend\assets\CryptoAsset;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Modal;
use yii\helpers\Html;

AppAsset::register($this);
CryptoAsset::register($this);

$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/crypto');

?>
<?php

$this->beginPage()?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- <title>BitCrypto</title> -->
    <title><?=Html::encode($this->title)?></title>

    <link rel="icon" href="<?= $dirAssests?>/logo/mini-logo<?=Yii::$app->params['extension']?>.png" type="image/png">

    <?=Html::csrfMetaTags()?>
    <?php

$this->head()?>

</head>

<body class="crm_body_bg">
<?php

$this->beginBody()?>


    <?=$this->render('menu', ['dirAssests' => $dirAssests]);?>

    <section class="main_content dashboard_part large_header_bg">
    <!-- menu  -->
        <?=$this->render('upper_menu', ['dirAssests' => $dirAssests]);?>
    <!--/ menu  -->

<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_30 f_w_700 dark_text"><?=Html::encode($this->title)?></h3>

                    </div>
                    <ol class="breadcrumb page_bradcam mb-0">
                        <?php

echo Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []
                        ])?>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?=Alert::widget()?>
                <?=$content?>
            </div>
        </div>
    </div>
</div>

<!-- footer part -->
    <?=$this->render('footer', ['dirAssests' => $dirAssests]);?>
<!-- end of footer part -->
</section>


<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

<?php
Modal::begin([
    'title' => '<h4>Assign Expert</h4>',
    'id' => 'assign',
    'size' => 'modal-lg'
]);

echo '<div id="formAssign"></div>';

Modal::end();

Modal::begin([
    'title' => '<h4>Assign Client</h4>',
    'id' => 'assignEx',
    'size' => 'modal-lg'
]);

echo '<div id="formAssignEx"></div>';

Modal::end();

Modal::begin([
    'title' => '<h4>Portfolio Image</h4>',
    'id' => 'portfolio',
    'size' => 'modal-lg'
]);

echo '<div id="formPortfolio"></div>';

Modal::end();

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

?>

<?php

$this->endBody()?>
</body>
</html>
<?php

$this->endPage()?>