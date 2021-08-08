<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcKeyActivity */

$this->title = 'Update Bc Key Activity: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bc Key Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bc-key-activity-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
