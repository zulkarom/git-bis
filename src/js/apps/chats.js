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
            if(NioApp.Win.width >= info_break){
                profile_show();
            } else {
                profile_hide();
            }
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
                      const value = data[index].value;
                      const is_default = data[index].is_default;

                      if(unread == 0){


                        str +='<li class="chat-item"><div class="send-topic" data-client="'+client_id+'" data-expert-id="'+expert_id+'" data-client-expert-id="'+client_expert_id+'" data-clEx-user-id="'+clEx_user_id+'" data-clEx-name="'+clEx_name+'" data-clEx-profile="'+clEx_profile+'" data-topic="'+topic_id+'" data-clEx-profile="'+clEx_profile+'"><a class="chat-link chat-open current" href="javascript:void(0)"><div class="chat-media user-avatar"><img src="'+clEx_profile+'" alt=""><span class="status dot dot-lg dot-gray"></span></div><div class="chat-info"><div class="chat-from"><div class="name">'+clEx_name+'</div><span class="time">Now</span></div><div class="chat-context"><div class="text">'+clEx_expertise+'</div><div class="status delivered"><em class="icon ni ni-check-circle-fill"></em></div></div></div></a></div><div class="chat-actions"><div class="dropdown"><a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-end"><ul class="link-list-opt no-bdr"><li><a href="#">Mute Conversion</a></li><li><a href="#">Hide Conversion</a></li><li><a href="#">Delete Conversion</a></li><li class="divider"></li><li><a href="#">Mark as Unread</a></li><li><a href="#">Ignore Messages</a></li><li><a href="#">Block Messages</a></li></ul></div></div></div></li>';

                       
                      }else{

                        str +='<li class="chat-item"><a class="chat-link chat-open current" href="javascript:void(0)"><div class="chat-media user-avatar send-topic" data-client="'+client_id+'" data-expert-id="'+expert_id+'" data-client-expert-id="'+client_expert_id+'" data-clEx-user-id="'+clEx_user_id+'" data-clEx-name="'+clEx_name+'" data-clEx-profile="'+clEx_profile+'"><img src="'+clEx_profile+'" alt=""><span class="status dot dot-lg dot-gray"></span></div><div class="chat-info"><div class="chat-from"><div class="name">'+clEx_name+'</div><span class="time">Now</span></div><div class="chat-context"><div class="text">'+clEx_expertise+'</div><div class="status delivered"><em class="icon ni ni-check-circle-fill"></em></div></div></div></a><div class="chat-actions"><div class="dropdown"><a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-end"><ul class="link-list-opt no-bdr"><li><a href="#">Mute Conversion</a></li><li><a href="#">Hide Conversion</a></li><li><a href="#">Delete Conversion</a></li><li class="divider"></li><li><a href="#">Mark as Unread</a></li><li><a href="#">Ignore Messages</a></li><li><a href="#">Block Messages</a></li></ul></div></div></div></li>';
                      }
                    }
                    $('.list-expert').html(str);                      
                  }

                  $('.send-topic').click(function(){

                    getTargetChat($(this), true);

                  });

                }
            });

        }

        getUserList($(this), true);

    


    function getTargetChat(element, init){
        var expert_id = element.attr('data-expert-id');
        var topic_id = element.attr('data-topic');
        // var top_name = element.attr('data-topic-name');
        var user_id = $('#own_id').val();
        var clEx_user_id = element.attr('data-clEx-user-id');
        var clEx_name = element.attr('data-clEx-name');
        var clEx_profile = element.attr('data-clEx-profile');

        // alert(topic_id);
            
          if(topic_id){

            if(init){

            var x = document.getElementById('group-header');
            // var y = document.getElementsByClassName('nk-chat-aside');


            if (x.style.display === 'none') {
              x.style.display = 'block';
            }

            // y.className += 'hide-aside';
            x.className += ' show-chat';

            $('.exp-name').html(clEx_name);
            $('.exp-profile').attr('src',clEx_profile);

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

                  
                    for (var key in data) {
                      var row = data[key];
                      // alert(row['message']);
                      // top_name = row['topic_name'];
                      chatstr += messageBox(row);
                    }

                    // console.log(chatstr);

                    

                    var dataUrl = $('#dataUrl').val();

                    btnsendstr = '<div class="nk-chat-editor-upload  ms-n1"><a href="#" class="btn btn-sm btn-icon btn-trigger text-primary toggle-opt" data-target="chat-upload"><em class="icon ni ni-plus-circle-fill"></em></a><div class="chat-upload-option" data-content="chat-upload"><ul class=""><li><a href="#"><em class="icon ni ni-img-fill"></em></a></li><li><a href="#"><em class="icon ni ni-camera-fill"></em></a></li><li><a href="#"><em class="icon ni ni-mic"></em></a></li><li><a href="#"><em class="icon ni ni-grid-sq"></em></a></li></ul></div></div><div class="nk-chat-editor-form"><div class="form-control-wrap"><textarea id="chat-message" class="form-control form-control-simple no-resize" rows="1" id="default-textarea" placeholder="Type your message..."></textarea></div></div><ul class="nk-chat-editor-tools g-2"><li><a href="#" class="btn btn-sm btn-icon btn-trigger text-primary"><em class="icon ni ni-happyf-fill"></em></a></li><li><button type="submit" class="btn btn-round btn-primary btn-icon" id="send-message" data-url="'+dataUrl+'" data-id="'+user_id+'" data-recipient="'+clEx_user_id+'" data-topic="'+topic_id+'"><em class="icon ni ni-send-alt"></em></button></li></ul>';

                   /* btnsendstr = '<input class="form-control b-0 py-10" type="text" id="chat-message" placeholder="Say something..."><div class="d-flex justify-content-between align-items-center "><button type="button" class="waves-effect waves-circle btn btn-circle mr-10 btn-outline-primary"><i class="mdi mdi-link"></i></button><button type="button" class="waves-effect waves-circle btn btn-circle btn-primary" type="submit" id="send-message" data-url="'+dataUrl+'" data-id="'+user_id+'" data-recipient="'+clEx_user_id+'" data-topic="'+topic_id+'"><i class="mdi mdi-send"></i></button></div>';*/

                    $('.btn-send-message').html(btnsendstr);
                    $('#chat-box').html(chatstr);

                    $('#send-message').click(function(){
                      if($('#chat-message').val()){
                        sendchat(true);
                      }
                    });

                  /*if(init){

                    var dataUrl = '';
                    var loadUrl = '<?=Url::to(['/chat/default/load-message'])?>';

                    if('<?=Yii::$app->user->identity->role?>' == 1){
                      dataUrl = '<?=Url::to(['/chat/default/send-message'])?>';
                      
                        
                    }else {
                      dataUrl = '<?=Url::to(['/chatExpert/default/send-message'])?>';
                      
                    }
                                 

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

                  $('.exp-topic-name').html(top_name);    */

              }


          });
        }
    }

    function messageBox(row){
      var client = '';
      var role = '';
      
      var read = '';
      // console.log(read);

      const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June",
          "July", "Aug", "Sep", "Oct", "Nov", "Dec"];

      var dateData = new Date(row['time'] * 1000);
      var date = ((dateData.getDate() < 10)?'0':'') + dateData.getDate() +' '+(monthNames[dateData.getMonth()]) + ', '+ dateData.getFullYear();
      var time = ((dateData.getHours() < 10)?'0':'') + dateData.getHours() +':'+ ((dateData.getMinutes() < 10)?'0':'') + dateData.getMinutes() + ' ' +(dateData.getHours() >= 12 ? 'PM' : 'AM');
      var dd = date + '  ' + time;

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

      if(client){

        str = '<div id="msg-'+row['chat_id']+'" class="chat is-me"><div class="chat-content"><div class="chat-bubbles"><div class="chat-bubble"><div class="chat-msg"><p class="card-msg" id="'+row['chat_id']+'">' + row['message']  + '</p></div><ul class="chat-msg-more"><li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li><li><div class="dropdown"><a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-sm"><ul class="link-list-opt no-bdr"><li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li><li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li><li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li></ul></div></div></li></ul></div></div><ul class="chat-meta"><li>'+time+'</li></ul></div></div>';

          /*str = '<div id="msg-'+row['chat_id']+'" class="chat is-me"><div class="chat-content"><div class="chat-bubbles"><div class="chat-bubble"><div class="chat-msg">' + row['message']  + '</div><ul class="chat-msg-more"><li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li><li><div class="dropdown"><a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-sm"><ul class="link-list-opt no-bdr"><li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li><li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li><li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li></ul></div></div></li></ul></div></div><ul class="chat-meta"><li>' + row['sender_name']  + '</li><li>'+dd+'</li></ul></div></div>';*/

          
          return str;

      }else{ 

          str = '<div id="msg-'+row['chat_id']+'" class="chat is-you"><div class="chat-avatar"><div class="user-avatar"><img src="'+ url2 +'" alt="" class="exp-profile"></div></div><div class="chat-content"><div class="chat-bubbles"><div class="chat-bubble"><div class="chat-msg"><p class="card-msg" id="'+row['chat_id']+'">' + row['message']  + '</p></div><ul class="chat-msg-more"><li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li><li><div class="dropdown"><a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-end"><ul class="link-list-opt no-bdr"><li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li><li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li><li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li></ul></div></div></li></ul></div></div><ul class="chat-meta"><li>'+time+'</li></ul></div></div>';

          /*str = '<div id="msg-'+row['chat_id']+'" class="chat is-you"><div class="chat-avatar"><div class="user-avatar"><img src="'+ url2 +'" alt=""></div></div><div class="chat-content"><div class="chat-bubbles"><div class="chat-bubble"><div class="chat-msg"><p id="'+row['chat_id']+'">' + row['message']  + '</p></div><ul class="chat-msg-more"><li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li><li><div class="dropdown"><a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-end"><ul class="link-list-opt no-bdr"><li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li><li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li><li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li></ul></div></div></li></ul></div><div class="chat-bubble"><div class="chat-msg"> I found an issues when try to purchase the product. </div><ul class="chat-msg-more"><li class="d-none d-sm-block"><a href="#" class="btn btn-icon btn-sm btn-trigger"><em class="icon ni ni-reply-fill"></em></a></li><li><div class="dropdown"><a href="#" class="btn btn-icon btn-sm btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-end"><ul class="link-list-opt no-bdr"><li class="d-sm-none"><a href="#"><em class="icon ni ni-reply-fill"></em> Reply</a></li><li><a href="#"><em class="icon ni ni-pen-alt-fill"></em> Edit</a></li><li><a href="#"><em class="icon ni ni-trash-fill"></em> Remove</a></li></ul></div></div></li></ul></div></div><ul class="chat-meta"><li>' + row['sender_name']  + '</li><li>'+dd+'</li></ul></div></div>';*/


          
          return str;
      }
    }

    //Send Chat
function sendchat(sendMessage) {

  var last = $('#chat-box .card-msg').last().attr('id');
  /*alert(last);*/
  
    $.ajax({
        url: $('#send-message').data('url'),
        type: 'GET',
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

setInterval(function () { 
  
  // sendchat($('#current-chat-box'), false);
  // getTopic($('#current-topic'), false);
  getTargetChat($('#current-chat-box'), false);
  /*refreshchat($('#current-chat-box'), false);
  getUserList($('#current-expert'), false);*/
  }, 5000 );
}

   NioApp.coms.docReady.push(NioApp.Chats);

})(NioApp, jQuery);