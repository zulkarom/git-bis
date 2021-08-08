<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcKeyResource */

$this->title = 'Update Bc Key Resource: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bc Key Resources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bc-key-resource-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
