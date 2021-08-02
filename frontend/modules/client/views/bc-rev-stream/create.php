<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcRevStream */

$this->title = 'Create Bc Rev Stream';
$this->params['breadcrumbs'][] = ['label' => 'Bc Rev Streams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bc-rev-stream-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
