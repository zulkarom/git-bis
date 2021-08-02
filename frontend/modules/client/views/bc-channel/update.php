<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcChannel */

$this->title = 'Update Bc Channel: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bc Channels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bc-channel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>