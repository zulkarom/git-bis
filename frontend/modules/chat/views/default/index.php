<?php
use backend\assets\ChatAsset;
use backend\assets\HatchniagaAsset;
use yii\helpers\Url;
ChatAsset::register($this); 
HatchniagaAsset::register($this);


// $this->title = 'Consultation Chat';
// $this->params['breadcrumbs'][] = ['label' => 'Consultation', 'url' => ['/client/expert/index']];
// $this->params['breadcrumbs'][] = ['label' => 'Chat Topic', 'url' => ['/chat/chat-topic/index', 'id' => $expert->id]];
// $this->params['breadcrumbs'][] = $this->title;
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/hatchniaga');

?>

<!-- Main content -->
      
            <div class="row">
                
                <div class="col-lg-3 col-md-5 col-12">
                    <div class="box">
                        <div class="box-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab nav-justified" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#messages" role="tab">Experts</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">Topics</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="messages" role="tabpanel">
                    
                                    <div class="chat-box-one-side">
                                        <div class="media-list media-list-hover">
                                        
                                        <div class="media py-10 px-0 align-items-center">
                                      <a class="avatar avatar-lg status-danger" href="#">
                                        <img src="images/avatar/2.jpg" alt="...">
                                      </a>
                                      <div class="media-body">
                                        <p class="font-size-16">
                                          <a class="hover-primary" href="#">Tommy Nash</a>
                                        </p>
                                      </div>
                                      <div class="media-right">
                                        <span class="badge badge-primary badge-pill">5</span>
                                      </div>
                                    </div>
                                    
                                    <div class="media py-10 px-0 align-items-center">
                                      <a class="avatar avatar-lg status-danger" href="#">
                                        <img src="images/avatar/2.jpg" alt="...">
                                      </a>
                                      <div class="media-body">
                                        <p class="font-size-16">
                                          <a class="hover-primary" href="#">Tommy Nash</a>
                                        </p>
                                      </div>
                                      <div class="media-right">
                                        <span class="badge badge-primary badge-pill">5</span>
                                      </div>
                                    </div>
                                    
                                    <div class="media py-10 px-0 align-items-center">
                                      <a class="avatar avatar-lg status-danger" href="#">
                                        <img src="images/avatar/2.jpg" alt="...">
                                      </a>
                                      <div class="media-body">
                                        <p class="font-size-16">
                                          <a class="hover-primary" href="#">Tommy Nash</a>
                                        </p>
                                      </div>
                                      <div class="media-right">
                                        <span class="badge badge-primary badge-pill">5</span>
                                      </div>
                                    </div>
                                        
                                        
            

                                          </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="contacts" role="tabpanel">                                    
                                    
                                    <div class="chat-box-one-side">
                                        <div class="media-list media-list-hover">
                                            <div class="media py-10 px-0 align-items-center">
                                              <a class="avatar avatar-lg status-success" href="#">
                                                <img src="<?=Url::to(['/client/profile/expert-image', 'id' => $expert->user->id])?>" alt="...">
                                              </a>
                                              <div class="media-body">
                                                <p class="font-size-16">
                                                  <a class="hover-primary" href="#"><?=$expert->user->fullname?></a>
                                                </p>
                                              </div>
                                            </div>

                                            <div class="media py-10 px-0 align-items-center">
                                             
                                              <div class="media-body">
                                                <p class="font-size-16">
                                                  <a class="hover-primary" href="#">How to grow your business and get huge profit?</a>
                                                </p>
                                              </div>
                                            </div>
                                            
                                            <div class="media py-10 px-0 align-items-center">
                                             
                                              <div class="media-body">
                                                <p class="font-size-16">
                                                  <a class="hover-primary" href="#">How to grow your business and get huge profit?</a>
                                                </p>
                                              </div>
                                            </div>
                                            
                                            <div class="media py-10 px-0 align-items-center">
                                             
                                              <div class="media-body">
                                                <p class="font-size-16">
                                                  <a class="hover-primary" href="#">How to grow your business and get huge profit?</a>
                                                </p>
                                              </div>
                                            </div>

                                            
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                </div>
                
                
                <div class="col-lg-9 col-md-7 col-12">
                    <div class="box box-transparent no-shadow">
                      <div class="box-header px-0">
                        <div class="media align-items-center p-0">
                          <a class="avatar avatar-lg status-success mx-0" href="#">
                            <img src="<?=Url::to(['/client/profile/expert-image', 'id' => $expert->user->id])?>" class="rounded-circle" alt="...">
                          </a>
                          <div class="media-body">
                            <p class="font-size-16">
                              <a class="hover-primary" href="#"><strong><?=$expert->user->fullname?></strong></a>
                            </p>
                              2 day ago
                          </div>
                        </div>             
                      </div>

                      <div class="box-body px-0">
                          <div class="chat-box-one">
                            <div id="chat-box"><?= $this->renderAjax('_table',compact('messages')) ?></div>
                          </div>
                      </div>
                    </div>
                    <div class="box box-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <input class="form-control b-0 py-10" type="text" id="chat-message" placeholder="Say something...">
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="button" id="send-message" class="waves-effect waves-circle btn btn-circle mr-10 btn-outline-primary">
                                    <i class="mdi mdi-link"></i>
                                </button>
                                <button type="button" class="waves-effect waves-circle btn btn-circle btn-primary" data-url="<?=Url::to(['/chat/default/send-message'])?>" data-id="<?= $user->id ?>" data-recipient="<?=$expert->user->id?>" data-topic="<?=$topicModel->id?>">
                                    <i class="mdi mdi-send"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        <!-- /.content -->
    
       
<?php
$script="
function sendchat(button,sendMessage) {
    
    $.ajax({
        url: $('#send-message').data('url'),
        type: 'POST',
        data: {
            'sendMessage':sendMessage,
            'ChatModel[sender_id]': $('#send-message').data('id'),
            'ChatModel[recipient_id]': $('#send-message').data('recipient'),
            'ChatModel[topic_id]': $('#send-message').data('topic'),
            'ChatModel[message]': $('#chat-message').val()
        },
        success: function (html) {
        $('#chat-message').val('')
        $('#chat-box').html(html);
        }
    });
}

$('#send-message').click(function(){
    sendchat(this,true);
});

setInterval(function () { sendchat(null,false); }, 5000 );

";


$this->registerJs($script, $this::POS_READY);

?>
