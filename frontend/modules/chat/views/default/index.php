<?php
use backend\assets\ChatAsset;
$assets = ChatAsset::register($this); 


$this->title = 'Chat Message';
$this->params['breadcrumbs'][] = $this->title;

$dirAssests=Yii::$app->assetManager->getPublishedUrl('@backend/assets/adminpress');

?>

<div class="row">
                    <div class="col-12">
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
                                    <div class="chat-rbox">
                                        <ul class="chat-list p-20">
                                            <!--chat Row -->
                                            <?php foreach ($messages as $message) : ?>
                                            <li>
                                                <div class="chat-img"><img src="<?=$dirAssests?>/images/users/1.jpg" alt="user" /></div>
                                                <div class="chat-content">
                                                    <div class="box bg-light-info"><?= $message['message'] ?></div>
                                                </div>
                                                <div class="chat-time">10:56 am</div>
                                            </li>
                                            <?php endforeach; ?>
                                            <!--chat Row -->
                                            
                                            <!--chat Row -->
                                            <li class="reverse">
                                                <div class="chat-content">
                                                    <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                                                </div>
                                                <div class="chat-img"><img src="<?=$dirAssests?>/images/users/5.jpg" alt="user" /></div>
                                                <div class="chat-time">10:57 am</div>
                                            </li>
                                            <!--chat Row -->
                                        </ul>
                                    </div>
                                    <div class="card-body b-t">
                                        <div class="row">
                                            <div class="col-10">
                                                <textarea placeholder="Type your message here" class="form-control b-0"></textarea>
                                            </div>
                                            <div class="col-2 text-right">
                                                <button type="button" class="btn btn-info btn-circle btn-lg"><i class="mdi mdi-send"></i> </button>
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

<div class="chat-default-index content">
    <div class="row">
        <div id="chat-box" class="col-sm-12">
            <?= $this->render('_table',compact('messages', 'dirAssests')) ?>
        </div>
<?php if (Yii::$app->user->isGuest) :?>
        <div id="chat-box" class="col-sm-12">
            <h2><?= Yii::t('chat','Register to take part in chat') ?></h2>
        </div>
<?php else :?>

        <div class="col-sm-12">
            <div class="table-responsive"> 
            <table class="table table table-striped table-bordered table-hover table-condensed">
                <caption><h3><?= Yii::t('chat','Current user') ?></h3></caption>
                <thead>
                    <tr class="success">
                       <th style="width:10%"><?= Yii::t('chat','Icon') ?></th>
                       <th style="width:20%"><?= Yii::t('chat','Username') ?></th>
                       <th><?= Yii::t('chat','Message') ?></th>
                       <th style="width:20%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="<?= $dirAssests?>/images/user.png?>" width="50px" />
                        </td>
                        <td>
                            <?= $user->chatname ?>
                        </td>
                        <td>
                            <textarea id="chat-message" class="form-control" aria-invalid="false"></textarea>
                        </td>
                        <td>
                            <img id="ajax-loader" src="<?= $assets->baseUrl.'/images/loader.gif' ?>" style="display:none" />
                            <button type="submit" id="send-message" class="btn btn-success" data-id="<?= $user->id ?>" data-name="<?= $user->chatname ?>" data-icon="<?= $user->chaticon ?>" >
                                <?= Yii::t('chat','Send message') ?>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        <input type="hidden" id="recipient" value=<?=$expert->user->id?>>
<?php endif; ?>
    </div>
</div>
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
