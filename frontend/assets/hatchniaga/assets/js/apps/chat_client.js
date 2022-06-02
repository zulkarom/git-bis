!(function (NioApp, $) {
    "use strict";

    var $win = $(window), $body = $('body'), breaks = NioApp.Break;

    NioApp.Chats = function(){


        function getTopic(element, init){

            var topicUrl = $('#topicUrl').val();
          

            $.ajax({
                url: topicUrl,
                type: 'GET',
                data: {},
                success: function (result) {

                  // console.log(result);

                  if(result){
                    var data = JSON.parse(result);

                    // console.log(data);
                    
                    var str = '';
                    var str_unread = '';

                    for (let index = 0; index < data.length; ++index) {
                      const client_id = data[index].client_id;
                      const expert_id = data[index].expert_id;
                      const client_expert_id = data[index].client_expert_id;
                      const clEx_user_id = data[index].clEx_user_id;
                      const clEx_name = data[index].clEx_name;
                      const clEx_profile = data[index].clEx_profile;
                      const clEx_expertise = data[index].clEx_expertise;
                      const unread = data[index].unread;
                      const topic_id = data[index].id;
                      const topic_name = data[index].topic_name;
                      const value = data[index].value;
                      const is_default = data[index].is_default;
                      const datetime = data[index].datetime;

                      

                      const row = {topic_id:topic_id, client_id:client_id, expert_id:expert_id, client_expert_id:client_expert_id, clEx_user_id:clEx_user_id, clEx_name:clEx_name, clEx_profile:clEx_profile, topic_name:topic_name, datetime};
                      // alert(row['topic_id']);
                      str += html_list_topic(row,unread);


                    }
                    $('.list-topic').html(str);                      
                  }

                  var topicStr = '<button id="btn-topic" class="btn btn-lg btn-icon btn-outline-light btn-white btn-round" data-bs-toggle="modal" data-bs-target="#modalDefault"><em class="icon ni ni-plus"></em></button>';

                  $('.new-topic').html(topicStr);

                   $('#submit-topic').click(function(){

                      createtopic(this,true);
                  });

                  $('.send-topic').click(function(){

                    getTargetChat($(this), true);

                  });

                  $('.delete-topic').click(function(){
                        deletetopic($(this));
                    });

                  $( '.update-topic').click(function(){
                        var topName = $(this).children().text();
                        var expName = $(this).children().eq(1).text();
                        var topic_id = $(this).attr('data-topic');
                        $('#inputUpdtTopic').val(topName);
                        $('#up-exp-id').val(expName);
                        $('#submit-updt-topic').attr('data-topic',topic_id);
                        $('#updateModalTopic').modal('show');
                    
                    });

                  $('#submit-updt-topic').click(function(){
                        updatetopic($(this));
                    });

                  /*$('.a-topic').click(function(){

                    $('#a-topic').addClass('active');

                    $('#a-expert').removeClass('active');

                    // $('#panel-topic').addClass('active');
                    // $('#panel-expert').removeClass('active');

                    // getTopic($(this), true);

                  });*/


                }
            });

        }

        getTopic($(this), true);



        function createtopic(element,submitTopic) {

            // alert($('#exp-id').val());
            var createUrl = $('#createUrl').val();

            $.ajax({
                url: createUrl,
                type: 'GET',
                data: {
                    'submitTopic':submitTopic,
                    'ChatTopic[expert_id]': $('#exp-id').val(),
                    'ChatTopic[topic]': $('#inputTopic').val()
                },
                success: function (data) {
                  
                  var data = JSON.parse(data);
                  console.log(data);
                  var str = '';
                  var str_unread = '';

                  for (var key in data) {
                    var row = data[key];
                    var element_id = row['topic_id'];
                    console.log(row);

                     str += html_list_topic(row, 0) ;
                    
                  }
                  $('.list-topic').prepend(str);

                  $('.delete-topic').click(function(){
                      deletetopic($(this));
                  });
                  

                  $('#inputTopic').val('');
                  $('.send-topic').click(function(){
                      getTargetChat($(this), true);
                  });
                  $('#modalDefault').modal('hide');

                  $( '.update-topic').click(function(){
                        var topName = $(this).children().text();
                        var expName = $(this).children().eq(1).text();
                        var topic_id = $(this).attr('data-topic');
                        $('#inputUpdtTopic').val(topName);
                        $('#up-exp-id').val(expName);
                        $('#submit-updt-topic').attr('data-topic',topic_id);
                        $('#updateModalTopic').modal('show');
                    
                    });

                  $('#submit-updt-topic').click(function(){
                        updatetopic($(this));
                    });



                  getTargetChat($('#topic-'+element_id), true);

                  console.log($('#topic-'+element_id));

                }
            });
    }

    function html_list_topic(row, unread){

        var str_unread ='';
        var str;
        if(unread != 0){
            str_unread = '<em class="icon ni ni-bullet-fill"></em>';
          }

        str ='<li class="chat-item" id="topic-'+row['topic_id']+'"><div class="send-topic" data-client="'+row['client_id']+'" data-expert-id="'+row['expert_id']+'" data-client-expert-id="'+row['client_expert_id']+'" data-clEx-user-id="'+row['clEx_user_id']+'" data-clEx-name="'+row['clEx_name']+'" data-clEx-profile="'+row['clEx_profile']+'" data-topic="'+row['topic_id']+'" data-topic-name="'+row['topic_name']+'" data-clEx-profile="'+row['clEx_profile']+'"><a class="chat-link chat-open current" href="javascript:void(0)"><div class="chat-media user-avatar"><img src="'+row['clEx_profile']+'" alt=""><span class="status dot dot-lg dot-success"></span></div><div class="chat-info"><div class="chat-from"><div id="pre-topic-'+row['topic_id']+'" class="name">'+row['topic_name']+'</div><span class="time">'+row['datetime']+'</span></div><div class="chat-context"><div class="text">'+row['clEx_name']+'</div><div class="status unread">'+str_unread+'</div></div></div></a></div><div class="chat-actions"><div class="dropdown"><a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-end"><ul class="link-list-opt no-bdr">';

        // Btnn Update/Delete
         str += '<li><a data-topic="'+row['topic_id']+'" class="update-topic" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#updateModalTopic"><span style="display:none">' + row['topic_name'] + '</span><span style="display:none">' + row['expert_id'] + '</span>Update Topic</a></li><li><a data-topic="'+row['topic_id']+'" class="delete-topic" href="javascript:void(0);">Delete Topic</a></li></ul></div></div></div></li>';

        return str;

    }

    //Update Topic
function updatetopic(element){

  var topic_id = element.attr('data-topic');
  var updateUrl = $('#updateUrl').val();

  $('#updateModalTopic').modal('hide');

  $.ajax({
    url: updateUrl,
    type: 'GET',
    data: {
      tid: topic_id,
      topic_name: $('#inputUpdtTopic').val(),
      expert_id: $('#up-exp-id').val(),
    },
    success: function (result) {
        console.log(result);
      $('#inputUpdtTopic').val(result);
      $('#pre-topic-'+topic_id).text(result);

      // if($('#a-topic').hasClass('active')){
      //       $('.lead-name').html(top_name);
      //       $('.sub-name').html(clEx_name);

      //   }

      $('.exp-topic-name').html(result);
    }
  });
}

    //Delete Topic
function deletetopic(element){

    var topic_id = element.data('topic');
    var deleteUrl = $('#deleteUrl').val();

  if(confirm('Are you sure to delete this topic? All related messages will also be deleted')){
    $.ajax({
      url: deleteUrl,
      type: 'GET',
      data: {
        tid: topic_id
      },
      success: function (result) {
        
            console.log('Delete Success');
            $('#topic-'+result).remove();
            // $('.btn-send-message').html('');
            // $('.btn-previous-message').html('');
            // $('#chat-box').html('');
            // $('.exp-topic-name').html('');

            // var x = document.getElementById('group-header');

            // if (x.style.display === 'block') {
            //   x.style.display = 'none';
            // }

            // var y = document.getElementById('group-msg');

            // if (y.style.display === 'block') {
            //   y.style.display = 'none';
            // }

            // var z = document.getElementById('scroll-msj');

            // if (z.style.display === 'block') {
            //   z.style.display = 'none';
            // }
      }
    });
  }

}

}

   NioApp.coms.docReady.push(NioApp.Chats);

})(NioApp, jQuery);