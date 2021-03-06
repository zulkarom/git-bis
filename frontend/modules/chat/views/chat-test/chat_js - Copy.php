
<?php

use yii\helpers\Url;
?>


<script>

  $(document).ready(function(){
    getExpertList($(this), true);
  });

 

function getExpertList(element, init){

  

    $.ajax({
        url: '<?=Url::to(['/chat/chat-test/get-list-experts'])?>',
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
              const expert_user_id = data[index].expert_user_id;
              const expert_name = data[index].expert_name;
              const expert_profile = data[index].expert_profile;
              const unread = data[index].unread;

              if(unread == 0){

                str += '<div class="media-list media-list-hover"><div id="" class="send-topic media py-10 px-0 align-items-center" data-client="'+client_id+'" data-expert-id="'+expert_id+'" data-client-expert-id="'+client_expert_id+'" data-expert-user-id="'+expert_user_id+'" data-expert-name="'+expert_name+'" data-expert-profile="'+expert_profile+'"><a class="avatar avatar-lg status-danger" href="#"><img src="'+expert_profile+'" alt=""></a><div class="media-body"><p class="font-size-16"><a class="hover-primary" href="#">'+expert_name+'</a></p></div></div></div>';
              }else{
                str += '<div class="media-list media-list-hover"><div id="" class="send-topic media py-10 px-0 align-items-center" data-client="'+client_id+'" data-expert-id="'+expert_id+'" data-client-expert-id="'+client_expert_id+'" data-expert-user-id="'+expert_user_id+'" data-expert-name="'+expert_name+'" data-expert-profile="'+expert_profile+'"><a class="avatar avatar-lg status-danger" href="#"><img src="'+expert_profile+'" alt=""></a><div class="media-body"><p class="font-size-16"><a class="hover-primary" href="#">'+expert_name+'</a></p></div><div class="media-right"><span class="badge badge-primary badge-pill">'+unread+'</span></div></div></div>';
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


function getTopic(element, init){

    var val = element.attr('data-client');
    var val2 = element.attr('data-expert-name');
    var val3 = element.attr('data-expert-id');
    var val4 = element.attr('data-expert-user-id');
    var val5 = element.attr('data-expert-profile');
    var val6 = element.attr('data-client-expert-id');
    // console.log(val6);
    if(init){

      var x = document.getElementById('group-header');

      if (x.style.display === 'none') {
        x.style.display = 'block';
      }

      $('#current-topic').attr('data-client', val);
      $('#current-topic').attr('data-expert-name', val2);
      $('#current-topic').attr('data-expert-id', val3);
      $('#current-topic').attr('data-expert-user-id', val4);
      $('#current-topic').attr('data-expert-profile', val5);
      $('#current-topic').attr('data-client-expert-id', val6);
    
      var expStr ='';
      expStr = '<div class="media-list media-list-hover"><div class="media py-10 px-0 align-items-center"><a class="avatar avatar-lg status-success" href="#"><img src="'+val5+'" alt=""></a><div class="media-body"><p class="font-size-16"><a class="hover-primary" href="#">'+val2+'</a><br/></p></div></div><div class="media py-10 px-0 align-items-center"><div class="media-body" align="center"><p class="font-size-16 new-topic"></p></div></div></div>';

      $('.exp-details').html(expStr);

      // $('.exp-name').html(val2);
      // $('.exp-profile').attr('src',element.data('expert-profile'));

      $('.exp-name2').html(val2);
      $('.exp-profile2').attr('src',element.data('expert-profile'));
    }
    
    

    $.ajax({
        url: '<?=Url::to(['/chat/chat-test/get-topics'])?>',
        type: 'POST',
        data: {
          client_id: val, 
          expert_id: val3,
          client_expert_id : val6
        },
        success: function (result) {
          if(result){
            // console.log(result);
            var data = JSON.parse(result);
            // console.log(data);
            var str = '';
            var dataStr = '';
            var topicStr ='';

            var dft = '';
            var tid = '';

            for (let index = 0; index < data.length; ++index) {

              const top_id = data[index].id;
              const top_name = data[index].value;
              const is_default = data[index].is_default;
              const unread = data[index].unread;


              dataStr = '<div class="media-list media-list-hover"><div id="topic-'+top_id+'" class="media py-10 px-0 align-items-center topic-chat" data-topic="'+top_id+'" data-topic-name="'+top_name+'" data-exp-id="'+val3+'" data-exp-user-id="'+val4+'"><div class="media-body"><div class="row"><div class="col-10"><p class="font-size-16 test"><a id="pre-topic-'+top_id+'" class="hover-primary" href="#">' + top_name + '</a></p></div>';

              dataUpdt = '<a class="update-topic dropdown-item" href="#" data-topic ="'+top_id+'"><span style="display:none">' + top_name + '</span>Update</a>';

                if(is_default == 1){
                  if(unread == 0){
                    str += dataStr+'</div></div></div></div>';
                    dft = 1;
                    tid = top_id;
                  }else{
                    str += dataStr+'<div class="media-right"><span class="badge badge-primary badge-pill">'+unread+'</span></div></div></div></div></div>';
                    dft = 1;
                    tid = top_id;
                  }
                }else{
                  if(unread == 0){
                    str += dataStr+'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<div class="media-right"><div class="dropdown"><a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp<span class="mdi mdi-dots-vertical"></span></a><div class="dropdown-content" aria-labelledby="dropdownMenuButton"><a data-topic="'+top_id+'" class="delete-topic dropdown-item" href="#">Delete</a>'+dataUpdt+'</div></div></div></div></div></div></div>';
                  }else{
                    str += dataStr+'<div class="media-right"><span class="badge badge-primary badge-pill">'+unread+'</span></div>&nbsp&nbsp<div class="media-right"><div class="dropdown"><a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp<span class="mdi mdi-dots-vertical"></span></a><div class="dropdown-content" aria-labelledby="dropdownMenuButton"><a data-topic="'+top_id+'" class="delete-topic dropdown-item" href="#">Delete</a>'+dataUpdt+'</div></div></div></div></div></div></div>';
                  }
                }
            } 

            if(init){                        
              var topicStr = '<button id="btn-topic" type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTopicModalLong">Create Topic</button><div class="modal fade" id="createTopicModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Create Topic</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="form-row"><div class="form-group col-md-12"><label for="inputTopic">Topic</label><input type="text" class="form-control" id="inputTopic"></div></div><button id="submit-topic" type="submit" class="btn btn-primary" data-expert="'+val3+'" data-client="'+val+'" data-client-expert="'+val6+'" data-exp-user-id="'+val4+'">Save</button></div></div></div>';

              $('.new-topic').html(topicStr);

              $('#submit-topic').click(function(){

                  createtopic(this,true);
              });

            }

            $('.topic-name').html(str);

            if(init){
              if(dft == 1){
                getTargetChat($('#topic-'+tid), true);
              }
            }
            

            $('.topic-chat').click(function(){
              getTargetChat($(this), true);
             
            });

            

            $('.delete-topic').click(function(){

                deletetopic($(this));
            });

            $( '.update-topic').click(function(){
                var topName = $(this).children().text();
                var topic_id = $(this).attr('data-topic');
                $('#inputUpdtTopic').val(topName);
                $('#submit-updt-topic').attr('data-topic',topic_id);
                $('#updateModalTopic').modal('show');
            
            });

            $('#submit-updt-topic').click(function(){

                updatetopic($(this));

            });

            
            
          }
        }
    });

}

function getTargetChat(element, init){

    var expert_id = element.attr('data-exp-id');
    var topic_id = element.attr('data-topic');
    var top_name = element.attr('data-topic-name');
    var user_id = '<?=Yii::$app->user->identity->id?>';
    var exp_user_id = element.attr('data-exp-user-id');

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
        $('#current-chat-box').attr('data-exp-user-id', exp_user_id);
      }

      $.ajax({
          url: '<?=Url::to(['/chat/default/index'])?>',
          type: 'POST',
          data: {
            id: expert_id, 
            tid: topic_id,
            ex_user_id: exp_user_id
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

                btnsendstr = '<input class="form-control b-0 py-10" type="text" id="chat-message" placeholder="Say something..."><div class="d-flex justify-content-between align-items-center "><button type="button" class="waves-effect waves-circle btn btn-circle mr-10 btn-outline-primary"><i class="mdi mdi-link"></i></button><button type="button" class="waves-effect waves-circle btn btn-circle btn-primary" type="submit" id="send-message" data-url="'+dataUrl+'" data-id="'+user_id+'" data-recipient="'+exp_user_id+'" data-topic="'+topic_id+'"><i class="mdi mdi-send"></i></button></div>';

                btnprevstr = '<button type="button" type="submit" id="load-message" class="btn btn-rounded btn-secondary-outline" data-url="'+loadUrl+'" data-id="'+user_id+'" data-recipient="'+exp_user_id+'" data-topic="'+topic_id+'">Load More</button>';

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

//Create Topic
function createtopic(element,submitTopic) {

    var val = $('#submit-topic').data('client');
    var val2 = $('#submit-topic').data('expert-name');
    var val3 = $('#submit-topic').data('expert');
    var val4 = $('#submit-topic').data('expert-user-id');
    var val6 = $('#submit-topic').data('client-expert');

    $.ajax({
        url: '<?=Url::to(['/chat/default/create-topic'])?>',
        type: 'POST',
        data: {
            'submitTopic':submitTopic,
            'ChatTopic[client_id]': val,
            'ChatTopic[expert_id]': val3,
            'ChatTopic[client_expert_id]': val6,
            'ChatTopic[topic]': $('#inputTopic').val()
        },
        success: function (data) {
          // console.log(data);
          var data = JSON.parse(data);
          var str = '';

          for (var key in data) {
            var row = data[key];
            var element_id = row['topic_id'];
            // console.log(row);

            str += '<div class="media-list media-list-hover"><div id="topic-'+row['topic_id']+'" class="media py-10 px-0 align-items-center topic-chat" data-topic="'+row['topic_id']+'" data-topic-name="'+row['topic_name']+'" data-exp-id="'+row['expert_id']+'" data-exp-user-id="'+row['expert_user_id']+'"><div class="media-body"><div class="row"><div class="col-10"><p class="font-size-16 test"><a id="atopic-'+row['topic_id']+'" class="hover-primary" href="#">'+row['topic_name']+'</a></p></div><div class="col-2" align="right"><div class="dropdown"><a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp<span class="mdi mdi-dots-vertical"></span></a><div class="dropdown-content" aria-labelledby="dropdownMenuButton"><a data-topic="'+row['topic_id']+'" class="delete-topic dropdown-item" href="#">Delete</a><a class="update-topic dropdown-item" href="#" data-topic ="'+row['topic_id']+'"><span style="display:none">' +row['topic_name']+'</span>Update</a></div></div></div></div></div></div>';
            
          }
          $('.topic-name').append(str);

          $('.delete-topic').click(function(){
              deletetopic($(this));
          });
          

          $('#inputTopic').val('');
          $('.topic-chat').click(function(){
              getTargetChat($(this), true);
          });
          $('#createTopicModalLong').modal('hide');

          $( '.update-topic').click(function(){
                var topName = $(this).children().text();
                var topic_id = $(this).attr('data-topic');
                $('#inputUpdtTopic').val(topName);
                $('#submit-updt-topic').attr('data-topic',topic_id);
                $('#updateModalTopic').modal('show');
            
            });

            $('#submit-updt-topic').click(function(){

                updatetopic($(this));

            });



          getTargetChat($('#topic-'+element_id), true);

          // console.log($('#topic-'+element_id));

        }
    });
}

//Delete Topic
function deletetopic(element){

  var topic_id = element.data('topic');
  if(confirm('Are you sure to delete this topic? All related messages will also be deleted')){
    $.ajax({
      url: '<?=Url::to(['/chat/default/delete-topic'])?>',
      type: 'POST',
      data: {
        tid: topic_id
      },
      success: function (result) {
        
            console.log('Delete Success');
            $('#topic-'+result).remove();
            $('.btn-send-message').html('');
            $('.btn-previous-message').html('');
            $('#chat-box').html('');
            $('.exp-topic-name').html('');

            var x = document.getElementById('group-msg');
                if (x.style.display === 'block') {
                  x.style.display = 'none';
                }
      }
    });
  }

}

//Update Topic
function updatetopic(element){

  var topic_id = element.attr('data-topic');

  $('#updateModalTopic').modal('hide');

  $.ajax({
    url: '<?=Url::to(['/chat/default/update-topic'])?>',
    type: 'POST',
    data: {
      tid: topic_id,
      topic_name: $('#inputUpdtTopic').val()
    },
    success: function (result) {

      $('#inputUpdtTopic').val(result);
      $('#pre-topic-'+topic_id).text(result);
      $('.exp-topic-name').html(result);
    }
  });
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

            console.log(data);
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

$('#load-message').click(function(){
  loadchat(this,true);
});


</script>
