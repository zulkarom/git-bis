<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcBrainstorm */

$this->title = 'Update Bc Brainstorm: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bc Brainstorms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bc-brainstorm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
