<?php
use backend\assets\ChatAsset;
use yii\helpers\Url;
$assets = ChatAsset::register($this); 


$this->title = 'Consultation';
$this->params['breadcrumbs'][] = $this->title;
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/crypto');

?>

<div class="col-sm-12">
    
</div>

    <div class="row">
    
    <div class="col-md-3">
    
    <?php  
    
    echo '  <div class="container-fluid">
              
          <div class="card custom-card">
            <div class="card-header"><img class="img-fluid" src="'.$dirAssests.'/img/profilebox/2.jpg" alt="" data-original-title="" title=""></div>
            <div class="card-profile"><img class="rounded-circle" src="'. Url::to(['/client/profile/expert-image', 'id' => $expert->user->id]) .'" alt="" data-original-title="" title=""></div>
            <div class="text-center profile-details">
              <h4>'.$expert->user->fullname.'</h4>
              <h6>'.$expert->expertText.'</h6>
          
      </div> </div> </div>
      ';
    
    ?>
    
    </div>
    
        <div class="col-md-8">
            <div class="messages_box_area">

                <div class="messages_chat mb_30">
                    <div class="white_box " >
                    	<div id="chat-box"><?= $this->render('_table',compact('messages')) ?></div>
                        
                        <div class="message_send_field">
                            <input type="text" id="chat-message" placeholder="Write your message" value="">
                            <button class="btn_1" type="submit" id="send-message" data-url="<?=Url::to(['/chat/default/send-message'])?>" data-id="<?= $user->id ?>" data-recipient="<?=$expert->user->id?>">Send
                            </button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
". Url::to(['/chat/default/send-message\])."
/training/git-bis/frontend/web/chat/default/send-message

function reloadchat(button,sendMessage) {
        var url = '". Url::to(['/chat/default/send-message'])."';
    if (sendMessage)
        $('#ajax-loader').show();
    $.ajax({
        url: ,
        type: 'POST',
        data: {
            'sendMessage':sendMessage,
            'ChatModel[sender_id]': $(button).data('id'),
            'ChatModel[recipient_id]': $('#recipient').val(),
            'ChatModel[name]': $(button).data('name'),
            'ChatModel[icon]': $(button).data('icon'),
            'ChatModel[message]': $('#chat-message').val(),
        },
        success: function (html) {
            console.log(html);
            if (sendMessage)
            {
                $('#ajax-loader').hide();
                $('#chat-message').val('')
            }
            $('#chat-box').html(html);
        }
    });
}
<?php
$script="
function reloadchat(button,sendMessage) {
    console.log('starting');
    
    $.ajax({
        url: $(button).data('url'),
        type: 'POST',
        data: {
            'sendMessage':sendMessage,
            'ChatModel[sender_id]': $(button).data('id'),
            'ChatModel[recipient_id]': $(button).data('recipient'),
            'ChatModel[message]': $('#chat-message').val()
        },
        success: function (html) {
            console.log(html);
        $('#chat-message').val('')
        $('#chat-box').html(html);
        }
    });
}
$('#send-message').click(function(){
    console.log('button click');
    reloadchat(this,true);
});
//setInterval(function () { reloadchat(null,false); }, 5000 );
";
$this->registerJs($script,$this::POS_READY);
?>
