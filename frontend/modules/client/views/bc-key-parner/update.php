<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcKeyParner */

$this->title = 'Update Bc Key Parner: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bc Key Parners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bc-key-parner-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
