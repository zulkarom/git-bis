<?php

namespace frontend\modules\chat\controllers;

use Yii;
use yii\web\Controller;
use backend\models\ChatModel;
use backend\models\Expert;
use yii\filters\AccessControl;
use backend\models\ChatTopic;
/**
 * Default controller for the `chat` module
 */
class DefaultController extends Controller
{
    

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {
        $id = Yii::$app->request->post('id');
        $tid = Yii::$app->request->post('tid');

        $expert = Expert::findOne($id);
        $topicModel = ChatTopic::findOne($tid);
        $user = Yii::$app->user->identity;

        $messages = ChatModel::getMessages($expert->user->id, $this->module->numberLastMessages, $tid);

        $result = json_encode($messages);
        return $result;
    }

    // public function actionIndex($id, $tid)
    // {
    //     $expert = Expert::findOne($id);
    //     $topicModel = ChatTopic::findOne($tid);
    //     $user = Yii::$app->user->identity;

    //     $messages = ChatModel::getMessages($expert->user->id, $this->module->numberLastMessages, $tid);

    //     echo "<pre>";
    //     print_r($messages);
    //     die();

    //     return $this->render('index', [
    //         'user' => $user,
    //         'messages' => $messages,
    //         'expert' => $expert,
    //         'topicModel' => $topicModel,
    //     ]);
    // }

    public function actionCreateTopic()
    {
        if (Yii::$app->user->isGuest){
            return '';
        }


        $post = Yii::$app->request->post();
        // return json_encode($post) ;

            $model = new ChatTopic();
            
            if ($model->load(Yii::$app->request->post()))
            {

                if ($post['submitTopic']=='true'){

                    $model->topic = $model->topic;

                    if(!$model->save()){
                        return json_encode($model->errors);
                    }
                }
                
                $data = ChatTopic::getTopic($model->id);

                // echo "<pre>";
                // print_r($data);
                // die();
                $result = json_encode($data);
                return $result;

            }

        
    }

    public function actionSendMessage()
    {
        if (Yii::$app->user->isGuest){
            return '';
        }
        
        $post = Yii::$app->request->post();
        //return json_encode($post) ;

     
        
            $model = new ChatModel();
            
            if ($model->load(Yii::$app->request->post()))
            {
               // return 'xxxxxxxxx' . $model->recipient_id;
                if ($post['sendMessage']=='true'){
                    $model->time = time();
                    $model->rfc822 = date(DATE_RFC822,$model->time);
                    $model->message = strip_tags($model->message);
                    if(!$model->save()){
                        return json_encode($model->errors);
                    }
                }
                
                $messages = ChatModel::getRecentMessages($model->recipient_id, $this->module->numberLastMessages,$model->topic_id, $model->last_message_id);
                $result = json_encode($messages);
                return $result;

            }

        
    }

    public function actionLoadMessage()
    {
        if (Yii::$app->user->isGuest){
            return '';
        }
        $post = Yii::$app->request->post();
        //return json_encode($post) ;

            $model = new ChatModel();
            
            if ($model->load(Yii::$app->request->post()))
            {

               // return 'xxxxxxxxx' . $model->recipient_id;
                // if ($post['loadMessage']=='true'){
                //     $model->time = time();
                //     $model->rfc822 = date(DATE_RFC822,$model->time);
                //     $model->message = strip_tags($model->message);

                //     if(!$model->save()){
                //         return json_encode($model->errors);
                //     }
                // }
                
                $messages = ChatModel::getPreviousMessages($model->recipient_id, $this->module->numberLastMessages,$model->topic_id, $model->first_message_id);
                $result = json_encode($messages);
                // echo "<pre>";
                // print_r($messages);
                // die();
                return $result;

            }

        
    }
    
}

