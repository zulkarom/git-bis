<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcCustSegment */

$this->title = 'Update Bc Cust Segment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bc Cust Segments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bc-cust-segment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
