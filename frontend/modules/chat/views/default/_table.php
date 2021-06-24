<div class="chat-rbox">
    <ul class="chat-list p-20">
        <?php foreach ($messages as $message) : ?>
        <!--chat Row -->
        <?php if($message['recipient_id'] == $user_id): ?>
        <li>
            <div class="chat-content">
                <div class="box bg-light-info"><?= $message['message'] ?>&nbsp <font size="1"><?=date("h:i: A", strtotime($message['rfc822']));?></font></div>
            </div>
        </li>
        <!--chat Row -->
        <?php else: ?>
        <!--chat Row -->
        <li class="reverse">
            <div class="chat-content">
                <div class="box bg-light-inverse"><?= $message['message'] ?>&nbsp <font size="1"><?=date("h:i: A", strtotime($message['rfc822']));?></font></div>
            </div>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>
        <!--chat Row -->
    </ul>
</div>