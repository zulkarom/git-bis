<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcCostStructure */

$this->title = 'Update Bc Cost Structure: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bc Cost Structures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bc-cost-structure-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
