<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcCustSegment */

$this->title = 'Create Bc Cust Segment';
$this->params['breadcrumbs'][] = ['label' => 'Bc Cust Segments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bc-cust-segment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>