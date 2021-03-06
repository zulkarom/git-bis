!(function (NioApp, $) {
    "use strict";

    var $win = $(window), $body = $('body'), breaks = NioApp.Break;

    // Chats Variable
    var $toggle          = $('.chat-profile-toggle'),
        $chat_profile    = $('.nk-chat-profile'), 
        $chat_body       = $('.nk-chat-body'), 
        $chat_aside      = $('.nk-chat-aside'), 
        $chat_open       = $('.chat-open'),
        $chat_hide       = $('.nk-chat-hide'),
        $search_toggle   = $('.chat-search-toggle'),
        $chat_search     = $('.nk-chat-head-search'),
        role             = $('#role'),

        olay_profile     = 'nk-chat-profile-overlay',
        shown_profile    = 'profile-shown',
        hideau_profile   = 'chat-profile-autohide',
        hide_aside       = 'hide-aside',
        show_chat        = 'show-chat',
        info_break       = ($body.hasClass('has-apps-sidebar')) ? 1200 : breaks.xxl,
        flat_break       = breaks.lg;

    NioApp.Chats = function(){
        
        function chat_autohide () {
            if(NioApp.Win.width >= flat_break){
                if(!$body.hasClass(hideau_profile)) $body.addClass(hideau_profile);
            } else {
                if($body.hasClass(hideau_profile)) $body.removeClass(hideau_profile);
            }
        }

        function profile_show (inbody) {
                $toggle.addClass('active');
                $chat_profile.addClass('visible');
                $chat_body.addClass(shown_profile); 
                if(inbody===true) $body.addClass('chat-'+shown_profile);
        }

        function profile_hide (inbody) {
            $toggle.removeClass('active');
            $chat_profile.removeClass('visible');
            $chat_body.removeClass(shown_profile);
            if(inbody===true) $body.removeClass('chat-'+shown_profile);
        }
        

        function profile_overlay(){
            var overlay = '.' + olay_profile;
            if(NioApp.Win.width < info_break && $chat_profile.hasClass('visible') ){
                !$chat_profile.next().hasClass(olay_profile) ? $chat_profile.after('<div class="'+ olay_profile +'"></div>') : null;
            }else{
                $(overlay).remove(); 
            }
            $(overlay).on('click', function(){
                $(this).remove(); 
                profile_hide(true);
                chat_autohide();
            })
        }
        

        function search_show(){
            $search_toggle.on('click', function(e){
                if(NioApp.Win.width <= info_break){
                    profile_hide ();
                    profile_overlay();
                }
                $chat_search.addClass('show-search');
                e.preventDefault();
            });
        }
        search_show();

        function search_hide(){
            $(document).on('mouseup', function(e){
                if (!$chat_search.is(e.target) && $chat_search.has(e.target).length===0 && !$chat_search.find('.form-control').val()  ) {
                    $chat_search.removeClass('show-search');
                }
            });
        }
        search_hide();

        function chat_show () {
            $chat_open.on('click', function(e){
                $chat_open.parent().removeClass('current');
                $chat_aside.addClass(hide_aside);
                $chat_body.addClass(show_chat);
                
                $(this).parent().addClass('current');
                e.preventDefault();
            });
        }
        chat_show();

        function chat_hide () {
            $chat_hide.on('click', function(){
                $chat_aside.removeClass(hide_aside);
                $chat_body.removeClass(show_chat);
            });
        }
        chat_hide();

        function profile_trigger () {       
            $toggle.on('click', function(e){
                $toggle.toggleClass('active');
                $chat_profile.toggleClass('visible');
                $chat_body.toggleClass(shown_profile);

                if($(this).hasClass('active') && !$body.hasClass('chat-'+shown_profile)) {
                    $body.addClass('chat-'+shown_profile);
                } else {
                    $body.removeClass('chat-'+shown_profile);
                }

                if(NioApp.Win.width >= flat_break) {
                    if($body.hasClass(hideau_profile)) {
                        $body.removeClass(hideau_profile);
                    } else if(NioApp.Win.width < info_break && !$(this).hasClass('active')) {
                        $body.addClass(hideau_profile);
                    }
                }

                profile_overlay(); e.preventDefault();
            });
        }
        profile_trigger();
        
        function chat_on_init () {
            /*if(NioApp.Win.width >= info_break){
                profile_show();
            } else {
                profile_hide();
            }*/
            profile_hide();
            chat_autohide();
        }
        chat_on_init();
        
        function chat_on_resize () {
            if($body.hasClass(hideau_profile)){
                if(NioApp.Win.width >= info_break) {
                    profile_show();
                } else {
                    profile_hide();
                }
            }
            if(NioApp.Win.width >= flat_break && NioApp.Win.width < info_break) {
                if($body.hasClass('chat-'+shown_profile)) {
                    $body.removeClass('chat-'+shown_profile);
                    profile_hide();
                }
            }
        }

        $win.on('resize', function(){
            chat_on_resize();
            profile_overlay();
        });


        function getUserList(element, init){

            /*if(init){
                $('#modalSpinner').modal({backdrop: 'static', keyboard: false})  
                $('#modalSpinner').modal('show');
            }*/


          var userUrl = $('#userUrl').val();
          

            $.ajax({
                url: userUrl,
                type: 'GET',
                data: {},
                success: function (result) {

                  // console.log(result);

                  if(result){
                    var data = JSON.parse(result);

                    // console.log(data);
                    
                    var str = '';
                    var str_unread = '';
                    var type;

                    for (let index = 0; index < data.length; ++index) {
                      const client_id = data[index].client_id;
                      const expert_id = data[index].expert_id;
                      const client_expert_id = data[index].client_expert_id;
                      const clEx_user_id = data[index].clEx_user_id;
                      const clEx_name = data[index].clEx_name;
                      const clEx_profile = data[index].clEx_profile;
                      const clEx_company = data[index].clEx_company;
                      const clEx_company_detail = data[index].clEx_company_detail;

                      const clEx_company_type = data[index].clEx_company_type;
                      const clEx_company_address = data[index].clEx_company_address;

                      const clEx_expertise = data[index].clEx_expertise;
                      const unread = data[index].unread;
                      const topic_id = data[index].id;
                      const value = data[index].value;
                      const is_default = data[index].is_default;
                      const datetime = data[index].datetime;


                      if(unread != 0){
                        str_unread = '<em class="icon ni ni-bullet-fill"></em>';
                      }

                      if($('#role').val() == 1){
                            type = clEx_expertise;
                      }else{
                            type = clEx_company;
                      }

                      str +='<li class="chat-item"><div class="send-topic" data-client="'+client_id+'" data-expert-id="'+expert_id+'" data-client-expert-id="'+client_expert_id+'" data-clEx-user-id="'+clEx_user_id+'" data-clEx-name="'+clEx_name+'" data-clEx-profile="'+clEx_profile+'" data-clEx-company="'+clEx_company+'" data-clEx-company-detail="'+clEx_company_detail+'" data-clEx-company-type="'+clEx_company_type+'" data-clEx-company-address="'+clEx_company_address+'" data-topic="'+topic_id+'" data-clEx-profile="'+clEx_profile+'" data-clEx-expertise="'+clEx_expertise+'"><a class="chat-link chat-open current" href="javascript:void(0)"><div class="chat-media user-avatar"><img src="'+clEx_profile+'" alt=""><span class="status dot dot-lg dot-success"></span></div><div class="chat-info"><div class="chat-from"><div class="name">'+clEx_name+'</div><span class="time">'+datetime+'</span></div><div class="chat-context"><div class="text">'+type+'</div><div class="status unread">'+str_unread+'</div></div></div></a></div></li>';


                    }
                    $('.list-expert').html(str);                      
                  }



                  /*if($('#modalSpinner').modal('hide')){
                    
                  }*/
                  

                    
                  $('.send-topic').click(function(){
                    chatBoxLoading();
                    getTargetChat($(this), true);
                    getCanvas($(this), true);

                  });

                  $('.a-topic').click(function(){

                    $('#a-topic').addClass('active');

                    $('#a-expert').removeClass('active');

                    // $('#panel-topic').addClass('active');
                    // $('#panel-expert').removeClass('active');

                    // getTopic($(this), true);

                  });


                }
            });

        }

        getUserList($(this), true);

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

                if($('#role').val() == 1){
                    if(init){
                      var topicStr = '<button id="btn-topic" class="btn btn-lg btn-icon btn-outline-light btn-white btn-round" data-bs-toggle="modal" data-bs-target="#modalDefault"><em class="icon ni ni-plus"></em></button>';

                      $('.new-topic').html(topicStr);

                       $('#submit-topic').click(function(){

                          createtopic(this,true);
                      });
                   }
                }

                  $('.send-topic').click(function(){

                    getTargetChat($(this), true);

                  });

                  $('.delete-topic').click(function(){
                        deletetopic($(this));
                    });

                  $( '.update-topic').click(function(){

                        var topName = $(this).children().text();
                        // alert(topName);
                        // var expName = $(this).children().eq(1).text();
                        var topic_id = $(this).attr('data-topic');
                        $('#inputUpdtTopic').val(topName);
                        // $('#up-exp-id').val(expName);
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
                  //console.log(data);
                  var str = '';
                  var str_unread = '';

                  for (var key in data) {
                    var row = data[key];
                    var element_id = row['topic_id'];
                    // console.log(row);

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
                        // var expName = $(this).children().eq(1).text();
                        var topic_id = $(this).attr('data-topic');
                        $('#inputUpdtTopic').val(topName);
                        // $('#up-exp-id').val(expName);
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

    function html_list_topic(row, unread){

        var str_unread ='';
        var str;
        if(unread != 0){
            str_unread = '<em class="icon ni ni-bullet-fill"></em>';
          }

        
        str ='<li class="chat-item" id="topic-'+row['topic_id']+'"><div class="send-topic" data-client="'+row['client_id']+'" data-expert-id="'+row['expert_id']+'" data-client-expert-id="'+row['client_expert_id']+'" data-clEx-user-id="'+row['clEx_user_id']+'" data-clEx-name="'+row['clEx_name']+'" data-clEx-profile="'+row['clEx_profile']+'" data-topic="'+row['topic_id']+'" data-topic-name="'+row['topic_name']+'" data-clEx-profile="'+row['clEx_profile']+'"><a class="chat-link chat-open current" href="javascript:void(0)"><div class="chat-media user-avatar"><img src="'+row['clEx_profile']+'" alt=""><span class="status dot dot-lg dot-success"></span></div><div class="chat-info"><div class="chat-from"><div id="pre-topic-'+row['topic_id']+'" class="name">'+row['topic_name']+'</div><span class="time">'+row['datetime']+'</span></div><div class="chat-context"><div class="text">'+row['clEx_name']+'</div><div class="status unread">'+str_unread+'</div></div></div></a></div>';

        if($('#role').val() == 1){
            // Btnn Update/Delete
         str += '<div class="chat-actions"><div class="dropdown"><a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-end"><ul class="link-list-opt no-bdr"><li><a data-topic="'+row['topic_id']+'" class="update-topic" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#updateModalTopic"><span style="display:none">' + row['topic_name'] + '</span>Update Topic</a></li><li><a data-topic="'+row['topic_id']+'" class="delete-topic" href="javascript:void(0);">Delete Topic</a></li></ul></div></div></div>';

        }
        
         str +='</li>';

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
      // expert_id: $('#up-exp-id').val(),
    },
    success: function (result) {
        //console.log(result);
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

    /*alert(topic_id);*/

  if(confirm('Are you sure to delete this topic? All related messages will also be deleted')){
    $.ajax({
      url: deleteUrl,
      type: 'GET',
      data: {
        tid: topic_id
      },
      success: function (result) {
        
           // console.log('Delete Success');
            $('#topic-'+result).remove();
            // $('#btn-send-message').remove();
            $('.btn-send-message').html('');
            $('.lead-name').html('');
            $('.sub-name').html('');
            $('.company-name').html('');
            $('.company-detail').html('');
            $('.exp-profile').attr('src', '');
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

    
    function chatBoxLoading(){
        $('.chat-box').html('<div align="center">Loading...</div>');
    }

    function getTargetChat(element, init){
        
        /*var y = document.getElementById('group-header');
        if (y.style.display === 'none') {
            y.style.display = 'block';
        }*/
        
        var expert_id = element.attr('data-expert-id');
        var topic_id = element.attr('data-topic');
        var top_name = element.attr('data-topic-name');
        var user_id = $('#own_id').val();
        var clEx_user_id = element.attr('data-clEx-user-id');
        var clEx_name = element.attr('data-clEx-name');
        var clEx_profile = element.attr('data-clEx-profile');
        var clEx_company = element.attr('data-clEx-company');
        var clEx_company_detail = element.attr('data-clEx-company-detail');
        var clEx_company_type = element.attr('data-clEx-company-type');
        var clEx_company_address = element.attr('data-clEx-company-address');
        var clEx_expertise = element.attr('data-clEx-expertise');
            
          if(topic_id){

            if(init){

            var x = document.getElementById('group-header');
            // var y = document.getElementsByClassName('nk-chat-aside');
            $(".welcome").hide();
            $(".nk-chat-head").show();
            $('.nk-chat-profile').show();
            if(NioApp.Win.width >= info_break){
                profile_show();
            } else {
                profile_hide();
            }


            // y.className += 'hide-aside';
            x.className += ' show-chat';

            if($('#a-topic').hasClass('active')){
                $('.lead-name').html(top_name);
                $('.sub-name').html(clEx_name);

            }else if($('#a-expert').hasClass('active')){

                $('.lead-name').html(clEx_name);
                if($('#role').val() == 1){
                    $('.sub-name').html(clEx_expertise);
                }else{
                    $('.sub-name').html(clEx_company);
                }
            }
            
            $('.exp-profile').attr('src',clEx_profile);
            $('.company-name').html(clEx_company);
            $('.company-type').html(clEx_company_type);
            $('.company-address').html(clEx_company_address);
            $('.company-detail').html(clEx_company_detail);

          /*if(init){

            var x = document.getElementById('group-msg');

            if (x.style.display === 'none') {
              x.style.display = 'block';
            }

            x.className += ' show-chat';*/

            // $('.exp-topic-name').html(top_name);

            $('#current-chat-box').attr('data-exp-id', expert_id);
            $('#current-chat-box').attr('data-topic', topic_id);
            // $('#current-chat-box').attr('data-topic-name', top_name);
            $('#current-chat-box').attr('data-clEx-user-id', clEx_user_id);
          }
    
          var chatUrl = $('#chatUrl').val();
          $.ajax({
              url: chatUrl,
              type: 'GET',
              data: {
                id: expert_id, 
                tid: topic_id,
                ex_user_id: clEx_user_id
              },
              success: function (result) {

                var data = JSON.parse(result);

                // console.log(data);
                var chatstr = '';
                var btnsendstr ='';
                var btnprevstr ='';
                // var top_name = '';
                var prev_date;
                  
                    for (var key in data) {
                      var row = data[key];
                     
                      
                      // top_name = row['topic_name'];

                      chatstr += messageBox(row,prev_date);
                      prev_date = row['date'];
                    }

                    // console.log(chatstr);

                    
                    if(init){
                    
                    var dataUrl = $('#dataUrl').val();
                    var loadUrl = $('#loadUrl').val();

                    btnsendstr = '<div class="nk-chat-editor-form"><div class="form-control-wrap"><textarea id="chat-message" class="form-control form-control-simple no-resize" rows="1" id="default-textarea" placeholder="Type your message..."></textarea></div></div><ul class="nk-chat-editor-tools g-2"><li><button type="submit" class="btn btn-round btn-primary btn-icon" id="send-message" data-url="'+dataUrl+'" data-id="'+user_id+'" data-recipient="'+clEx_user_id+'" data-topic="'+topic_id+'"><em class="icon ni ni-send-alt"></em></button></li></ul>';


                   btnprevstr = '<button type="button" type="submit" id="load-message" class="btn btn-rounded btn-secondary-outline" data-url="'+loadUrl+'" data-id="'+user_id+'" data-recipient="'+clEx_user_id+'" data-topic="'+topic_id+'">Load Previous</button>';
                    
                    $('.btn-send-message').html(btnsendstr);
                    $('.btn-previous-message').html(btnprevstr);
                    $('#chat-box').html(chatstr);

                    if(init){
                        $('#send-message').click(function(){
                          if($('#chat-message').val()){
                            sendchat(true);
                          }
                        });
                        $('#chat-message').keypress(function(event){
                          var keycode = (event.keyCode ? event.keyCode : event.which);
                          if(keycode == '13'){
                            if($('#chat-message').val().trim()){
                            sendchat(true);
                          } 
                          return false;
                          }
                        });
                    }

                    $('#load-message').click(function(){

                        loadchat(this,true);
                    });

                    $('.delete-msg').click(function(){

                        deletemessage($(this));
                    });

                    scrollTop();
                }

              }


          });
        }
    }

    function getCanvas(element, init){
        if(role.val() == 2){
        var clEx_user_id = element.attr('data-clEx-user-id');
            
          var canvasUrl = $('#canvasUrl').val();
          
          $.ajax({
              url: canvasUrl,
              type: 'GET',
              data: {
                cl_user_id: clEx_user_id
              },
              success: function (result) {

                var data = JSON.parse(result);
                var str = '';

                for (let index = 0; index < data.length; ++index) {
                      const id = data[index].id;
                      const title = data[index].title;
                      const description = data[index].description;

                      var canvasLinkUrl = $('#canvasLinkUrl').val() + id;

                    
                      str += '<li><a class="chat-option-link" href="'+canvasLinkUrl+'" target="_blank"><div class="row"><div class="col-2"><em class="icon icon-circle bg-light ni ni-circle-fill"></em></div><div class="col-10"><span class="lead-text">'+title+'</span><span class="sub-text">'+description+'</span></div></div></a></li>';

                }

                $('.biz-canvas').html(str);


            }

        });
    
}
        
    }



    function messageBox(row,prev_date){
      var client = '';
      var role = '';
      
      var read = '';
      // console.log(read);

   
      

      if(row['sender_id'] == $('#own_id').val()){
          client = true;
          role = 'profile';
          
      }else{
          client = false;
          role = 'expert';
      }

      var sender_id = row['sender_id'];
      var url = $('#url').val() + sender_id;
      var url2 = $('#url2').val() + sender_id;
      var str ='';

      if( prev_date != (row['date'])){

        str += '<div class="chat-sap"><div class="chat-sap-meta"><span>'+row['date']+'</span></div></div>';
      }
      

      if(client){
        str += '<div id="msg-'+row['chat_id']+'" class="chat is-me"><div class="chat-content"><div class="chat-bubbles"><div class="chat-bubble"><div class="chat-msg"><p class="card-msg" id="'+row['chat_id']+'">' + row['message']  + '</p></div><ul class="chat-msg-more"><li><div class="dropdown"><a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-sm"><ul class="link-list-opt no-bdr"><li><a data-chat="'+row['chat_id']+'" class="delete-msg" href="javascript:void(0);"><em class="icon ni ni-trash-fill"></em> Remove</a></li></ul></div></div></li></ul></div></div><ul class="chat-meta"><li><span id="time-'+row['chat_id']+'">'+row['time']+'</span></li></ul></div></div>';
          
          return str;

      }else{ 

          str += '<div id="msg-'+row['chat_id']+'" class="chat is-you"><div class="chat-avatar"><div class="user-avatar"><img src="'+ url2 +'" alt="" class="exp-profile"></div></div><div class="chat-content"><div class="chat-bubbles"><div class="chat-bubble"><div class="chat-msg"><p class="card-msg" id="'+row['chat_id']+'">' + row['message']  + '</p></div></div></div><ul class="chat-meta"><li><span id="time-'+row['chat_id']+'">'+row['time']+'</span></li></ul></div></div>';
          
          return str;
      }
    }


function scrollTop(){
    $(".nk-chat-panel .simplebar-content-wrapper").scrollTop($(".nk-chat-panel .simplebar-content-wrapper").prop("scrollHeight"));
}

function chatloading(text){
  var last = $('#chat-box .card-msg').last().attr('id');
    $('#chat-box').append('<div class="chat is-me loading-msg-text"><div class="chat-content"><div class="chat-bubbles"><div class="chat-bubble"><div class="chat-msg" id="'+last+'" style="background-color:#ffffff;color:#000000">'+text+'</div></div><ul class="chat-meta"><li>Sending...</li></ul></div></div></div>');
}

function sendchat(sendMessage) {

    var last = $('#chat-box .card-msg').last().attr('id');
    /*alert(last);*/
    var msg = $('#chat-message').val();

    $('#chat-message').focus();
    $('#chat-message').val('');

    chatloading(msg);
    scrollTop();

    $.ajax({
        url: $('#send-message').data('url'),
        type: 'GET',
        data: {
            'sendMessage':sendMessage,
            'ChatModel[sender_id]': $('#send-message').data('id'),
            'ChatModel[recipient_id]': $('#send-message').data('recipient'),
            'ChatModel[topic_id]': $('#send-message').data('topic'),
            'ChatModel[last_message_id]': last,
            'ChatModel[message]': msg
        },
        success: function (data) {


          /*if(data){
            var data = JSON.parse(data);

            console.log(data);
            var chatstr = '';

              for (var key in data) {
                var row = data[key];
                // console.log(row);
                chatstr += messageBox(row);
              }

            // if(sendMessage){
            //   $('#chat-message').val('');
            // }

            

            $('#chat-box').append(chatstr);

            $('.delete-msg').click(function(){

                deletemessage($(this));
            });
          }

          if(sendMessage){
            scrollTop();
          }*/
          
          
          
        }
    });
}

//Load Previous Chat
function loadchat(button,loadMessage) {

    var first = $('#chat-box .card-msg').first().attr('id');
    // alert(first);

    $.ajax({
        url: $('#load-message').data('url'),
        type: 'GET',
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
          var prev_date;
                  
            for (var key in data) {
              var row = data[key];
              chatstr += messageBox(row,prev_date);
              prev_date = row['date'];
            }

          $('#chat-box').prepend(chatstr);

          $('.delete-msg').click(function(){

              deletemessage($(this));
          });
        }
    });  
}

// Delete Message
function deletemessage(element){

  var chat_id = element.data('chat');
  

  var deleteMsgUrl = $('#deleteMsgUrl').val();
  // var last = $('#chat-box .card-msg').last().attr('id');
  $('#time-'+chat_id).html('Deleting...');
  // alert($('#time-'+chat_id).text());

  /*alert(chat_id);*/

  $.ajax({
      url: deleteMsgUrl,
      type: 'GET',
      data: {
        cid: chat_id
      },
      success: function (result) {
       // console.log('Delete Success');
        $('#msg-'+result).empty();
        $('#msg-'+result).remove();
        
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


  if(topic_id){

    if(refreshMessage){
      $('#current-chat-box').attr('data-id', sender_id);
      $('#current-chat-box').attr('data-recipient', recipient_id);
      $('#current-chat-box').attr('data-topic', topic_id);
    }

  
    
    $.ajax({
        url: $('#refreshUrl').val(),
        type: 'GET',
        data: {
            'refreshMessage':refreshMessage,
            'ChatModel[sender_id]': sender_id,
            'ChatModel[recipient_id]': recipient_id,
            'ChatModel[topic_id]': topic_id,
            'ChatModel[last_message_id]': last,
        },
        success: function (data) {

          if (data) {

            if(data == "topic_deleted"){

               /* var x = document.getElementById('group-header');

                if (x.style.display === 'block') {
                  x.style.display = 'none';
                }

                var y = document.getElementById('group-msg');

                if (y.style.display === 'block') {
                  y.style.display = 'none';
                }

                var z = document.getElementById('scroll-msj');

                if (z.style.display === 'block') {
                  z.style.display = 'none';
                }*/
            
                // $('#group-header').hide();
                // $('#group-msg').hide();
                // $('.chat-box-one').hide();

            }else{

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
              $('.loading-msg-text').remove();
              $('#chat-box').append(chatstr);

              if(i == 1){
                scrollTop();
              }
            }
            $('.delete-msg').click(function(){

                deletemessage($(this));
            });
            
          }

          
                   
        }
    });
  }
}


setInterval(function(){
  
  getTopic($('#current-topic'), false);
  // getTargetChat($('#current-chat-box'), false);
  refreshchat($('#current-chat-box'), false);
  getUserList($('#current-expert'), false);
}, 5000);
  
  
}

NioApp.coms.docReady.push(NioApp.Chats);

})(NioApp, jQuery);