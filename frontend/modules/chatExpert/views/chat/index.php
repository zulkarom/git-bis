<?php
use backend\assets\ChatAsset;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
ChatAsset::register($this); 

$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/hatchniaga');

?>
<style type="text/css">
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  /*min-width: 160px;*/
  box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.2);
  /*padding: 12px 16px;*/
  z-index: 1;
  right:-10px;
  border-radius: 12px;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

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
                            <div id="" class="send-topic media py-10 px-0 align-items-center" data-client="<?= $clientEx->client_id?>" data-expert-id="<?= $clientEx->expert_id?>" data-client-user-id="<?= $clientEx->client->user_id?>" data-client-name="<?=$clientEx->client->user->fullname?>" data-client-profile="<?=Url::to(['/expert/profile/client-image', 'id' => $clientEx->client->user->id])?>">
                            <a class="avatar avatar-lg status-danger" href="#">
                              <img src="<?=Url::to(['/expert/profile/client-image', 'id' => $clientEx->client->user->id])?>" alt="...">
                            </a>
                            <div class="media-body">
                              <p class="font-size-16">
                                <a class="hover-primary" href="#"><?=$clientEx->client->user->fullname?></a>
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
                          <div class="media-list media-list-hover ">

                            <div class="exp-details">
                               
                                
                            </div>

                            <div id="current-topic"></div>
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
        <div id="group-header" class="box-header px-0" style="display:none">
          <div class="media align-items-center p-0">
            <a class="avatar avatar-lg status-success mx-0" href="#">
              <img src="" class="rounded-circle cl-profile2" alt="...">
            </a>
            <div class="media-body">
              <p class="font-size-16">
                <a class="hover-primary cl-name2" href="#"><strong></strong></a>
              </p>
                <a class="hover-primary cl-topic-name"  href="#"><strong></strong></a>
            </div>
          </div>             
        </div>

        <div class="box-body px-0">
          
            <div class="chat-box-one">
              <div class="btn-previous-message" align="center">
              
              </div>
              <br/>
              <div id="chat-box"></div>
            </div>
        </div>
      </div>
      <div id="group-msg" class="box box-body" style="display:none">
          <div class="d-flex justify-content-between align-items-center btn-send-message">
              
          </div>
      </div>
  </div>

</div>




<?php

$js = "
function getTopic(element, init){



    var val = element.data('client');
    var val2 = element.data('client-name');
    var val3 = element.data('expert-id');
    var val4 = element.data('client-user-id');
    var val5 = element.data('client-profile');

    if(init){

      var x = document.getElementById('group-header');

      if (x.style.display === 'none') {
        x.style.display = 'block';
      }

      $('#current-topic').attr('data-client', val);
      $('#current-topic').attr('data-client-name', val2);
      $('#current-topic').attr('data-expert-id', val3);
      $('#current-topic').attr('data-client-user-id', val4);
      $('#current-topic').attr('data-client-profile', val5);
    }

    var expStr ='';
    expStr = '<div class=\"media py-10 px-0 align-items-center\"><a class=\"avatar avatar-lg status-success\" href=\"#\"><img src=\"'+val5+'\" alt=\"...\"></a><div class=\"media-body\"><p class=\"font-size-16\"><a class=\"hover-primary\" href=\"#\">'+val2+'</a><br/></p></div></div>';

    $('.exp-details').html(expStr);

    // $('.cl-name').html(val2);
    // $('.cl-profile').attr('src',element.data('client-profile'));

    $('.cl-name2').html(val2);
    $('.cl-profile2').attr('src',element.data('client-profile'));

    $.ajax({
        url: '".Url::to(['/chatExpert/chat/get-topics'])."',
        type: 'POST',
        data: {
          client_id: val, 
          expert_id: val3
        },
        success: function (result) {
          // console.log(result);
          if(result){
            var data = JSON.parse(result);
            var str = '';
            var topicStr ='';

            for (let index = 0; index < data.length; ++index) {

              const top_id = data[index].id;
              const top_name = data[index].value;
              const unread = data[index].unread;

              if(unread == 0){
                str += '<div class=\"media py-10 px-0 align-items-center\"><div class=\"media-body\"><p class=\"font-size-16 test\"><a data-topic=\"'+top_id+'\" data-topic-name=\"'+top_name+'\" data-cl-id=\"'+val3+'\" data-cl-user-id=\"'+val4+'\" class=\"hover-primary topic-chat\" href=\"#\">' + top_name + '</a></p></div></div>';
              }else{
                  str += '<div class=\"media py-10 px-0 align-items-center\"><div class=\"media-body\"><p class=\"font-size-16 test\"><a data-topic=\"'+top_id+'\" data-topic-name=\"'+top_name+'\" data-cl-id=\"'+val3+'\" data-cl-user-id=\"'+val4+'\" class=\"hover-primary topic-chat\" href=\"#\">' + top_name + '</a></p></div><div class=\"media-right\"><span class=\"badge badge-primary badge-pill\">'+unread+'</span></div></div>';
              }
            }                        
                                    
            /*var topicStr = '<button id=\"btn-topic\" type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModalLong\">Create Topic</button><div class=\"modal fade\" id=\"exampleModalLong\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLongTitle\" aria-hidden=\"true\"><div class=\"modal-dialog\" role=\"document\"><div class=\"modal-content\"><div class=\"modal-header\"><h5 class=\"modal-title\" id=\"exampleModalLongTitle\">Create Topic</h5><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div><div class=\"modal-body\"><div class=\"form-row\"><div class=\"form-group col-md-12\"><label for=\"inputTopic\">Topic</label><input type=\"text\" class=\"form-control\" id=\"inputTopic\"></div></div><button id=\"submit-topic\" type=\"submit\" class=\"btn btn-primary\" data-expert=\"'+val3+'\" data-client=\"'+val+'\">Save</button></div></div></div>';

            $('.new-topic').html(topicStr);*/

            $('.topic-name').html(str);

            $('.topic-chat').click(function(){
              getTargetChat($(this));
              updateScroll();
            });

            /*$('#submit-topic').click(function(){

                createtopic(this,true);
            });*/
            
          }
        }
    });

}

function getTargetChat(element){

    var x = document.getElementById('group-msg');

    if (x.style.display === 'none') {
      x.style.display = 'block';
    }

    var client_id = element.data('cl-id');
    var topic_id = element.data('topic');
    var top_name = element.data('topic-name');
    var user_id = '".Yii::$app->user->identity->id."';
    var cl_user_id = element.data('cl-user-id');

    $('.cl-topic-name').html(top_name);

    console.log(topic_id);
    $.ajax({
        url: '".Url::to(['/chatExpert/default/index'])."',
        type: 'POST',
        data: {
          id: client_id, 
          tid: topic_id,
          cuser_id: cl_user_id 
        },
        success: function (result) {

          console.log(result);

          var data = JSON.parse(result);
          var chatstr = '';
          var btnsendstr ='';
          var btnprevstr ='';
           for (var key in data) {
              var row = data[key];
              // console.log(row['message']);

              chatstr += messageBox(row);
            }

            var dataUrl = '".Url::to(['/chatExpert/default/send-message'])."';
            var loadUrl = '".Url::to(['/chatExpert/default/load-message'])."';
            
            btnsendstr = '<input class=\"form-control b-0 py-10\" type=\"text\" id=\"chat-message\" placeholder=\"Say something...\"><div class=\"d-flex justify-content-between align-items-center \"><button type=\"button\" class=\"waves-effect waves-circle btn btn-circle mr-10 btn-outline-primary\"><i class=\"mdi mdi-link\"></i></button><button type=\"button\" class=\"waves-effect waves-circle btn btn-circle btn-primary\" type=\"submit\" id=\"send-message\" data-url=\"'+dataUrl+'\" data-id=\"'+user_id+'\" data-recipient=\"'+cl_user_id+'\" data-topic=\"'+topic_id+'\"><i class=\"mdi mdi-send\"></i></button></div>';

            btnsendstr = '<input class=\"form-control b-0 py-10\" type=\"text\" id=\"chat-message\" placeholder=\"Say something...\"><div class=\"d-flex justify-content-between align-items-center \"><button type=\"button\" class=\"waves-effect waves-circle btn btn-circle mr-10 btn-outline-primary\"><i class=\"mdi mdi-link\"></i></button><button type=\"button\" class=\"waves-effect waves-circle btn btn-circle btn-primary\" type=\"submit\" id=\"send-message\" data-url=\"'+dataUrl+'\" data-id=\"'+user_id+'\" data-recipient=\"'+cl_user_id+'\" data-topic=\"'+topic_id+'\"><i class=\"mdi mdi-send\"></i></button></div>';

            btnprevstr = '<button type=\"button\" type=\"submit\" id=\"load-message\" class=\"btn btn-rounded btn-secondary-outline\" data-url=\"'+loadUrl+'\" data-id=\"'+user_id+'\" data-recipient=\"'+cl_user_id+'\" data-topic=\"'+topic_id+'\">Load More</button>';

            $('.btn-send-message').html(btnsendstr);
            $('.btn-previous-message').html(btnprevstr);
            $('#chat-box').html(chatstr);

            $('#send-message').click(function(){

                sendchat(this,true);
            });

            $('#load-message').click(function(){

                loadchat(this,true);
            });

            $('.delete-msg').click(function(){

                deletemessage($(this));
            });


        }
    });

}

function messageBox(row){
  var client = '';
  var role = '';
  // console.log(row['chat_id']);

  var dateData = new Date(row['time'] * 1000);
  var date = ((dateData.getDate() < 10)?'0':'') + dateData.getDate() +'/'+(((dateData.getMonth()+1) < 10)?'0':'') + (dateData.getMonth()+1) +'/'+ dateData.getFullYear();
  var time = ((dateData.getHours() < 10)?'0':'') + dateData.getHours() +':'+ ((dateData.getMinutes() < 10)?'0':'') + dateData.getMinutes() + (dateData.getHours() >= 12 ? 'PM' : 'AM');
  var dd = date + '  ' + time;

  if(row['sender_id'] == '".Yii::$app->user->identity->id."'){
      client = true;
      role = 'profile';
      
  }else{
      client = false;
      role = 'client';
  }

  if(client){

    var sender_id = row['sender_id'];
    var url = '".Url::to(['/expert/profile/profile-image', 'id' => ''])."' + sender_id;

      str = '<div id=\"msg-'+row['chat_id']+'\" class=\"card d-inline-block mb-3 float-right mr-2 bg-primary max-w-p80\"><div class=\"position-absolute pt-1 pl-2 l-0\"><span class=\"text-extra-small\">'+dd+'</span></div><div class=\"card-body\"><div class=\"d-flex flex-row pb-2\"><div class=\"d-flex flex-grow-1 justify-content-end\"><div class=\"m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between\"><div><p class=\"mb-0 font-size-16\">' + row['sender_name']  + '</p></div></div></div><a class=\"d-flex\" href=\"#\"><img alt=\"Profile\" src=\"'+ url +'\" class=\"avatar ml-10\"></a><div class=\"dropdown\"><a id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">&nbsp<span class=\"mdi mdi-dots-vertical\"></span></a><div class=\"dropdown-content\" aria-labelledby=\"dropdownMenuButton\"><a data-chat=\"'+row['chat_id']+'\" class=\"delete-msg dropdown-item\" href=\"#\">Delete</a></div></div></div><div class=\"chat-text-left pr-50\"><p class=\"mb-0 text-semi-muted card-msg\" id=\"'+row['chat_id']+'\">' + row['message']  + '</p></div></div></div><div class=\"clearfix\"></div>';

      return str;

  }else{

    var sender_id = row['sender_id'];
    var url = '".Url::to(['/expert/profile/client-image', 'id' => ''])."' + sender_id;

      str = '<div class=\"card d-inline-block mb-3 float-left mr-2\"><div class=\"position-absolute pt-1 pr-2 r-0\"><span class=\"text-extra-small text-muted\">'+dd+'</span></div><div class=\"card-body\"><div class=\"d-flex flex-row pb-2\"><a class=\"d-flex\" href=\"#\"><img alt=\"Profile\" src=\"'+ url +'\" class=\"avatar mr-10\"></a><div class=\"d-flex flex-grow-1 min-width-zero\"><div class=\"m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between\"><div class=\"min-width-zero\"><p class=\"mb-0 font-size-16 text-dark\">' + row['sender_name']  + '</p></div></div></div></div><div class=\"chat-text-left pl-55\"><p class=\"mb-0 text-semi-muted card-msg\" id=\"'+row['chat_id']+'\">' + row['message']  + '</p></div></div></div><div class=\"clearfix\"></div>'

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

  $('#a-expert').click(function(){
      $('.btn-send-message').html('');
      $('.btn-previous-message').html('');
      $('#chat-box').html('');
      $('.cl-topic-name').html('');

      var x = document.getElementById('group-msg');
      if (x.style.display === 'block') {
        x.style.display = 'none';
      }
  });

  getTopic($(this), true);

});


";
// JuiAsset::register($this);
$this->registerJs($js);

$script="

//Create Topic
function createtopic(button,submitTopic) {
    
    $.ajax({
        url: '".Url::to(['/chat/default/create-topic'])."',
        type: 'POST',
        data: {
            'submitTopic':submitTopic,
            'ChatTopic[client_id]': $('#submit-topic').data('client'),
            'ChatTopic[expert_id]': $('#submit-topic').data('expert'),
            'ChatTopic[topic]': $('#inputTopic').val()
        },
        success: function (data) {
          // console.log(data);
          var data = JSON.parse(data);
          var str = '';

          for (var key in data) {
            var row = data[key];
            // console.log(row);
            str += '<div class=\"media py-10 px-0 align-items-center\"><div class=\"media-body\"><p class=\"font-size-16 test\"><a data-topic=\"'+row['topic_id']+'\" data-exp-id=\"'+row['expert_id']+'\" data-exp-user-id=\"'+row['expert_user_id']+'\" class=\"hover-primary topic-chat\" href=\"#\">'+row['topic_name']+'</a></p></div></div>';
            
          }
          $('.topic-name').prepend(str);
          $('#inputTopic').val('');
          $('.topic-chat').click(function(){
              // alert($(this).data('topic'));
              getTargetChat($(this));
            });
          $('#exampleModalLong').modal('hide');
        }
    });
}

// Delete Message
function deletemessage(element){

  var chat_id = element.data('chat');

  $.ajax({
      url: '".Url::to(['/chat/default/delete-message'])."',
      type: 'POST',
      data: {
        cid: chat_id
      },
      success: function (result) {
        console.log('Delete Success');
        $('#msg-'+result).empty();
        $('#msg-'+result).remove();
      }
  });

}


//Send Chat
function sendchat(button,sendMessage) {

  var last = $('#chat-box .card-msg').last().attr('id');
  // alert(last);
    
    $.ajax({
        url: $('#send-message').data('url'),
        type: 'POST',
        data: {
            'sendMessage':sendMessage,
            'ChatModel[sender_id]': $('#send-message').data('id'),
            'ChatModel[recipient_id]': $('#send-message').data('recipient'),
            'ChatModel[topic_id]': $('#send-message').data('topic'),
            'ChatModel[last_message_id]': last,
            'ChatModel[message]': $('#chat-message').val()
        },
        success: function (data) {
          // console.log(data);
        var data = JSON.parse(data);
          var chatstr = '';

           for (var key in data) {
              var row = data[key];
              // console.log(row);
              chatstr += messageBox(row);
            }

          if(sendMessage){
            $('#chat-message').val('');
          }

          $('#chat-box').append(chatstr);

          $('.delete-msg').click(function(){

              deletemessage($(this));
          });
        }
    });
}

$('#send-message').click(function(){
    sendchat(this,true);
});

setInterval(function () { 
  sendchat(null,false); 
  getTopic($('#current-topic'), false);
  }, 1000 );


//Load Previous Chat
function loadchat(button,loadMessage) {

var first = $('#chat-box .card-msg').first().attr('id');
// alert(first);

    $.ajax({
        url: $('#load-message').data('url'),
        type: 'POST',
        data: {
            'loadMessage':loadMessage,
            'ChatModel[sender_id]': $('#load-message').data('id'),
            'ChatModel[recipient_id]': $('#load-message').data('recipient'),
            'ChatModel[topic_id]': $('#load-message').data('topic'),
            'ChatModel[first_message_id]': first,
        },
        success: function (data) {
          // console.log(data);
        var data = JSON.parse(data);
          var chatstr = '';

           for (var key in data) {
              var row = data[key];
              // console.log(row);
              chatstr += messageBox(row);
            }
          $('#chat-box').prepend(chatstr);

          $('.delete-msg').click(function(){

              deletemessage($(this));
          });
        }
    });
  
  
}

$('#load-message').click(function(){
  loadchat(this,true);
});

";





$this->registerJs($script, $this::POS_READY);

?>