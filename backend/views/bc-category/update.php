<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcCategory */

$this->title = 'Update Category';
$this->params['breadcrumbs'][] = ['label' => 'Bc Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bc-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
