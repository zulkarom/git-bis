<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MataPelajaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mata Pelajarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-pelajaran-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mata Pelajaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pelajaran',
            'result_id',
            'psubjek',
            'gred',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
