
<?php

use yii\helpers\Url;
?>


<script>

function getTopic(element, init){

    var val = element.attr('data-client');
    var val2 = element.attr('data-clEx-name');
    var val3 = element.attr('data-expert-id');
    var val4 = element.attr('data-clEx-user-id');
    var val5 = element.attr('data-clEx-profile');
    var val6 = element.attr('data-client-expert-id');
    // console.log(val6);
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
    
      var expStr ='';
      expStr = '<div class="media-list media-list-hover"><div class="media py-10 px-0 align-items-center"><a class="avatar avatar-lg status-success" href="#"><img src="'+val5+'" alt=""></a><div class="media-body"><p class="font-size-16"><a class="hover-primary" href="#">'+val2+'</a><br/></p></div></div><div class="media py-10 px-0 align-items-center"><div class="media-body" align="center"><p class="font-size-16 new-topic"></p></div></div></div>';

      $('.exp-details').html(expStr);
    }

      // $('.exp-name').html(val2);
      // $('.exp-profile').attr('src',element.data('expert-profile'));

      $('.exp-name2').html(val2);
      $('.exp-profile2').attr('src',val5);
    
    

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


              dataStr = '<div class="media-list media-list-hover"><div id="topic-'+top_id+'" class="media py-10 px-0 align-items-center topic-chat" data-topic="'+top_id+'" data-topic-name="'+top_name+'" data-exp-id="'+val3+'" data-clEx-user-id="'+val4+'"><div class="media-body"><div class="row"><div class="col-10"><p class="font-size-16 test"><a id="pre-topic-'+top_id+'" class="hover-primary" href="#">' + top_name + '</a></p></div>';

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
              var topicStr = '<button id="btn-topic" type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTopicModalLong">Create Topic</button><div class="modal fade" id="createTopicModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Create Topic</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="form-row"><div class="form-group col-md-12"><label for="inputTopic">Topic</label><input type="text" class="form-control" id="inputTopic"></div></div><button id="submit-topic" type="submit" class="btn btn-primary" data-expert="'+val3+'" data-client="'+val+'" data-client-expert="'+val6+'" data-clEx-user-id="'+val4+'">Save</button></div></div></div>';

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

            str += '<div class="media-list media-list-hover"><div id="topic-'+row['topic_id']+'" class="media py-10 px-0 align-items-center topic-chat" data-topic="'+row['topic_id']+'" data-topic-name="'+row['topic_name']+'" data-exp-id="'+row['expert_id']+'" data-clEx-user-id="'+row['expert_user_id']+'"><div class="media-body"><div class="row"><div class="col-10"><p class="font-size-16 test"><a id="atopic-'+row['topic_id']+'" class="hover-primary" href="#">'+row['topic_name']+'</a></p></div><div class="col-2" align="right"><div class="dropdown"><a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp<span class="mdi mdi-dots-vertical"></span></a><div class="dropdown-content" aria-labelledby="dropdownMenuButton"><a data-topic="'+row['topic_id']+'" class="delete-topic dropdown-item" href="#">Delete</a><a class="update-topic dropdown-item" href="#" data-topic ="'+row['topic_id']+'"><span style="display:none">' +row['topic_name']+'</span>Update</a></div></div></div></div></div></div>';
            
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
            // $('.btn-send-message').html('');
            // $('.btn-previous-message').html('');
            // $('#chat-box').html('');
            // $('.exp-topic-name').html('');

            var x = document.getElementById('group-header');

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


// $('#load-message').click(function(){
//   loadchat(this,true);
// });


</script>
