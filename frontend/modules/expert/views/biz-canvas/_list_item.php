<?php 
use yii\helpers\Url;
$web = Yii::getAlias('@web');
?>

    <div class="col-xxl-3 col-lg-3 col-sm-6">
      <div class="card card-bordered product-card">
          <div class="product-thumb">
              <a href="<?=Url::to(['view', 'id' => $model->id])?>">
                  <img class="card-img-top" src="<?=$web?>/dlite/images/biz-canvas.jpg" width="20%" alt="">
              </a>
          </div>
          <div class="card-inner text-center">
              <ul class="product-tags">
                  <li><a href="#"><?=$model->user->fullname?></a></li>
              </ul>
              <h5 class="product-title"><a href="html/product-details.html"><?=$model->title?></a></h5>
              <div class="product-price text-primary h5"><small class="text-muted fs-13px"><?=date("d F Y",strtotime($model->created_at))?></small></div>
          </div>
      </div>
    </div>
        
        


