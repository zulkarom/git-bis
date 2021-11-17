<?php

use yii\helpers\Url;
?>


<script>

  $(document).ready(function(){
    getUserList($(this), true);
  });


function getUserList(element, init){

  var userUrl = '';
  if('<?=Yii::$app->user->identity->role?>' == 1){
      userUrl = '<?=Url::to(['/chat/chat-test/get-list-experts'])?>';
      
  }else {
      userUrl = '<?=Url::to(['/chatExpert/chat/get-list-clients'])?>';
  }


    $.ajax({
        url: userUrl,
        type: 'POST',
        data: {},
        success: function (result) {

          // console.log(result);

          if(result){
            var data = JSON.parse(result);
            
            var str = '';

            for (let index = 0; index < data.length; ++index) {
              const client_id = data[index].client_id;
              const expert_id = data[index].expert_id;
              const client_expert_id = data[index].client_expert_id;
              const clEx_user_id = data[index].clEx_user_id;
              const clEx_name = data[index].clEx_name;
              const clEx_profile = data[index].clEx_profile;
              const unread = data[index].unread;

              if(unread == 0){

                str += '<div class="media-list media-list-hover"><div id="" class="send-topic media py-10 px-0 align-items-center" data-client="'+client_id+'" data-expert-id="'+expert_id+'" data-client-expert-id="'+client_expert_id+'" data-clEx-user-id="'+clEx_user_id+'" data-clEx-name="'+clEx_name+'" data-clEx-profile="'+clEx_profile+'"><a class="avatar avatar-lg status-danger" href="#"><img src="'+clEx_profile+'" alt=""></a><div class="media-body"><p class="font-size-16"><a class="hover-primary" href="#">'+clEx_name+'</a></p></div></div></div>';
              }else{
                str += '<div class="media-list media-list-hover"><div id="" class="send-topic media py-10 px-0 align-items-center" data-client="'+client_id+'" data-expert-id="'+expert_id+'" data-client-expert-id="'+client_expert_id+'" data-clEx-user-id="'+clEx_user_id+'" data-clEx-name="'+clEx_name+'" data-clEx-profile="'+clEx_profile+'"><a class="avatar avatar-lg status-danger" href="#"><img src="'+clEx_profile+'" alt=""></a><div class="media-body"><p class="font-size-16"><a class="hover-primary" href="#">'+clEx_name+'</a></p></div><div class="media-right"><span class="badge badge-primary badge-pill">'+unread+'</span></div></div></div>';
              }
            }
            $('.list-expert').html(str);                      
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
                $('.exp-topic-name').html('');

                var x = document.getElementById('group-msg');
                if (x.style.display === 'block') {
                  x.style.display = 'none';
                }
            });

            getTopic($(this), true);

          });

        }
    });

}

function getTargetChat(element, init){

    var expert_id = element.attr('data-exp-id');
    var topic_id = element.attr('data-topic');
    var top_name = element.attr('data-topic-name');
    var user_id = '<?=Yii::$app->user->identity->id?>';
    var clEx_user_id = element.attr('data-clEx-user-id');

    if(topic_id){

      if(init){

        var x = document.getElementById('group-msg');

        if (x.style.display === 'none') {
          x.style.display = 'block';
        }

        $('.exp-topic-name').html(top_name);

        $('#current-chat-box').attr('data-exp-id', expert_id);
        $('#current-chat-box').attr('data-topic', topic_id);
        $('#current-chat-box').attr('data-topic-name', top_name);
        $('#current-chat-box').attr('data-clEx-user-id', clEx_user_id);
      }

      var chatUrl = '';
      if('<?=Yii::$app->user->identity->role?>' == 1){
          chatUrl = '<?=Url::to(['/chat/default/index'])?>';
      }else {
          chatUrl = '<?=Url::to(['/chatExpert/default/index'])?>';
      }

      $.ajax({
          url: chatUrl,
          type: 'POST',
          data: {
            id: expert_id, 
            tid: topic_id,
            ex_user_id: clEx_user_id
          },
          success: function (result) {
            var data = JSON.parse(result);
            var chatstr = '';
            var btnsendstr ='';
            var btnprevstr ='';

              if(init){
                for (var key in data) {
                  var row = data[key];
                  // console.log(row['message']);

                  chatstr += messageBox(row);
                }

              
                var dataUrl = '<?=Url::to(['/chat/default/send-message'])?>';
                var loadUrl = '<?=Url::to(['/chat/default/load-message'])?>';

                btnsendstr = '<input class="form-control b-0 py-10" type="text" id="chat-message" placeholder="Say something..."><div class="d-flex justify-content-between align-items-center "><button type="button" class="waves-effect waves-circle btn btn-circle mr-10 btn-outline-primary"><i class="mdi mdi-link"></i></button><button type="button" class="waves-effect waves-circle btn btn-circle btn-primary" type="submit" id="send-message" data-url="'+dataUrl+'" data-id="'+user_id+'" data-recipient="'+clEx_user_id+'" data-topic="'+topic_id+'"><i class="mdi mdi-send"></i></button></div>';

                btnprevstr = '<button type="button" type="submit" id="load-message" class="btn btn-rounded btn-secondary-outline" data-url="'+loadUrl+'" data-id="'+user_id+'" data-recipient="'+clEx_user_id+'" data-topic="'+topic_id+'">Load More</button>';

                $('.btn-send-message').html(btnsendstr);
                $('.btn-previous-message').html(btnprevstr);
                $('#chat-box').html(chatstr);

                $('#send-message').click(function(){
                  if($('#chat-message').val()){
                    sendchat(true);
                  }
                });
                

                $('#load-message').click(function(){

                    loadchat(this,true);
                });

                $('.delete-msg').click(function(){

                    deletemessage($(this));
                });

                $('.chat-box-one').slimScroll({ scrollTo: $('.chat-box-one')[0].scrollHeight + 'px' });
                
              }    

          }


      });
    }

}

function messageBox(row){
  var client = '';
  var role = '';
  
  var read = '';
  // console.log(read);
  var dateData = new Date(row['time'] * 1000);
  var date = ((dateData.getDate() < 10)?'0':'') + dateData.getDate() +'/'+(((dateData.getMonth()+1) < 10)?'0':'') + (dateData.getMonth()+1) +'/'+ dateData.getFullYear();
  var time = ((dateData.getHours() < 10)?'0':'') + dateData.getHours() +':'+ ((dateData.getMinutes() < 10)?'0':'') + dateData.getMinutes() + (dateData.getHours() >= 12 ? 'PM' : 'AM');
  var dd = date + '  ' + time;
  

  if(row['sender_id'] == '<?=Yii::$app->user->identity->id?>'){
      client = true;
      role = 'profile';
      
  }else{
      client = false;
      role = 'expert';
  }

  if(client){



    var sender_id = row['sender_id'];
    var url = '<?=Url::to(['/client/profile/profile-image', 'id' => ''])?>' + sender_id;

      str = '<div id="msg-'+row['chat_id']+'" class="card d-inline-block mb-3 float-right mr-2 bg-primary max-w-p80"><div class="position-absolute pt-1 pl-2 l-0"><span class="text-extra-small">'+dd+'</span></div><div class="card-body"><div class="d-flex flex-row pb-2"><div class="d-flex flex-grow-1 justify-content-end"><div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between"><div><p class="mb-0 font-size-16">' + row['sender_name']  + '</p></div></div></div><a class="d-flex" href="#"><img alt="Profile" src="'+ url +'" class="avatar ml-10"></a><div class="dropdown"><a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp<span class="mdi mdi-dots-vertical"></span></a><div class="dropdown-content" aria-labelledby="dropdownMenuButton"><a data-chat="'+row['chat_id']+'" class="delete-msg dropdown-item" href="#">Delete</a></div></div></div><div class="chat-text-left pr-50"><p class="mb-0 text-semi-muted card-msg" id="'+row['chat_id']+'">' + row['message']  + '</p></div></div></div><div class="clearfix"></div>';

      return str;

  }else{


    var sender_id = row['sender_id'];
    var url = '<?=Url::to(['/client/profile/expert-image', 'id' => ''])?>' + sender_id;

      str = '<div id="msg-'+row['chat_id']+'" class="card d-inline-block mb-3 float-left mr-2"><div class="position-absolute pt-1 pr-2 r-0"><span class="text-extra-small text-muted">'+dd+'</span></div><div class="card-body"><div class="d-flex flex-row pb-2"><a class="d-flex" href="#"><img alt="Profile" src="'+ url +'" class="avatar mr-10"></a><div class="d-flex flex-grow-1 min-width-zero"><div class="m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between"><div class="min-width-zero"><p class="mb-0 font-size-16 text-dark">' + row['sender_name']  + '</p></div></div></div></div><div class="chat-text-left pl-55"><p class="mb-0 text-semi-muted card-msg" id="'+row['chat_id']+'">' + row['message']  + '</p></div></div></div><div class="clearfix"></div>';

      

      return str;
  }

  
}

// Delete Message
function deletemessage(element){

  var chat_id = element.data('chat');

  $.ajax({
      url: '<?=Url::to(['/chat/default/delete-message'])?>',
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
function sendchat(sendMessage) {

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

          if(data){
            var data = JSON.parse(data);

            // console.log(data);
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

          if(sendMessage){
            $('.chat-box-one').slimScroll({ scrollTo: $('.chat-box-one')[0].scrollHeight + 'px' });
          }
          
          
        }
    });
}

//Refresh Chat
function refreshchat(element, refreshMessage) {

  var last = $('#chat-box .card-msg').last().attr('id');
  // alert(last);

  var sender_id = element.attr('data-id');
  var recipient_id = element.attr('data-recipient');
  var topic_id = element.attr('data-topic');

  if(refreshMessage){
    $('#current-chat-box').attr('data-id', sender_id);
    $('#current-chat-box').attr('data-recipient', recipient_id);
    $('#current-chat-box').attr('data-topic', topic_id);
  }

  if(topic_id){
    
    $.ajax({
        url: '<?=Url::to(['/chat/default/refresh-message'])?>',
        type: 'POST',
        data: {
            'refreshMessage':refreshMessage,
            'ChatModel[sender_id]': sender_id,
            'ChatModel[recipient_id]': recipient_id,
            'ChatModel[topic_id]': topic_id,
            'ChatModel[last_message_id]': last,
        },
        success: function (data) {

          if (data) {

            var data = JSON.parse(data);           

            // console.log(data);
            var chatstr = '';
            var i = 0;
              for (var key in data) {
                var row = data[key];
                // console.log(row);
                if(row['is_deleted'] != 0){
                  $('#msg-'+row['is_deleted']).empty();
                }else{
                  chatstr += messageBox(row);
                  i = 1;
                }
              }

            $('#chat-box').append(chatstr);

            if(i == 1){
              $('.chat-box-one').slimScroll({ scrollTo: $('.chat-box-one')[0].scrollHeight + 'px' });
            }
            
          }

          
                   
        }
    });
  }
}

setInterval(function () { 
  
  // sendchat($('#current-chat-box'), false);
  getTopic($('#current-topic'), false);
  getTargetChat($('#current-chat-box'), false);
  refreshchat($('#current-chat-box'), false);
  getExpertList($('#current-expert'), false);
  }, 5000 );


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

</script>