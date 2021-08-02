<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcBrainstorm */

$this->title = 'Create Bc Brainstorm';
$this->params['breadcrumbs'][] = ['label' => 'Bc Brainstorms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bc-brainstorm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
