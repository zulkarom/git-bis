<?php 

use yii\helpers\Url;

/* 
 * @$modelAnnounce
 *  */


$this->title= 'frontend PAGE';
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/views/myasset');
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/adminpress');
?>


<style type="text/css">

.fc-day-grid-event .fc-content {
    white-space: normal;
}

.card {
    background-color: #fbfbfb;
}

.message-box .message-widget a .mail-contnet .mail-desc, .message-box .message-widget a .mail-contnet .time {
    font-size: 15px;
}

.round {
    line-height: 50px;
    color: #000000;
    background: #b7efbf;
}



</style>
<?php   if($modelAnnounce){?>
<div class="card">
    <div class="card-body">
        <h4 class="card-title"><strong><b>Announcement</b></strong></h4>
        <div class="message-box" style="overflow: visible;">
            <div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: auto;"><div class="message-widget message-scroll" style="overflow: hidden; width: auto; height: auto;">
                <!-- Message -->
                <?php
     
                	foreach($modelAnnounce as $announce){

              
                                    echo '<a href="#">
                                    <div class="user-img"> <span class="round"><i class="ti-bell"></i></span></div>
                                    <div class="mail-contnet">
                                        <h5>'.$announce->announce_title.'</h5> <span class="mail-desc">'.$announce->announce_text.'</span> <span class="time">'.date("d F Y",strtotime($announce->start_date)).'</span> </div>
                                    </a>';   
                     
                			
                		
                	}
              
                	
                ?>
                
                <!-- Message -->
            </div><div class="slimScrollBar" style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 462.821px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
        </div>
    </div>
</div>

<?php } ?>

<div class="card">
<div class="card-body">
<?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
      'clientOptions' => [
            'eventLimit' => 5,
            
        ],
  ));
?>
</div>
</div>
			
			

