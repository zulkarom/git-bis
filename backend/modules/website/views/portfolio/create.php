<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\website\models\Portfolio */

$this->title = 'Create Portfolio';
$this->params['breadcrumbs'][] = ['label' => 'Portfolios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-create">

    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
    ]) ?>

</div>
