<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcKeyParner */

$this->title = 'Create Bc Key Parner';
$this->params['breadcrumbs'][] = ['label' => 'Bc Key Parners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bc-key-parner-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
