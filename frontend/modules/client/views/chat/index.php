<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

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
                <?php foreach ($chat as $ch) : ?>
                <div class="single_message_chat">
                    <div class="message_pre_left">
                        <div class="message_preview_thumb">
                            <img src="img/messages/4.jpg" alt="">
                        </div>
                        <div class="messges_info">
                            <h4>Travor James</h4>
                            <p>Yesterday at 6.33 pm</p>
                        </div>
                    </div>
                    <div class="message_content_view red_border">
                        <p>
                             <?php if($ch->recipient_id == Yii::$app->user->id): ?>
                                <span id="receive">
                                    <?=$ch->messasge?>
                                </span>
                        </p>
                    </div>
                </div>
                <div class="single_message_chat sender_message">
                    <div class="message_pre_left">
                        <div class="messges_info">
                            <h4>Agatha Kristy</h4>
                            <p>Yesterday at 6.33 pm</p>
                        </div>
                        <div class="message_preview_thumb">
                            <img src="img/messages/2.jpg" alt="">
                        </div>
                    </div>
                    <div class="message_content_view">
                        <p>
                        <?php elseif($ch->sender_id == Yii::$app->user->id): ?>
                            <span id="send">
                                <?=$ch->message?>
                            </span>
                        <?php endif; ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="message_send_field">
                    <input type="text" placeholder="Write your message" id="chat-message" value="">
                    <button class="btn_1" type="submit" id="send-message">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

$js = <<<'EOD'

$('#send-message').click(function(){
    getTargetId($(this));
});


EOD;
$this->registerJs($js);

$js = "function getTargetId(element){

    var val = $('#chat-message').val()



      $.ajax({url: '".Url::to(['/client/chat/send-message', 'id' => ''])."' + val , success: function(result){
        var str = '';
        

    }
    });

}


";

$this->registerJs($js);
?>