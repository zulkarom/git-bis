<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use common\models\Common;
use dektrium\user\widgets\Connect;

$this->title = 'Login | '.Yii::$app->params['appName'];
$this->params['breadcrumbs'][] = $this->title;
$web = Yii::getAlias('@web');
?>

<div class="nk-split nk-split-page nk-split-md">
    <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
        <div class="absolute-top-right d-lg-none p-3 p-sm-5">
            <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
        </div>
        <div class="nk-block nk-block-middle nk-auth-body">
            <div class="brand-logo pb-5">
                <a href="html/index.html" class="logo-link">
                    <img class="logo-light logo-img logo-img-lg" src="<?=$web?>/dlite/images/logo-top.png" srcset="<?=$web?>/dlite/images/logo2x.png 2x" alt="logo">
                    <img class="logo-dark logo-img logo-img-lg" src="<?=$web?>/dlite/images/logo-top.png" srcset="<?=$web?>/dlite/images/logo-dark2x.png 2x" alt="logo-dark">
                </a>
            </div>
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Sign-In</h5>
                    <div class="nk-block-des">
                        <p>Access the <?=Yii::$app->params['appName']?> panel using your email and passcode.</p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <?php $form = ActiveForm::begin(); ?>
            <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="role">Please Choose</label>
                    </div>
                    <div class="form-control-wrap">
                        <?= $form
                            ->field($model, 'role')
                            ->dropDownList(Common::role(), ['class' => 'form-control form-control-lg'])
                            ->label(false)
                        ?>
                       
                    </div>
                </div><!-- .form-group -->
                        
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="email-address">Email or Username</label>
                        <a class="link link-primary link-sm" tabindex="-1" href="#">Need Help?</a>
                    </div>
                    <div class="form-control-wrap">
                        <?= $form
                            ->field($model, 'login')
                            ->label(false)
                            ->textInput(['placeholder' => 'Enter your email address', 'class' => 'form-control form-control-lg']) 
                         ?>
                       
                    </div>
                </div><!-- .form-group -->
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="password">Passcode</label>
                        <a class="link link-primary link-sm" tabindex="-1" href="html/pages/auths/auth-reset.html">Forgot Code?</a>
                    </div>
                    <div class="form-control-wrap">
                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <?= $form
                            ->field($model, 'password')
                            ->label(false)
                            ->passwordInput(['placeholder' => 'Enter your passcode', 'class' => 'form-control form-control-lg'])
                        ?>
                    </div>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?= Html::submitButton('Sign in', ['class' => 'btn btn-lg btn-primary btn-block']) ?>
                </div>
            
            <?php ActiveForm::end(); ?>
            <div class="form-note-s2 pt-4"> New on our platform? <?= Html::a('Create an account', ['/user/registration/register']) ?>
            </div>
            <div class="text-center pt-4 pb-3">
                <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
            </div>
            <ul class="nav justify-center gx-4">
                <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
            </ul>
            <div class="text-center mt-5">
                <span class="fw-500">I don't have an account? <a href="#">Try 15 days free</a></span>
            </div>
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
                        <a class="nav-link" href="#">Help</a>
                    </li>
                    <li class="nav-item dropup">
                        <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-bs-toggle="dropdown" data-offset="0,10"><small>English</small></a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                            <ul class="language-list">
                                <li>
                                    <a href="#" class="language-item">
                                        <img src="<?=$web?>/dlite/images/flags/english.png" alt="" class="language-flag">
                                        <span class="language-name">English</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <img src="<?=$web?>/dlite/images/flags/spanish.png" alt="" class="language-flag">
                                        <span class="language-name">Español</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <img src="<?=$web?>/dlite/images/flags/french.png" alt="" class="language-flag">
                                        <span class="language-name">Français</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <img src="<?=$web?>/dlite/images/flags/turkey.png" alt="" class="language-flag">
                                        <span class="language-name">Türkçe</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul><!-- .nav -->
            </div>
            <div class="mt-3">
                <p>&copy; 2022 <?=Yii::$app->params['appName']?>. All Rights Reserved.</p>
            </div>
        </div><!-- .nk-block -->
    </div><!-- .nk-split-content -->
    <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
        <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
            <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                <div class="slider-item">
                    <div class="nk-feature nk-feature-center">
                        <div class="nk-feature-img">
                            <img class="round" src="<?=$web?>/dlite/images/slides/promo-a.png" srcset="<?=$web?>/dlite/images/slides/promo-a2x.png 2x" alt="">
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
                            <img class="round" src="<?=$web?>/dlite/images/slides/promo-b.png" srcset="<?=$web?>/dlite/images/slides/promo-b2x.png 2x" alt="">
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
                            <img class="round" src="<?=$web?>/dlite/images/slides/promo-c.png" srcset="<?=$web?>/dlite/images/slides/promo-c2x.png 2x" alt="">
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
    </div><!-- .nk-split-content -->
</div><!-- .nk-split -->


		
		
        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>
