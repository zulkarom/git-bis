<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcKeyActivity */

$this->title = 'Create Bc Key Activity';
$this->params['breadcrumbs'][] = ['label' => 'Bc Key Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bc-key-activity-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
