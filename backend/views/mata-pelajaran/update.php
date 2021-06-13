<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MataPelajaran */

$this->title = 'Update Mata Pelajaran: ' . $model->id_pelajaran;
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pelajaran, 'url' => ['view', 'id' => $model->id_pelajaran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mata-pelajaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
