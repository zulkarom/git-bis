<?php

use yii\helpers\Url;
?>


<script>

$(document).ready(function(){
    getClientList($(this), true);
  });



function getTopic(element, init){



    var val = element.attr('data-client');
    var val2 = element.attr('data-clEx-name');
    var val3 = element.attr('data-expert-id');
    var val4 = element.attr('data-clEx-user-id');
    var val5 = element.attr('data-clEx-profile');
    var val6 = element.attr('data-client-expert-id');
    // console.log(val3);

    if(init){

      var x = document.getElementById('group-header');

      if (x.style.display === 'none') {
        x.style.display = 'block';
      }

      $('#current-topic').attr('data-client', val);
      $('#current-topic').attr('data-clEx-name', val2);
      $('#current-topic').attr('data-expert-id', val3);
      $('#current-topic').attr('data-clEx-user-id', val4);
      $('#current-topic').attr('data-clEx-profile', val5);
      $('#current-topic').attr('data-client-expert-id', val6);
    }

    var expStr ='';
    expStr = '<div class="media-list media-list-hover"><div class="media py-10 px-0 align-items-center"><a class="avatar avatar-lg status-success" href="#"><img src="'+val5+'" alt="..."></a><div class="media-body"><p class="font-size-16"><a class="hover-primary" href="#">'+val2+'</a><br/></p></div></div></div>';

    $('.exp-details').html(expStr);

    // $('.cl-name').html(val2);
    // $('.cl-profile').attr('src',element.data('client-profile'));

    $('.cl-name2').html(val2);
    $('.cl-profile2').attr('src',val5);

    $.ajax({
        url: '<?=Url::to(['/chatExpert/chat/get-topics'])?>',
        type: 'POST',
        data: {
          client_id: val, 
          expert_id: val3,
          client_expert_id : val6
        },
        success: function (result) {
          // console.log(result);
          if(result){
            var data = JSON.parse(result);
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

              dataStr = '<div class="media-list media-list-hover"><div id="topic-'+top_id+'" class="media py-10 px-0 align-items-center topic-chat" data-topic="'+top_id+'" data-topic-name="'+top_name+'" data-cl-id="'+val3+'" data-clEx-user-id="'+val4+'"><div class="media-body"><p class="font-size-16 test"><a class="hover-primary" href="#">' + top_name + '</a></p></div>';

               if(is_default == 1){
                  if(unread == 0){
                    str += dataStr+'</div></div>';
                    dft = 1;
                    tid = top_id;
                  }else{
                    str += dataStr+'<div class="media-right"><span class="badge badge-primary badge-pill">'+unread+'</span></div></div></div>';
                    dft = 1;
                    tid = top_id;
                  }
                }else{
                  if(unread == 0){
                    str += dataStr+'</div></div>';
                  }else{
                      str += dataStr+'<div class="media-right"><span class="badge badge-primary badge-pill">'+unread+'</span></div></div></div>';
                  }
                }
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
            
          }
        }
    });
    
}


</script>