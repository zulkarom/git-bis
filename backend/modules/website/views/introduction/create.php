<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\website\models\Introduction */

$this->title = 'Create Introduction';
$this->params['breadcrumbs'][] = ['label' => 'Introductions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="introduction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
