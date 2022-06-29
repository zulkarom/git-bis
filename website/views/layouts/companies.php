<?php
use backend\modules\website\models\Portfolio;
use yii\helpers\Url;

$portfolio = Portfolio::find()
->where(['is_show' => 1])
->andWhere(['!=', 'image_file', ''])
->all();
?>
      <div class="row text-center">
         <div class="container-layout padding-tb-xl margin-auto">
            <div class="title-with-doubleborder"></div>
            <div class="margin-b-xl"> 
               

               <?php if(Yii::$app->params['appId'] == 1){?>
                  <h2 class="text-bold">PORTFOLIO COMPANIES</h2>
                <?php }else{ ?>  
                  <h2 class="text-bold">ENTERPRISE PORTFOLIO</h2>
                    <?php } ?>



            </div>
            

          
            <div class="row companies-wrapper">
            
            <?php if($portfolio): ?>
               <?php foreach ($portfolio as $port) : ?>
               <div class="grid-containerCol col-xs-6 col-md-3">
                     <div class="company-item">
                        <a data-modal-id="agencasa" target="_blank" href="<?=$port->image_url?>" class="company-link w-inline-block">
                           <img src="<?=Url::to(['portfolio/portfolio-image', 'id' => $port->id])?>" alt="" class="image-3 companies-image--black">
                           <img src="<?=Url::to(['portfolio/portfolio-image2', 'id' => $port->id])?>" alt="" class="image-2">
                        </a>
                     </div>
                   </div>
               <?php endforeach; ?>
            <?php endif; ?> 

 
             </div>

           </div>
        </div>


         