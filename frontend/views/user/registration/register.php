<?php
use common\models\Common;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Registration | '. Yii::$app->params['appName'];
$web = Yii::getAlias('@web');
?>

 <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Register</h5>
                    <div class="nk-block-des">
                        <p>Create New <?=Yii::$app->params['appName']?> Account</p>
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
                            </div>
                            <div class="form-control-wrap">
                                <?=$form->field($model, 'username')->label(false)->textInput(['placeholder' => 'Enter your email address','class' => 'form-control form-control-lg'])?>

                            </div>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="name">Name</label>
                            </div>
                            <div class="form-control-wrap">
                                <?=$form->field($model, 'fullname')->label(false)->textInput(['placeholder' => 'Enter your name','class' => 'form-control form-control-lg'])?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <?=$form->field($model, 'password')->label(false)->passwordInput(['placeholder' => 'Enter your password','class' => 'form-control form-control-lg'])?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Repeat Password</label>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <?=$form->field($model, 'password_repeat')->label(false)->passwordInput(['placeholder' => 'Repeat your password','class' => 'form-control form-control-lg'])?>
                            </div>
                        </div><!-- .form-group -->
                <div class="form-group">
                    <?=Html::submitButton('Register', ['class' => 'btn btn-lg btn-primary btn-block'])?>
                </div>
            <?php

            ActiveForm::end();
            ?>

            <div class="form-note-s2 pt-4"> Already have an account ? <?=Html::a('<strong>Login instead</strong>', ['/user/security/login'])?>
            </div>