<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcChannel */

$this->title = 'Create Bc Channel';
$this->params['breadcrumbs'][] = ['label' => 'Bc Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bc-channel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
