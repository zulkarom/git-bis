<?php
use backend\assets\ChatAsset;
use yii\helpers\Url;
ChatAsset::register($this); 


// $this->title = 'Consultation Chat';
// $this->params['breadcrumbs'][] = ['label' => 'Consultation', 'url' => ['/client/expert/index']];
// $this->params['breadcrumbs'][] = ['label' => 'Chat Topic', 'url' => ['/chat/chat-topic/index', 'id' => $expert->id]];
// $this->params['breadcrumbs'][] = $this->title;
$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/hatchniaga');

?>
<div class="row">
  <div class="col-lg-3 col-md-5 col-12">
      <div class="box">
          <div class="box-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs customtab nav-justified" role="tablist">
                  <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#messages" role="tab">Experts</a> </li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">Topics</a> </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                  <div class="tab-pane active" id="messages" role="tabpanel">
      
                      <div class="chat-box-one-side">
                        <div class="media-list media-list-hover">
                          <?php foreach ($model as $clientEx): ?>
                            <div id="send-topic" class="media py-10 px-0 align-items-center" data-client="<?= $clientEx->client_id?>" data-expert-id="<?= $clientEx->expert_id?>" data-expert-name="<?=$clientEx->expert->user->fullname?>" data-expert-profile="<?=Url::to(['/client/profile/expert-image', 'id' => $clientEx->expert->user->id])?>">
                            <a class="avatar avatar-lg status-danger" href="#">
                              <img src="<?=Url::to(['/client/profile/expert-image', 'id' => $clientEx->expert->user->id])?>" alt="...">
                            </a>
                            <div class="media-body">
                              <p class="font-size-16">
                                <a class="hover-primary" href="#"><?=$clientEx->expert->user->fullname?></a>
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
                  <div class="tab-pane" id="contacts" role="tabpanel">                                    
                      
                      <div class="chat-box-one-side">
                          <div class="media-list media-list-hover">
                              <div class="media py-10 px-0 align-items-center">
                                <a class="avatar avatar-lg status-success" href="#">
                                  <img src="" alt="..." class="exp-profile">
                                </a>
                                <div class="media-body">
                                  <p class="font-size-16">
                                    <a class="hover-primary exp-name" href="#">Contoh Nama</a>
                                  </p>
                                </div>
                              </div>
                              <!-- <div class="media py-10 px-0 align-items-center">
                               
                                <div class="media-body">
                                  <p class="font-size-16 test">
                                    <a class="hover-primary" href="#"></a>
                                  </p>
                                </div>
                              </div> -->

                              <div id="topic-name">
                               
                                
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
        <div class="box-header px-0">
          <div class="media align-items-center p-0">
            <a class="avatar avatar-lg status-success mx-0" href="#">
              <img src="" class="rounded-circle exp-profile2" alt="...">
            </a>
            <div class="media-body">
              <p class="font-size-16">
                <a class="hover-primary exp-name2" href="#"><strong></strong></a>
              </p>
                2 day ago
            </div>
          </div>             
        </div>

        <div class="box-body px-0">
            <div class="chat-box-one">
              <div id="chat-box"></div>
            </div>
        </div>
      </div>
      <div class="box box-body">
          <div class="d-flex justify-content-between align-items-center">
              <input class="form-control b-0 py-10" type="text" id="chat-message" placeholder="Say something...">
              <div class="d-flex justify-content-between align-items-center">
                  <button type="button" class="waves-effect waves-circle btn btn-circle mr-10 btn-outline-primary">
                      <i class="mdi mdi-link"></i>
                  </button>
                  
              </div>
          </div>
      </div>
  </div>

</div>




<?php

$js = "function getTargetId(element){

   
    var val = element.data('client');
    var val2 = element.data('expert-name');
    var val3 = element.data('expert-id');

    $('.exp-name').html(val2);
    $('.exp-profile').attr('src',element.data('expert-profile'));

    $('.exp-name2').html(val2);
    $('.exp-profile2').attr('src',element.data('expert-profile'));


    $.ajax({url: '".Url::to(['/chat/chat-test/get-topics', 'client_id' => ''])."' + val , success: function(result){
        
        if(result){
            var data = JSON.parse(result);
            var str = '';
            // console.log(result);
            for (var key in data) {
                if (data.hasOwnProperty(key)) {

                  str += '<div class=\"media py-10 px-0 align-items-center\"><div class=\"media-body\"><p class=\"font-size-16 test\"><a data-topic=\"'+key+'\" data-exp-id=\"'+val3+'\" class=\"hover-primary topic-chat\" href=\"#\">' + data[key] + '</a></p></div></div>';

                }
            }
            console.log(str);
            $('#topic-name').html(str);


            $('.topic-chat').click(function(){
              // alert($(this).data('topic'));
              getTargetChat($(this));
            });
            
        }
    }
    });

}

function getTargetChat(element){

    $.ajax({
        url: '".Url::to(['/chat/default/index'])."',
        type: 'POST',
        data: {
          id: element.data('exp-id'), 
          tid: element.data('topic')
        },
        success: function (result) {
          var data = JSON.parse(result);
          var res = [];
          var str = '';
           for (var key in data) {

            // res.push([key, data [key]]);
                
            console.log(data[key]);

            
          //   str += '<div class=\"card d-inline-block mb-3 float-right mr-2 bg-primary max-w-p80\">
            
          //   <div class=\"position-absolute pt-1 pl-2 l-0\">
          //       <span class=\"text-extra-small\"></span>
          //   </div>
          //   <div class=\"card-body\">
          //       <div class=\"d-flex flex-row pb-2\">
          //           <div class=\"d-flex flex-grow-1 justify-content-end\">
          //               <div class=\"m-2 pl-0 align-self-center d-flex flex-column flex-lg-row justify-content-between\">
          //                   <div>
          //                       <p class=\"mb-0 font-size-16\"></p>
          //                   </div>
          //               </div>
          //           </div>
          //           <a class=\"d-flex\" href=\"#\">
          //               <img alt=\"Profile\" src=\"\" class=\"avatar ml-10\">
          //           </a>
          //       </div>
          //       <div class=\"chat-text-left pr-50\">
          //           <p class=\"mb-0 text-semi-muted\"></p>
          //       </div>
          //   </div>
          // </div>
          // <div class=\"clearfix\"></div>';
                
            }


        }
    });

}





$('#send-topic').click(function(){
  getTargetId($(this));

    // alert($(this).data('client'));
});


";
// JuiAsset::register($this);
$this->registerJs($js);
?>