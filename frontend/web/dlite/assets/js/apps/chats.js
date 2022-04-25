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

    };


    function getTargetChat(element, init){

    var expert_id = element.attr('data-expert-id');
    var topic_id = element.attr('data-topic');
    // var top_name = element.attr('data-topic-name');
    var user_id = '<?=Yii::$app->user->identity->id?>';
    var clEx_user_id = element.attr('data-clEx-user-id');
    var clEx_name = element.attr('data-clEx-name');
    var clEx_profile = element.attr('data-clEx-profile');
    alert(clEx_profile);

      if(topic_id){

        var x = document.getElementById('group-header');

        if (x.style.display === 'none') {
          x.style.display = 'block';
        }

        $('.exp-name').html(clEx_name);
        $('.exp-profile').attr('src',clEx_profile);
      /*if(init){

        var x = document.getElementById('group-msg');

        if (x.style.display === 'none') {
          x.style.display = 'block';
        }

        // $('.exp-topic-name').html(top_name);

        $('#current-chat-box').attr('data-exp-id', expert_id);
        $('#current-chat-box').attr('data-topic', topic_id);
        $('#current-chat-box').attr('data-topic-name', top_name);
        $('#current-chat-box').attr('data-clEx-user-id', clEx_user_id);
      }
*/
      var chatUrl = $('#chatUrl').val();
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

            console.log(data);
            var chatstr = '';
            var btnsendstr ='';
            var btnprevstr ='';
            // var top_name = '';

              
                for (var key in data) {
                  var row = data[key];
                  alert(row['message']);
                  // top_name = row['topic_name'];
                  // if(init){
                  //   chatstr += messageBox(row);
                  // }
                }

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


   NioApp.coms.docReady.push(NioApp.Chats);

})(NioApp, jQuery);