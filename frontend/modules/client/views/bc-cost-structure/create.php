<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcCostStructure */

$this->title = 'Create Bc Cost Structure';
$this->params['breadcrumbs'][] = ['label' => 'Bc Cost Structures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bc-cost-structure-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
