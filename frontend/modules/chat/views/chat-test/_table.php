<?php
use yii\helpers\Url;
/* echo '<pre>';
print_r($messages);
echo '</pre>';
echo Yii::$app->user->identity->id; */
$show_name = true;
$sender = 0;


foreach ($messages as $message){


    
    $show_name = $message['sender_id'] == $sender  ? false : true;
    echo showMessage($message, $show_name);
    $sender = $message['sender_id'];
    // echo '<div data-chat-id ="'.$message['chat_id'].'">';
}

function showMessage($message, $show_name){
    if($message['sender_id'] == Yii::$app->user->identity->id){
        $client = true;
        $role = 'profile';
        
    }else{
        $client = false;
        $role = 'expert';
    }
    
    if($client){
        ?>

        <div class="card d-inline-block mb-3 float-right mr-2 bg-primary max-w-p80">
            
            <div class="position-absolute pt-1 pl-2 l-0">
                <span class="text-extra-small"><?=date("h:i: A", $message['time']);?></span>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row pb-2">
                    <div class="d-flex flex-grow-1 justify-content-end">
                        <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div>
                                <p class="mb-0 font-size-16"><?=$message['sender_name']?></p>
                            </div>
                        </div>
                    </div>
                    <a class="d-flex" href="#">
                        <img alt="Profile" src="<?=Url::to(['/client/profile/'.$role.'-image', 'id' => $message['sender_id']])?>" class="avatar ml-10">
                    </a>
                </div>
                <div class="chat-text-left pr-50">
                    <p class="mb-0 text-semi-muted"><?= $message['message'] ?></p>
                </div>
            </div>
          </div>
          <div class="clearfix"></div>

        
    <?php 
    }else{
        ?>
        <div class="card d-inline-block mb-3 float-left mr-2">
            
            <div class="position-absolute pt-1 pr-2 r-0">
                <span class="text-extra-small text-muted"><?=date("h:i: A", $message['time']);?></span>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row pb-2">
                    <a class="d-flex" href="#">
                        <img alt="Profile" src="<?=Url::to(['/client/profile/'.$role.'-image', 'id' => $message['sender_id']])?>" class="avatar mr-10">
                    </a>
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between">
                            <div class="min-width-zero">
                                <p class="mb-0 font-size-16 text-dark"><?=$message['sender_name']?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-text-left pl-55">
                    <p class="mb-0 text-semi-muted"><?= $message['message'] ?></p>
                </div>
            </div>
          </div>
          <div class="clearfix"></div>
         
    
<?php 
    }

}
?>

