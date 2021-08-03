<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcValProposition */

$this->title = 'Create Bc Val Proposition';
$this->params['breadcrumbs'][] = ['label' => 'Bc Val Propositions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bc-val-proposition-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
