<?php
use backend\assets\ChatAsset;
$assets = ChatAsset::register($this); 


$this->title = 'Chat Message';
$this->params['breadcrumbs'][] = $this->title;

$dirAssests=Yii::$app->assetManager->getPublishedUrl('@backend/assets/adminpress');

$user_id = Yii::$app->user->identity->id;
?>

<div id="chat-box" class="col-sm-12">
    
</div>

<?php if (Yii::$app->user->isGuest) :?>

<div id="chat-box" class="col-sm-12">
    <h2><?= Yii::t('chat','Register to take part in chat') ?></h2>
</div>

<?php else :?>

    <input type="hidden" id="recipient" value=<?=$expert->user->id?>>
    <div class="row">
        <div class="col-lg-12">
            <div class="messages_box_area">
                <div class="messages_list">
                    <div class="white_box ">
                        <div class="white_box_tittle list_header">
                            <h4>Chat List</h4>
                        </div>
                        <div class="serach_field_2">
                            <div class="search_inner">
                                <form active="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search content here...">
                                    </div>
                                    <button type="submit"> <i class="ti-search"></i> </button>
                                </form>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="message_pre_left">
                                        <div class="message_preview_thumb">
                                            <img src="img/messages/1.jpg" alt="">
                                            <span class="round-10 bg-danger"></span>
                                        </div>
                                        <div class="messges_info">
                                            <h4>Travor James</h4>
                                            <p>i know you are doing great</p>
                                        </div>
                                    </div>
                                    <div class="messge_time">
                                        <span>28th Nov</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="messages_chat mb_30">
                    <div class="white_box ">
                        <?= $this->render('_table',compact('messages', 'dirAssests', 'expert', 'user_id')) ?>
                        <div class="message_send_field">
                            <input type="text" id="chat-message" placeholder="Write your message" value="">
                            <button class="btn_1" type="submit" id="send-message" data-id="<?= $user->id ?>" data-name="<?= $user->chatname ?>" data-icon="<?= $user->chaticon ?>">Send
                            </button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
<?php endif; ?>

<?php
$script=<<<SCRIPT
function reloadchat(button,sendMessage) {
    if (sendMessage)
        $('#ajax-loader').show();
    $.ajax({
        url: '/training/git-bis/frontend/web/chat/default/send-message',
        type: "POST",
        data: {
            'sendMessage':sendMessage,
            'ChatModel[sender_id]': $(button).data('id'),
            'ChatModel[recipient_id]': $('#recipient').val(),
            'ChatModel[name]': $(button).data('name'),
            'ChatModel[icon]': $(button).data('icon'),
            'ChatModel[message]': $('#chat-message').val(),
        },
        success: function (html) {
            if (sendMessage)
            {
                $('#ajax-loader').hide();
                $('#chat-message').val('')
            }
            $("#chat-box").html(html);
        }
    });
}
$('#send-message').click(function(){
    reloadchat(this,true);
});
setInterval(function () { reloadchat(null,false); }, 5000 );
SCRIPT;
$this->registerJs($script,$this::POS_READY);
?>
