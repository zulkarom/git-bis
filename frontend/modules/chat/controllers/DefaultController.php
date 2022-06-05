<?php

namespace frontend\modules\chat\controllers;

use Yii;
use yii\web\Controller;
use backend\models\ChatModel;
use backend\models\Expert;
use yii\filters\AccessControl;
use backend\models\ChatTopic;
use yii\db\Expression;
use backend\models\ClientExpert;
/**
 * Default controller for the `chat` module
 */
class DefaultController extends Controller
{
    public $layout = '//main';

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
        $id = Yii::$app->request->get('id');
        $tid = Yii::$app->request->get('tid');
        $ex_user_id = Yii::$app->request->get('ex_user_id');

        $expert = Expert::findOne($id);
        $user = Yii::$app->user->identity->id;
        

        ChatModel::updateAll(['is_read' => 1], ['topic_id' => $tid, 'recipient_id' => $user]);
        $messages = ChatModel::getMessages($ex_user_id, $this->module->numberLastMessages, $tid);

        $result = json_encode($messages);
        return $result;
    }

    public function actionCreateTopic()
    {

        $post = Yii::$app->request->get();
        $chatTopic = Yii::$app->request->get('ChatTopic');
       
        $expert_id = $chatTopic['expert_id'];
        $client_id = Yii::$app->user->identity->client->id;

        $model = new ChatTopic();
        $cl_exp = ClientExpert::find()->where(['expert_id' => $expert_id, 'client_id' => $client_id])->one();
        // return json_encode($cl_exp->id);
        
        if ($model->load(Yii::$app->request->get()))
        {

            if ($post['submitTopic']=='true'){

                $model->topic = $model->topic;
                $model->client_id = $client_id;
                $model->client_expert_id = $cl_exp->id;

                if(!$model->save()){
                    return json_encode($model->errors);
                }
            }
            
            $data = ChatTopic::getTopic($model->id);

            /*echo "<pre>";
            print_r($data);
            die();*/
            $result = json_encode($data);
            return $result;
        }
    }

    public function actionUpdateTopic()
    {
        $post = Yii::$app->request->get();
        // return json_encode($post) ;
        $tid = Yii::$app->request->get('tid');
        $topic_name = Yii::$app->request->get('topic_name');
       
        $model = ChatTopic::findOne($tid);
        $model->topic = $topic_name;

        if($model->save()){
            return $model->topic;
        }else{
            return json_encode($model->errors);
        }
    }

   public function actionDeleteTopic()
    {
        $tid = Yii::$app->request->get('tid');

        ChatModel::deleteAll(['topic_id' => $tid]);
        $model = ChatTopic::findOne($tid);
        $model->delete();
        
        return $tid;
    }


    public function actionSendMessage()
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");

        if (Yii::$app->user->isGuest){
            return '';
        }
        
        $post = Yii::$app->request->get();
        // return json_encode($post) ;

     
        
            $model = new ChatModel();
            
            if ($model->load(Yii::$app->request->get()))
            {
                if ($post['sendMessage']=='true'){
                    ChatTopic::updateAll(['last_message_send' => new Expression('NOW()')], ['id' => $model->topic_id]);
                    $model->time = time();
                    $model->rfc822 = date(DATE_RFC822,$model->time);
                    $model->message = strip_tags($model->message);
                    $model->is_read = 0;
                    if(!$model->save()){
                        return json_encode($model->errors);
                    }
                }
                
                $messages = ChatModel::getRecentMessages($model->recipient_id, $this->module->numberLastMessages,$model->topic_id, $model->last_message_id);
                $result = json_encode($messages);
                return $result;

            }

        
    }

    public function actionRefreshMessage()
    {
        
        if (Yii::$app->user->isGuest){
            return '';
        }
        $post = Yii::$app->request->get();
        //return json_encode($post) ;

            $model = new ChatModel();
            
            if ($model->load(Yii::$app->request->get()))
            {

                $topic = ChatTopic::findOne($model->topic_id);
                if($topic){
                    $messages = ChatModel::getRefreshMessages($model->recipient_id, $this->module->numberLastMessages,$model->topic_id, $model->last_message_id);
                    $result = json_encode($messages);

                    if($messages){
                        return $result;
                    }
                }else{
                    return "topic_deleted";
                }
                
            }        
    }

    public function actionLoadMessage()
    {
        if (Yii::$app->user->isGuest){
            return '';
        }
        $post = Yii::$app->request->get();
        //return json_encode($post) ;

            $model = new ChatModel();
            
            if ($model->load(Yii::$app->request->get()))
            {

                
                $messages = ChatModel::getStartMessages($model->recipient_id, $this->module->numberLastMessages,$model->topic_id, $model->first_message_id);
                $result = json_encode($messages);
                return $result;

            }

        
    }

    public function actionDeleteMessage()
    {

        $chat_id = Yii::$app->request->get('cid');
        
        $model = ChatModel::findOne($chat_id);

        $new = new ChatModel();
        $new->is_deleted = $chat_id;
        $new->topic_id = $model->topic_id;
        $new->sender_id = $model->sender_id;
        $new->recipient_id = $model->recipient_id;
        $new->time = time();
        $new->rfc822 = date(DATE_RFC822,$new->time);
        $new->is_read = 1;

        if(!$new->save()){
            return json_encode($new->errors);
        }

        

        $model->delete();
        
        return $chat_id;
    }
    
}

