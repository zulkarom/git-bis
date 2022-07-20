<?php 
use yii\helpers\Url;
$web = Yii::getAlias('@web');
?>

    <div class="col-xxl-3 col-lg-3 col-sm-6">
      <a href="<?=Url::to(['view', 'id' => $model->id])?>">
        <div class="card card-bordered product-card">
            <div class="product-thumb">
                
                    <img class="card-img-top" src="<?=$web?>/dlite/images/biz-canvas.jpg" width="20%" alt="">
                
            </div>
            <div class="card-inner text-center">
                <ul class="product-tags">
                    <li style="color:#8094ae"><?=$model->user->fullname?></li>
                </ul>
                <h5 class="product-title"><?=$model->title?></h5>
                <div class="product-price text-primary h5" style="margin-top:10px"><small class="text-muted fs-13px"><?=date("d F Y",strtotime($model->created_at))?></small></div>

                <div class="bc-action-btn" style="margin-top:10px">
                <a href="<?=Url::to(['update','id' => $model->id])?>" class="btn btn-dim btn-warning"><i class="icon ni ni-edit"></i></a> 
                <a href="<?=Url::to(['delete','id' => $model->id])?>" data-confirm="Are you sure to delete this business canvas?" class="btn btn-dim btn-danger"><i class="icon ni ni-trash"></i></a>
              </div>


            </div>
        </div>
      </a>
    </div>
        
        


