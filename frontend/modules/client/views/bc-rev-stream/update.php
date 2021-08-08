<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcRevStream */

$this->title = 'Update Bc Rev Stream: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bc Rev Streams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bc-rev-stream-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
