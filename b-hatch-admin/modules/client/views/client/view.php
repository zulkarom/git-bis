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
<div class="white_card card_height_100 mb_30">
<div class="white_card_header">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'format' => 'html',
                'label' => 'Profile Image',
                'value' => function($model){
                    return '<img src="'.Url::to(['/client/client/profile-image', 'id' => $model->user_id]).'" width="90" height="90">';
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
            'biz_name',
            'biz_phone',
            'biz_fax',
            'biz_email',
            'biz_type',
            'biz_main_activity',
            'biz_date_execution',
            'biz_reg_no',
            'biz_capital',
            'biz_address',

        ],
    ]) ?>

</div>
</div>

<div class="card">
        <div class="card-header"><b>Assign Experts</b></div>
        <div class="card-body">
             <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Expert Name</th>
                    <th>Expert Type</th>
                    <th></th>
                </tr>
                    <?php 
                    $i = 1;
                    if($clientExpert){
                        foreach ($clientExpert as $clientEx) {
                                echo'<tr>
                                    <td>'.$i.'</td>
                                    <td>'.$clientEx->expert->user->fullname.'</td>
                                    <td>'.$clientEx->expert->expertText.'</td>
                                    <td><a href="' . Url::to(['/client/client/assign-delete', 'id' => $clientEx->id, 'cid' => $model->id]) . '" data-confirm="Are you sure to remove this expert from this client?"><span class="fa fa-trash fa-xs"></span></a></td>

                                </tr>';
                                $i++;
                        }
                    }
                    ?>               
                </thead>
              </table>
                    
            <br/>

                <p>
                    <?php echo Html::button('Assign', ['value' => Url::to(['/client/client/assign','cid' => $model->id]), 'class' => 'btn btn-success btn-sm', 'id' => 'modalBttnAssign']);

                    $this->registerJs('
                    $(function(){
                      $("#modalBttnAssign").click(function(){
                          $("#assign").modal("show")
                            .find("#formAssign")
                            .load($(this).attr("value"));
                      });
                    });
                    ');
                
                
                    ?>
                </p>
        </div>
    </div>
</div>
