<?php
use backend\modules\website\models\Portfolio;
use yii\helpers\Url;

$portfolio = Portfolio::find()->all();
?>
      <div class="row text-center">
         <div class="container-layout padding-tb-xl margin-auto">
            <div class="title-with-doubleborder"></div>
            <div class="margin-b-xl"> 
               <h2 class="text-bold">PORTFOLIO COMPANIES</h2>
            </div>
            

          
            <div class="companies-wrapper">
            <?php if($portfolio): ?>
               <?php foreach ($portfolio as $port) : ?>
               <div class="grid-containerCol w-col-3 w-col-stack">
                     <div class="company-item">
                        <a data-modal-id="agencasa" target="_blank" href="<?=$port->image_url?>" class="company-link w-inline-block">
                           <img src="<?=Url::to(['portfolio/portfolio-image', 'id' => $port->id])?>" alt="" class="image-3 companies-image--black">
                           <img src="<?=Url::to(['portfolio/portfolio-image2', 'id' => $port->id])?>" alt="" class="image-2">
                        </a>
                     </div>
                   </div>
               <?php endforeach; ?>
            <?php endif; ?>       
                  <div class="grid-containerCol w-col-3 w-col-stack">
                     <div class="company-item">
                        <a data-modal-id="agencasa" target="_blank" href="https://www.facebook.com/bisnestofficial" class="company-link w-inline-block">
                           <img src="<?= $dirAssests?>/pictures/Bisnest-W.png" alt="" class="image-3 companies-image--black">
                           <img src="<?= $dirAssests?>/pictures/Bisnest-W1.png" alt="" class="image-2">
                        </a>
                     </div>
                   </div>

                   <div class="grid-containerCol w-col-3 w-col-stack img-container">
                      <div class="company-item">
                        <a data-modal-id="agencasa" href="#" class="company-link w-inline-block">
                           <img src="<?= $dirAssests?>/pictures/Oda-Bazaar-W.png" alt="" class="image-3 companies-image--black">
                           <img src="<?= $dirAssests?>/pictures/Oda-Bazaar-W1.png" alt="" class="image-2">
                        </a>
                     </div>
                   </div>
                 
        
               
                <div class="grid-containerCol w-col-3 w-col-stack">
                     <div class="company-item">
                        <a data-modal-id="agencasa" target="_blank" href="https://confvalley.com/" class="company-link w-inline-block">
                           <img src="<?= $dirAssests?>/pictures/convalley-W.png" alt="" class="image-3 companies-image--black">
                           <img src="<?= $dirAssests?>/pictures/convalley-W1.png" alt="" class="image-2">
                        </a>
                     </div>
                   </div> 
                  
                   
                 <div class="grid-containerCol w-col-3 w-col-stack">
                      <div class="company-item">
                        <a data-modal-id="agencasa" target="_blank" href="http://www.edusagenet.com/" class="company-link w-inline-block">
                           <img src="<?= $dirAssests?>/pictures/edusage-W.png" alt="" class="image-3 companies-image--black">
                           <img src="<?= $dirAssests?>/pictures/edusage-W1.png" alt="" class="image-2">
                        </a>
                     </div>
                   </div>
                   

                  
                 <div class="grid-containerCol w-col-3 w-col-stack">
                     <div class="company-item">
                        <a data-modal-id="agencasa" target="_blank" href="https://www.facebook.com/IBN-Agro-Farm-110867724169562" class="company-link w-inline-block">
                           <img src="<?= $dirAssests?>/pictures/IbnAgroFarm-W.png" alt="" class="image-3 companies-image--black">
                           <img src="<?= $dirAssests?>/pictures/IbnAgroFarm-W1.png" alt="" class="image-2">
                        </a>
                     </div>
                   </div>
             
                   
                   
                   <!-- <div class="grid-containerCol w-col-3 w-col-stack">
                     <div class="company-item">
                        <a data-modal-id="agencasa" href="#" class="company-link w-inline-block">
                           <img src="<?= $dirAssests?>/pictures/QibResearch-W.png" alt="" class="image-3 companies-image--black">
                           <img src="<?= $dirAssests?>/pictures/QibResearch-W1.png" alt="" class="image-2">
                        </a>
                     </div>
                   </div> -->

                    <div class="grid-containerCol w-col-3 w-col-stack">
                     <div class="company-item">
                        <a data-modal-id="agencasa" target="_blank" href="https://instagram.com/projekmakanmayu?igshid=1i1kdi4hglcuv" class="company-link w-inline-block">
                           <img src="<?= $dirAssests?>/pictures/projectMakanMayu-W.png" alt="" class="image-3 companies-image--black">
                           <img src="<?= $dirAssests?>/pictures/projectMakanMayu-W1.png" alt="" class="image-2">
                        </a>
                     </div>
                   </div> 
 
                   <div class="grid-containerCol w-col-3 w-col-stack">
                     <div class="company-item">
                        <a data-modal-id="agencasa" target="_blank" href="https://ijeob.com/" class="company-link w-inline-block">
                           <img src="<?= $dirAssests?>/pictures/ijeob-W.png" alt="" class="image-3 companies-image--black">
                           <img src="<?= $dirAssests?>/pictures/ijeob-W1.png" alt="" class="image-2">
                        </a>
                     </div>
                   </div> 
                   <div class="grid-containerCol w-col-3 w-col-stack">
                     <div class="company-item">
                        <a data-modal-id="agencasa" target="_blank" href="#" class="company-link w-inline-block">
                           <img src="<?= $dirAssests?>/pictures/AyamGoreng-W.jpg" alt="" class="image-3 companies-image--black">
                           <img src="<?= $dirAssests?>/pictures/AyamGoreng-W1.jpg" alt="" class="image-2">
                        </a>
                     </div>
                   </div>
             </div>

           </div>
         