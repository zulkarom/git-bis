<?php

namespace frontend\modules\chatExpert\controllers;

use Yii;
use yii\web\Controller;
use backend\models\ChatModel;
use backend\models\Client;
use yii\filters\AccessControl;
use backend\models\ChatTopic;
/**
 * Default controller for the `chat` module
 */
class DefaultController extends Controller
{
    public $layout = '//main-expert';

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
        $cuser_id = Yii::$app->request->post('cuser_id');

        $client = Client::findOne($id);
        $topicModel = ChatTopic::findOne($tid);
        // echo $client;
        // die();

        $messages = ChatModel::getMessages($cuser_id, $this->module->numberLastMessages, $tid);

        $result = json_encode($messages);
        return $result;
    }

    // public function actionIndex($id)
    // {
    //     $client = Client::findOne($id);
    //     $user = Yii::$app->user->identity;

    //     $messages = ChatModel::getMessages($client->user->id, $this->module->numberLastMessages);

    //     return $this->render('index', [
    //         'user' => $user,
    //         'messages' => $messages,
    //         'client' => $client,
    //     ]);
    // }

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

            
            $messages = ChatModel::getPreviousMessages($model->recipient_id, $this->module->numberLastMessages,$model->topic_id, $model->first_message_id);
            $result = json_encode($messages);
            return $result;
        }
    }

    public function actionDeleteMessage()
    {

        $chat_id = Yii::$app->request->post('cid');

        $model = ChatModel::findOne($chat_id);
        $model->delete();
        
        return $chat_id;
    }
}

