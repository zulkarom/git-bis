<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcKeyResource */

$this->title = 'Create Bc Key Resource';
$this->params['breadcrumbs'][] = ['label' => 'Bc Key Resources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bc-key-resource-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
