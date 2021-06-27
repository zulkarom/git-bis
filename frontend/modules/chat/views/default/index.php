<style type="text/css">
    .chat-main-box .chat-right-aside {
    width: calc(100%) !important;
}
</style>

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
    <?= $this->render('_table',compact('messages', 'dirAssests', 'expert', 'user_id')) ?>
    <input type="hidden" id="recipient" value=<?=$expert->user->id?>>
    
    <div class="row">
    <div id="chat-box" class="col-sm-12">
        <div class="card m-b-0">
            <!-- .chat-row -->
            <div class="chat-main-box">
                
                <!-- .chat-right-panel -->
                <div class="chat-right-aside">
                    <div class="chat-main-header">
                        <div class="p-20 b-b">
                            <h3 class="box-title"><?=$expert->user->fullname?></h3>
                        </div>
                    </div>
                    
                    <div class="card-body b-t">
                        <div class="row">
                            <div class="col-11">
                                <textarea placeholder="Type your message here" id="chat-message" class="form-control b-0" aria-invalid="false""></textarea>
                                <img id="ajax-loader" src="<?= $assets->baseUrl.'/images/loader.gif' ?>" style="display:none" />
                            </div>
                            <div class="col-1">
                                <button type="submit"  id="send-message" class="btn btn-info btn-circle btn-lg" data-id="<?= $user->id ?>" data-name="<?= $user->chatname ?>" data-icon="<?= $user->chaticon ?>"><i class="mdi mdi-send"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .chat-right-panel -->
            </div>
            <!-- /.chat-row -->
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
