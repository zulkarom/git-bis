<?php
use yii\helpers\Url;
?>

<?php foreach ($messages as $message) : ?>
<div class="single_message_chat">
    <div class="message_pre_left">
        <div class="message_preview_thumb">
            <img src="<?=Url::to(['/expert/profile/profile-image', 'id' => $expert->user->id])?>" alt="">
        </div>
        <div class="messges_info">
            <h4><?=$expert->user->fullname?></h4>
            <p><?=date("h:i: A", strtotime($message['rfc822']));?></p>
        </div>
    </div>
    <div class="message_content_view red_border">
        <p>
            <?= $message['message'] ?>
        </p>
    </div>
</div>
<div class="single_message_chat sender_message">
    <div class="message_pre_left">
        <div class="messges_info">
            <h4><?=Yii::$app->user->identity->fullname?> </h4>
            <p><?=date("h:i: A", strtotime($message['rfc822']));?></p>
        </div>
        <div class="message_preview_thumb">
            <img src="<?=Url::to(['/client/profile/profile-image', 'id' => Yii::$app->user->identity->id])?>" alt="">
        </div>
    </div>
    <div class="message_content_view" align="right">
        <p>
            <?= $message['message'] ?>
        </p>
    </div>
</div>
<?php endforeach; ?>