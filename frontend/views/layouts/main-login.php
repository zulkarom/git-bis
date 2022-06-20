<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\HatchniagaAsset;

HatchniagaAsset::register($this);

// $web = Yii::getAlias('@web');
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/hatchniaga');
?>
<?php

$this->beginPage()?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?=$dirAssests?>/logo/mini-logo<?=Yii::$app->params['extension']?>.png">
    <!-- Page Title  -->
    <title><?=Html::encode($this->title)?></title>
    <!-- StyleSheets  -->
    <?php

    $this->head()?>
</head>
<body class="nk-body npc-default pg-auth">

<?php

$this->beginBody()?>
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">




<div class="nk-split nk-split-page nk-split-md">
    <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
        <div class="absolute-top-right d-lg-none p-3 p-sm-5">
            <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
        </div>
        <div class="nk-block nk-block-middle nk-auth-body">
            <div class="brand-logo pb-5">
                <a href="<?=Url::to(['/user/security/login'])?>" class="logo-link">
                    <img class="logo-light logo-img logo-img-lg" src="<?=$dirAssests?>/logo/logo-top<?=Yii::$app->params['extension']?>.png" srcset="<?=$dirAssests?>/logo/logo2x<?=Yii::$app->params['extension']?>.png 2x" alt="logo">
                    <img class="logo-dark logo-img logo-img-lg" src="<?=$dirAssests?>/logo/logo-top<?=Yii::$app->params['extension']?>.png" srcset="<?=$dirAssests?>/logo/logo-dark2x<?=Yii::$app->params['extension']?>.png 2x" alt="logo-dark">
                </a>
            </div>


                 <?=$content?>

        </div><!-- .nk-block -->
        <div class="nk-block nk-auth-footer">
            <div class="nk-block-between">
                <ul class="nav nav-sm">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Terms & Condition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(['/user/security/login'])?>">Login Page</a>
                    </li>

                </ul><!-- nav -->
            </div>
            <div class="mt-3">
                <p>&copy; 2022 <?=Yii::$app->params['appName']?>. All Rights Reserved.</p>
            </div>
        </div><!-- nk-block -->
    </div><!-- nk-split-content -->
    <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
        <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
            <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                <div class="slider-item">
                    <div class="nk-feature nk-feature-center">
                        <div class="nk-feature-img">
                            <img class="round" src="<?=$dirAssests?>/images/slides/promo-a.png" srcset="<?=$dirAssests?>/images/slides/promo-a2x.png 2x" alt="">
                        </div>
                        <div class="nk-feature-content py-4 p-sm-5">
                            <h4><?=Yii::$app->params['appName']?></h4>
                            <p>You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                        </div>
                    </div>
                </div><!-- .slider-item -->
                <div class="slider-item">
                    <div class="nk-feature nk-feature-center">
                        <div class="nk-feature-img">
                            <img class="round" src="<?=$dirAssests?>/images/slides/promo-b.png" srcset="<?=$dirAssests?>/images/slides/promo-b2x.png 2x" alt="">
                        </div>
                        <div class="nk-feature-content py-4 p-sm-5">
                            <h4><?=Yii::$app->params['appName']?></h4>
                            <p>You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                        </div>
                    </div>
                </div><!-- .slider-item -->
                <div class="slider-item">
                    <div class="nk-feature nk-feature-center">
                        <div class="nk-feature-img">
                            <img class="round" src="<?=$dirAssests?>/images/slides/promo-c.png" srcset="<?=$dirAssests?>/images/slides/promo-c2x.png 2x" alt="">
                        </div>
                        <div class="nk-feature-content py-4 p-sm-5">
                            <h4><?=Yii::$app->params['appName']?></h4>
                            <p>You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                        </div>
                    </div>
                </div><!-- .slider-item -->
            </div><!-- .slider-init -->
            <div class="slider-dots"></div>
            <div class="slider-arrows"></div>
        </div><!-- .slider-wrap -->
    </div><!-- nk-split-content -->
</div><!-- nk-split -->

















                </div>
            </div>
        </div>
    </div>

<?php

$this->endBody()?>
</body>
</html>
<?php

$this->endPage()?>
