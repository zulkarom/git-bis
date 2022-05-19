!(function (NioApp, $) {
    "use strict";

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

}

   NioApp.coms.docReady.push(NioApp.Chats);

})(NioApp, jQuery);