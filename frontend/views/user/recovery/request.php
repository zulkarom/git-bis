<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Forgot Password | ' . Yii::$app->params['appName'];
$this->params['breadcrumbs'][] = $this->title;
?>


            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Forgot Pasword</h5>
                    <div class="nk-block-des">
                        <p>Fill in your email to proceed.</p>
                    </div>
                </div>
            </div>


         <?php

        $form = ActiveForm::begin([
            'id' => 'password-recovery-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => false
        ]);
        ?>

        <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="email-address">Email</label>
                    </div>
                    <div class="form-control-wrap">
                        <?=$form->field($model, 'email')->label(false)->textInput(['placeholder' => 'Enter your email address','class' => 'form-control form-control-lg'])?>

                    </div>
                </div>

  <div class="form-group">
                    <?=Html::submitButton('Recover', ['class' => 'btn btn-lg btn-primary btn-block'])?>
                </div>


    <?php

    ActiveForm::end();
    ?>



    <!-- ################################################################################################ -->
    <!-- / main body -->

<div class="form-note-s2 pt-4"> <?=Html::a('<strong>Login page</strong>', ['/user/security/login'])?>
            </div>