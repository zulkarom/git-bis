<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\website\models\Introduction */

$this->title = 'Update Introduction: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Introductions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="introduction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
