<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BcCustRelation */

$this->title = 'Create Bc Cust Relation';
$this->params['breadcrumbs'][] = ['label' => 'Bc Cust Relations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bc-cust-relation-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
