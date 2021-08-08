<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Modal;
use backend\assets\CryptoAsset;
use backend\assets\AppAsset;

AppAsset::register($this);
CryptoAsset::register($this);


$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/crypto');


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- <title>BitCrypto</title> -->
    <title><?= Html::encode($this->title) ?></title>

    <link rel="icon" href="<?= $dirAssests?>/icon/favicon.png" type="image/png">

    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>

</head>

<body class="crm_body_bg">
<?php $this->beginBody() ?>


    <?=$this->render('menu', [    
        'dirAssests' => $dirAssests,
    ]);
    ?>

    <section class="main_content dashboard_part large_header_bg">
    <!-- menu  -->
        <?=$this->render('upper_menu', [    
            'dirAssests' => $dirAssests,
        ]);
        ?>
    <!--/ menu  -->
    
<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h3 class="f_s_30 f_w_700 dark_text"><?= Html::encode($this->title) ?></h3>
                        
                    </div>
                    <ol class="breadcrumb page_bradcam mb-0">
                        <?php echo
                             Breadcrumbs::widget(
                                 [
                                     'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                 ]
                             ) 
                        ?>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?= Alert::widget() ?>
                <?=$content?>
            </div>
        </div>
    </div>
</div>

<!-- footer part -->
    <?=$this->render('footer', [    
        'dirAssests' => $dirAssests,
    ]);
    ?>
<!-- end of footer part -->    
</section>

<!-- ### CHAT_MESSAGE_BOX   ### -->

    <?=$this->render('chat_message', [    
        'dirAssests' => $dirAssests,
    ]);
    ?>

<!--/### CHAT_MESSAGE_BOX  ### -->

<div id="back-top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

<?php
Modal::begin([
        'title' => '<h4>Add Key Partner</h4>',
        'id' =>'createPartner',
        'size' => 'modal-lg',
    ]);

echo '<div id="formCreatePartner"></div>';

Modal::end();

Modal::begin([
        'title' => '<h4>Update Key Partner</h4>',
        'id' =>'updtPartner',
        'size' => 'modal-lg',
    ]);

echo '<div id="formUpdatePartner"></div>';

Modal::end();
?>

<?php
Modal::begin([
    'title' => '<h4>Add Key Activities</h4>',
    'id' =>'createActivity',
    'size' => 'modal-lg'
]);
echo '<div id="formCreateActivity"></div>';
Modal::end();

Modal::begin([
        'title' => '<h4>Update Key Activities</h4>',
        'id' =>'updtActivity',
        'size' => 'modal-lg',
    ]);

echo '<div id="formUpdateActivity"></div>';

Modal::end();
?>

<?php
Modal::begin([
    'title' => '<h4>Add Key Resources</h4>',
    'id' =>'createResources',
    'size' => 'modal-lg'
]);
echo '<div id="formCreateResources"></div>';
Modal::end();

Modal::begin([
        'title' => '<h4>Update Key Resources</h4>',
        'id' =>'updtResource',
        'size' => 'modal-lg',
    ]);

echo '<div id="formUpdateResource"></div>';

Modal::end();
?>

<?php
Modal::begin([
    'title' => '<h4>Add Value Proposition</h4>',
    'id' =>'createProposition',
    'size' => 'modal-lg'
]);
echo '<div id="formCreateProposition"></div>';
Modal::end();

Modal::begin([
        'title' => '<h4>Update Value Proposition</h4>',
        'id' =>'updtProposition',
        'size' => 'modal-lg',
    ]);

echo '<div id="formUpdateProposition"></div>';

Modal::end();
?>

<?php
Modal::begin([
    'title' => '<h4>Add Customer Relationship</h4>',
    'id' =>'createRelationship',
    'size' => 'modal-lg'
]);
echo '<div id="formCreateRelationship"></div>';
Modal::end();

Modal::begin([
        'title' => '<h4>Update Customer Relationship</h4>',
        'id' =>'updtRelationship',
        'size' => 'modal-lg',
    ]);

echo '<div id="formUpdateRelationship"></div>';

Modal::end();
?>

<?php
Modal::begin([
    'title' => '<h4>Add Channels</h4>',
    'id' =>'createChannel',
    'size' => 'modal-lg'
]);
echo '<div id="formCreateChannel"></div>';
Modal::end();

Modal::begin([
        'title' => '<h4>Update Channels</h4>',
        'id' =>'updtChannel',
        'size' => 'modal-lg',
    ]);

echo '<div id="formUpdateChannel"></div>';

Modal::end();
?>

<?php
Modal::begin([
    'title' => '<h4>Add Customer Segments
</h4>',
    'id' =>'createSegment',
    'size' => 'modal-lg'
]);
echo '<div id="formCreateSegment"></div>';
Modal::end();

Modal::begin([
        'title' => '<h4>Update Customer Segments</h4>',
        'id' =>'updtSegment',
        'size' => 'modal-lg',
    ]);

echo '<div id="formUpdateSegment"></div>';

Modal::end();
?>

<?php
Modal::begin([
    'title' => '<h4>Add Cost Structure</h4>',
    'id' =>'createStructure',
    'size' => 'modal-lg'
]);
echo '<div id="formCreateStructure"></div>';
Modal::end();

Modal::begin([
        'title' => '<h4>Update Cost Structure</h4>',
        'id' =>'updtStructure',
        'size' => 'modal-lg',
    ]);

echo '<div id="formUpdateStructure"></div>';

Modal::end();
?>

<?php
Modal::begin([
    'title' => '<h4>Add Revenue Streams</h4>',
    'id' =>'createStream',
    'size' => 'modal-lg'
]);
echo '<div id="formCreateStream"></div>';
Modal::end();

Modal::begin([
        'title' => '<h4>Update Revenue Streams</h4>',
        'id' =>'updtStream',
        'size' => 'modal-lg',
    ]);

echo '<div id="formUpdateStream"></div>';

Modal::end();
?>

<?php
Modal::begin([
    'title' => '<h4>Add Brainstorming Space</h4>',
    'id' =>'createSpace',
    'size' => 'modal-lg'
]);
echo '<div id="formCreateSpace"></div>';
Modal::end();

Modal::begin([
        'title' => '<h4>Update Brainstorming Space</h4>',
        'id' =>'updtSpace',
        'size' => 'modal-lg',
    ]);

echo '<div id="formUpdateSpace"></div>';

Modal::end();
?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>