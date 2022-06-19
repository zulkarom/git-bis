<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\modules\client\models\Client */

$this->title = $model->user->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="client-view">

<div class="row">
    <div class="col-md-6"><div class="card">
<div class="card-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'format' => 'html',
                'label' => 'Profile Image',
                'value' => function($model){
                    return '<img src="'.Url::to(['/expert/expert/profile-image', 'id' => $model->user_id]).'" width="90" height="90">';
                }
            ],
            [
                'label' => 'Name',
                'value' => function($model){
                    return $model->user->fullname;
                }
            ],
            [
                'label' => 'Email',
                'value' => function($model){
                    return $model->user->email;
                }
            ],
            [
                'label' => 'Expert Type',
                'value' => function($model){
                    return $model->expertText;
                }
            ],
        ],
    ]) ?>

<p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <br/>

</div>
</div></div>
    <div class="col-md-6"><div class="card">
        <div class="card-header"><b>List of Mentees</b></div>
        <div class="card-body">
             <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Client Name</th>
                    <th></th>
                </tr>
                    <?php 
                    $i = 1;
                    if($clientExpert){
                        foreach ($clientExpert as $clientEx) {
                                echo'<tr>
                                    <td>'.$i.'</td>
                                    <td>'.$clientEx->client->user->fullname.'</td>
                                    <td><a href="' . Url::to(['/expert/expert/assign-delete', 'id' => $clientEx->id, 'cid' => $model->id]) . '" data-confirm="Are you sure to remove this client from this expert?"><span class="fa fa-trash fa-xs"></span></a></td>

                                </tr>';
                                $i++;
                        }
                    }
                    ?>               
                </thead>
              </table>
                    
            <br/>

                <p>
                    <?php echo Html::button('Assign', ['value' => Url::to(['/expert/expert/assign','cid' => $model->id]), 'class' => 'btn btn-primary', 'id' => 'modalBttnAssignEx']);

                    $this->registerJs('
                    $(function(){
                      $("#modalBttnAssignEx").click(function(){
                          $("#assignEx").modal("show")
                            .find("#formAssignEx")
                            .load($(this).attr("value"));
                      });
                    });
                    ');
                
                
                    ?>
                </p>
        </div>
    </div>
</div></div>
</div>





