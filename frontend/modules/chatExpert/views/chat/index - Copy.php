<?php
use backend\assets\ChatAsset;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use richardfan\widget\JSRegister;

ChatAsset::register($this); 

$dirAssests = Yii::$app->assetManager->getPublishedUrl('@backend/assets/hatchniaga');

?>
<style type="text/css">
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  /*min-width: 160px;*/
  box-shadow: 0px 2px 8px 0px rgba(0,0,0,0.2);
  /*padding: 12px 16px;*/
  z-index: 1;
  right:-10px;
  border-radius: 12px;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

<div class="row">
  <div class="col-lg-3 col-md-5 col-12">
      <div class="box">
          <div class="box-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs customtab nav-justified" role="tablist">
                  <li id="tab-expert" class="nav-item"> <a id="a-expert" class="nav-link active" data-toggle="tab" href="#panel-expert" role="tab">Clients</a> </li>
                  <li id="tab-topic" class="nav-item"> <a id="a-topic" class="nav-link" data-toggle="tab" href="#panel-topic" role="tab">Topics</a> </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                  <div class="tab-pane active" id="panel-expert" role="tabpanel">
      
                      <div class="chat-box-one-side">
                        <div class="media-list media-list-hover">
                          <div id="current-client"></div>
                          <div class="list-expert"></div>  
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane" id="panel-topic" role="tabpanel">                                    
                      
                      <div class="chat-box-one-side">
                        

                            <div class="exp-details">
                               
                                
                            </div>

                            <div id="current-topic"></div>
                            <div class="topic-name">
                               
                                
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
        <div id="group-header" class="box-header px-0" style="display:none">
          <div class="media align-items-center p-0">
            <a class="avatar avatar-lg status-success mx-0" href="#">
              <img src="" class="rounded-circle cl-profile2" alt="...">
            </a>
            <div class="media-body">
              <p class="font-size-16">
                <a class="hover-primary cl-name2" href="#"><strong></strong></a>
              </p>
                <a class="hover-primary cl-topic-name"  href="#"><strong></strong></a>
            </div>
          </div>             
        </div>

        <div class="box-body px-0">
          
            <div class="chat-box-one">
              <div class="btn-previous-message" align="center">
              
              </div>
              <br/>
              <div id="current-chat-box"></div>
              <div id="chat-box"></div>
            </div>
        </div>
      </div>
      <div id="group-msg" class="box box-body" style="display:none">
          <div class="d-flex justify-content-between align-items-center btn-send-message">
              
          </div>
      </div>
  </div>

</div>




<?php JSRegister::begin(['position' => static::POS_END]); ?>
<?= $this->render('@frontend/javascript/chat_js')?>
<?= $this->render('chatEx_js')?>
<?php JSRegister::end(); ?>