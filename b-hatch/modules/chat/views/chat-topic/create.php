<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ChatTopic */

$this->title = 'Create Chat Topic';
$this->params['breadcrumbs'][] = ['label' => 'Chat Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-topic-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
