<?php
use backend\assets\ChatAsset;
use yii\helpers\Url;
ChatAsset::register($this); 


// $this->title = 'Consultation Chat';
// $this->params['breadcrumbs'][] = ['label' => 'Consultation', 'url' => ['/client/expert/index']];
// $this->params['breadcrumbs'][] = ['label' => 'Chat Topic', 'url' => ['/chat/chat-topic/index', 'id' => $expert->id]];
// $this->params['breadcrumbs'][] = $this->title;
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/hatchniaga');

?>
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
                                        <?php foreach ($model as $clientEx): ?>
                                          <div id="send-topic" class="media py-10 px-0 align-items-center" data-client="<?= $clientEx->client_id?>" data-expert-name="<?=$clientEx->expert->user->fullname?>" data-expert-profile="<?=Url::to(['/client/profile/expert-image', 'id' => $clientEx->expert->user->id])?>">
                                          <a class="avatar avatar-lg status-danger" href="#">
                                            <img src="<?=Url::to(['/client/profile/expert-image', 'id' => $clientEx->expert->user->id])?>" alt="...">
                                          </a>
                                          <div class="media-body">
                                            <p class="font-size-16">
                                              <a class="hover-primary" href="#"><?=$clientEx->expert->user->fullname?></a>
                                            </p>
                                          </div>
                                          <div class="media-right">
                                            <span class="badge badge-primary badge-pill">5</span>
                                          </div>
                                          </div>
                                        <?php endforeach; ?>
                                      </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="contacts" role="tabpanel">                                    
                                    
                                    <div class="chat-box-one-side">
                                        <div class="media-list media-list-hover">
                                            <div class="media py-10 px-0 align-items-center">
                                              <a class="avatar avatar-lg status-success" href="#">
                                                <img src="" alt="..." class="exp-profile">
                                              </a>
                                              <div class="media-body">
                                                <p class="font-size-16">
                                                  <a class="hover-primary exp-name" href="#">Contoh Nama</a>
                                                </p>
                                              </div>
                                            </div>
                                            <!-- <div class="media py-10 px-0 align-items-center">
                                             
                                              <div class="media-body">
                                                <p class="font-size-16 test">
                                                  <a class="hover-primary" href="#"></a>
                                                </p>
                                              </div>
                                            </div> -->

                                            <div id="topic-name">
                                             
                                              
                                            </div>
                                            
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                </div>




<?php

$js = "function getTargetId(element){

   
    var val = element.data('client');
    var val2 = element.data('expert-name');

    $('.exp-name').html(val2);
    $('.exp-profile').attr('src',element.data('expert-profile'));


    $.ajax({url: '".Url::to(['/chat/chat-test/get-topics', 'client_id' => ''])."' + val , success: function(result){
        
        if(result){
            var data = JSON.parse(result);
            var str = '';
            // console.log(result);
            for (var key in data) {
                if (data.hasOwnProperty(key)) {

                  str += '<div class=\"media py-10 px-0 align-items-center\"><div class=\"media-body\"><p class=\"font-size-16 test\"><a class=\"hover-primary\" href=\"#\">' + data[key] + '</a></p></div></div>';

                }
            }
            console.log(str);
            $('#topic-name').html(str);
            
        }
    }
    });

}

$('#send-topic').click(function(){
  getTargetId($(this));

    // alert($(this).data('client'));
});

";
// JuiAsset::register($this);
$this->registerJs($js);
?>