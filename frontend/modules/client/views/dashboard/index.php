<?php
use backend\models\Expert;
use backend\models\BizCanvas;
use backend\models\ChatTopic;
use backend\models\ChatModel;
/* @var $this yii\web\View */

$this->title = 'Client Dashboard';
?>



    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            
            <div class="row ">
                <div class="col-xl-12">
                    <div class="white_card  mb_30">
                        <div class="white_card_body anlite_table p-0">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="single_analite_content">
                                        <h4>Number of Experts</h4>
                                        <h3><span class="counter"><?php echo Expert::countExperts()?></span> </h3>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_analite_content">
                                        <h4>Business Canvas</h4>
                                        <h3><span class="counter"><?php echo BizCanvas::countCanvas(Yii::$app->user->identity->id)?></span> </h3>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_analite_content">
                                        <h4>Number of Topics</h4>
                                        <h3><span class="counter"><?php echo ChatTopic::countTopic(Yii::$app->user->identity->client->id)?></span> </h3>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="single_analite_content">
                                        <h4>Total Conversation</h4>
                                        <h3><span class="counter"><?php echo ChatModel::countChat(Yii::$app->user->identity->id)?></span> </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                
                
                
                
                
                
                
            </div>
        </div>
    </div>


