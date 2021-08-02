<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcCustRelation */

$this->title = 'Create Bc Cust Relation';
$this->params['breadcrumbs'][] = ['label' => 'Bc Cust Relations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bc-cust-relation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>