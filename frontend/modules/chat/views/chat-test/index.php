<?php
use backend\assets\ChatAsset;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
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
                  <li id="tab-expert" class="nav-item"> <a id="a-expert" class="nav-link active" data-toggle="tab" href="#panel-expert" role="tab">Experts</a> </li>
                  <li id="tab-topic" class="nav-item"> <a id="a-topic" class="nav-link" data-toggle="tab" href="#panel-topic" role="tab">Topics</a> </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                  <div class="tab-pane active" id="panel-expert" role="tabpanel">
      
                      <div class="chat-box-one-side">
                        <div class="media-list media-list-hover">
                          <?php foreach ($model as $clientEx): ?>
                            <div id="" class="send-topic media py-10 px-0 align-items-center" data-client="<?= $clientEx->client_id?>" data-expert-id="<?= $clientEx->expert_id?>" data-expert-user-id="<?= $clientEx->expert->user_id?>" data-expert-name="<?=$clientEx->expert->user->fullname?>" data-expert-profile="<?=Url::to(['/client/profile/expert-image', 'id' => $clientEx->expert->user->id])?>">
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
                  <div class="tab-pane" id="panel-topic" role="tabpanel">                                    
                      
                      <div class="chat-box-one-side">
                          <div class="media-list media-list-hover">
                              <div class="media py-10 px-0 align-items-center">
                                <a class="avatar avatar-lg status-success" href="#">
                                  <img src="" alt="..." class="exp-profile">
                                </a>
                                <div class="media-body">
                                  <p class="font-size-16">
                                    <a class="hover-primary exp-name" href="#">Contoh Nama</a><br/>
                                  </p>
                                </div>
                              </div>
                              <div class="media py-10 px-0 align-items-center">
                                 <div class="media-body" align="center">
                                  <p class="font-size-16">
                                    <?php echo Html::button('Create Topic', ['value' => Url::to(['/chat/chat-topic/create']), 'class' => 'btn btn-rounded btn-secondary', 'id' => 'modalButton']);
                    
                                          Modal::begin([
                                              'title' => '<h4>Create Topic</h4>',
                                              'id' =>'createTopic',
                                              'size' => 'modal-md'
                                          ]);

                                      echo '<div id="formCreateTopic"></div>';

                                      Modal::end();

                                      $this->registerJs('
                                        $(function(){
                                          $("#modalButton").click(function(){
                                              $("#createTopic").modal("show")
                                                .find("#formCreateTopic")
                                                .load($(this).attr("value"));
                                          });
                                        });
                                        ');
                                      ?>
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

                              <div class="topic-name">
                               
                                
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
              <img src="" class="rounded-circle exp-profile2" alt="...">
            </a>
            <div class="media-body">
              <p class="font-size-16">
                <a class="hover-primary exp-name2" href="#"><strong></strong></a>
              </p>
                2 day ago
            </div>
          </div>             
        </div>

        <div class="box-body px-0">
            <div class="chat-box-one">
              <div id="chat-box"></div>
            </div>
        </div>
      </div>
      <div class="box box-body">
          <div class="d-flex justify-content-between align-items-center btn-send-message">
              
          </div>
      </div>
  </div>

</div>




<?php

$js = "
function getTopic(element){

    var val = element.data('client');
    var val2 = element.data('expert-name');
    var val3 = element.data('expert-id');
    var val4 = element.data('expert-user-id');

    $('.exp-name').html(val2);
    $('.exp-profile').attr('src',element.data('expert-profile'));

    $('.exp-name2').html(val2);
    $('.exp-profile2').attr('src',element.data('expert-profile'));

    $.ajax({
        url: '".Url::to(['/chat/chat-test/get-topics'])."',
        type: 'POST',
        data: {
          client_id: val, 
          expert_id: val3
        },
        success: function (result) {
          if(result){
            var data = JSON.parse(result);
            var str = '';
            // console.log(result);
            for (var key in data) {
                if (data.hasOwnProperty(key)) {

                  str += '<div class=\"media py-10 px-0 align-items-center\"><div class=\"media-body\"><p class=\"font-size-16 test\"><a data-topic=\"'+key+'\" data-exp-id=\"'+val3+'\" data-exp-user-id=\"'+val4+'\" class=\"hover-primary topic-chat\" href=\"#\">' + data[key] + '</a></p></div></div>';

                }
            }
            // console.log(str);
            $('.topic-name').html(str);


            $('.topic-chat').click(function(){
              // alert($(this).data('topic'));
              getTargetChat($(this));
            });
            
          }
        }
    });

}

function getTargetChat(element){
    var expert_id = element.data('exp-id');
    var topic_id = element.data('topic');
    var user_id = '".Yii::$app->user->identity->id."';
    var exp_user_id = element.data('exp-user-id');

    // console.log();

    $.ajax({
        url: '".Url::to(['/chat/default/index'])."',
        type: 'POST',
        data: {
          id: expert_id, 
          tid: topic_id
        },
        success: function (result) {
          var data = JSON.parse(result);
          var chatstr = '';
          var btnsendstr ='';
           for (var key in data) {
              var row = data[key];
              // console.log(row['message']);

              chatstr += messageBox(row);
            }

            var dataUrl = '".Url::to(['/chat/default/send-message'])."';
            
            btnsendstr = '<input class=\"form-control b-0 py-10\" type=\"text\" id=\"chat-message\" placeholder=\"Say something...\"><div class=\"d-flex justify-content-between align-items-center \"><button type=\"button\" class=\"waves-effect waves-circle btn btn-circle mr-10 btn-outline-primary\"><i class=\"mdi mdi-link\"></i></button><button type=\"button\" class=\"waves-effect waves-circle btn btn-circle btn-primary\" type=\"submit\" id=\"send-message\" data-url=\"'+dataUrl+'\" data-id=\"'+user_id+'\" data-recipient=\"'+exp_user_id+'\" data-topic=\"'+topic_id+'\"><i class=\"mdi mdi-send\"></i></button></div>';

            $('.btn-send-message').html(btnsendstr);
            $('#chat-box').html(chatstr);

            $('#send-message').click(function(){
                sendchat(this,true);
            });




        }
    });

}

function messageBox(row){
  var client = '';
  var role = '';
  console.log(row['chat_id']);
  if(row['sender_id'] == '".Yii::$app->user->identity->id."'){
      client = true;
      role = 'profile';
      
  }else{
      client = false;
      role = 'expert';
  }

  if(client){

    var sender_id = row['sender_id'];
    var url = '".Url::to(['/client/profile/profile-image', 'id' => ''])."' + sender_id;

      str = '<div class=\"card d-inline-block mb-3 float-right mr-2 bg-primary max-w-p80\"><div class=\"position-absolute pt-1 pl-2 l-0\"><span class=\"text-extra-small\"></span></div><div class=\"card-body\"><div class=\"d-flex flex-row pb-2\"><div class=\"d-flex flex-grow-1 justify-content-end\"><div class=\"m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between\"><div><p class=\"mb-0 font-size-16\">' + row['sender_name']  + '</p></div></div></div><a class=\"d-flex\" href=\"#\"><img alt=\"Profile\" src=\"'+ url +'\" class=\"avatar ml-10\"></a></div><div class=\"chat-text-left pr-50\"><p class=\"mb-0 text-semi-muted\" data-chat-id=\"'+row['chat_id']+'\">' + row['message']  + '</p></div></div></div><div class=\"clearfix\"></div>';

      return str;

  }else{

    var sender_id = row['sender_id'];
    var url = '".Url::to(['/client/profile/expert-image', 'id' => ''])."' + sender_id;

      str = '<div class=\"card d-inline-block mb-3 float-left mr-2\"><div class=\"position-absolute pt-1 pr-2 r-0\"><span class=\"text-extra-small text-muted\"></span></div><div class=\"card-body\"><div class=\"d-flex flex-row pb-2\"><a class=\"d-flex\" href=\"#\"><img alt=\"Profile\" src=\"'+ url +'\" class=\"avatar mr-10\"></a><div class=\"d-flex flex-grow-1 min-width-zero\"><div class=\"m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between\"><div class=\"min-width-zero\"><p class=\"mb-0 font-size-16 text-dark\">' + row['sender_name']  + '</p></div></div></div></div><div class=\"chat-text-left pl-55\"><p class=\"mb-0 text-semi-muted\" data-chat-id=\"'+row['chat_id']+'\">' + row['message']  + '</p></div></div></div><div class=\"clearfix\"></div>'

          return str;
  }
}





$('.send-topic').click(function(){

  $('#a-topic').addClass('active');

  $('#a-topic').attr('aria-selected', true);

  $('#a-expert').removeClass('active');
  $('#a-expert').attr('aria-selected', false);


  $('#panel-topic').addClass('active');
  $('#panel-expert').removeClass('active');


  getTopic($(this));

    // alert($(this).data('client'));
});


";
// JuiAsset::register($this);
$this->registerJs($js);

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
            // 'ChatModel[last_message_id]': $()
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

setInterval(function () { 
  // sendchat(null,false); 
  }, 5000 );

";


$this->registerJs($script, $this::POS_READY);

?>