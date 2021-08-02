<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcValProposition */

$this->title = 'Update Bc Val Proposition: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bc Val Propositions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bc-val-proposition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
