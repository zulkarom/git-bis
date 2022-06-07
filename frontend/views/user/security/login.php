<?php
use common\models\Common;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Login | ' . Yii::$app->params['appName'];
$this->params['breadcrumbs'][] = $this->title;
$web = Yii::getAlias('@web');
?>


            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Login Page</h5>
                    <div class="nk-block-des">
                        <p>Access the <?=Yii::$app->params['appName']?> panel using your email and password.</p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <?php

            $form = ActiveForm::begin();
            ?>
            <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="role">Please Choose</label>
                    </div>
                    <div class="form-control-wrap">
                        <?=$form->field($model, 'role')->dropDownList(Common::role(), ['class' => 'form-control form-control-lg'])->label(false)?>

                    </div>
                </div><!-- .form-group -->

                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="email-address">Email</label>
                        <a class="link link-primary link-sm" tabindex="-1" href="javascript:void(0)">Need Help?</a>
                    </div>
                    <div class="form-control-wrap">
                        <?=$form->field($model, 'login')->label(false)->textInput(['placeholder' => 'Enter your email address','class' => 'form-control form-control-lg'])?>

                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="password">Password</label>

                        <?=Html::a('Forgot Password?', ['/user/recovery/request'], ['class' => 'link link-primary link-sm'])?>
                    </div>
                    <div class="form-control-wrap">
                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <?=$form->field($model, 'password')->label(false)->passwordInput(['placeholder' => 'Enter your password','class' => 'form-control form-control-lg'])?>
                    </div>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?=Html::submitButton('Sign in', ['class' => 'btn btn-lg btn-primary btn-block'])?>
                </div>

            <?php

            ActiveForm::end();
            ?>
            <div class="form-note-s2 pt-4"> New on our platform? <?=Html::a('Create an account', ['/user/registration/register'])?>
            </div>




