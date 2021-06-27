<div class="chat-rbox">
    <ul class="chat-list p-20">
        <?php foreach ($messages as $message) : ?>
        <!--chat Row -->
      
        <li>
            <div class="chat-content">
                <div class="box bg-light-info"><?= $message['message'] ?>&nbsp <font size="1"><?=date("h:i: A", strtotime($message['rfc822']));?></font></div>
            </div>
        </li>
        <!--chat Row -->
   
        <!--chat Row -->
        <li class="reverse">
            <div class="chat-content">
                <div class="box bg-light-inverse"><?= $message['message'] ?>&nbsp <font size="1"><?=date("h:i: A", strtotime($message['rfc822']));?></font></div>
            </div>
        </li>
        <?php endforeach; ?>
        <!--chat Row -->
    </ul>
</div>