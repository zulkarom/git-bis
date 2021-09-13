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
    echo '<div data-chat-id ="'.$message['chat_id'].'">';
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

<div class="single_message_chat sender_message">
    <div class="message_pre_left">
        
        <?php if($show_name){?>
        <div class="messges_info">
            <h4><?=$message['sender_name']?></h4>
            <p><?=date("d/m/Y h:i: A", $message['time']);?></p>
        </div>
        <div class="message_preview_thumb">
            <img src="<?=Url::to(['/client/profile/'.$role.'-image', 'id' => $message['sender_id']])?>" alt="">
        </div>
        <?php }else{
            
            echo '<p>' . date("h:i: A", $message['time']). '</p>';
        }
            ?>
    </div>
    <div class="message_content_view">
        <p>
            <?= $message['message'] ?>
        </p>
    </div>
</div>

    
    
<?php 
    }else{
        ?>

<div class="single_message_chat">
    <div class="message_pre_left">
     <?php if($show_name){?>
        <div class="message_preview_thumb">
            <img src="<?=Url::to(['/client/profile/'.$role.'-image', 'id' => $message['sender_id']])?>" alt="">
        </div>
        <div class="messges_info">
            <h4><?=$message['sender_name']?></h4>
            <p><?=date("d/m/Y h:i: A", $message['time']);?></p>
        </div>
        <?php }else{
            
            echo '<p>' . date("h:i: A", $message['time']). '</p>';
        }
            ?>
    </div>
    <div class="message_content_view red_border">
        <p>
            <?= $message['message'] ?>
        </p>
    </div>
</div>

    
    
<?php 
    }

}
?>

