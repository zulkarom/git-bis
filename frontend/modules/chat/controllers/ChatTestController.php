<?php

namespace frontend\modules\chat\controllers;

use Yii;
use backend\models\ChatTopic;
use backend\models\ChatModel;
use frontend\modules\chat\models\ChatTopicSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use backend\models\ClientExpert;
use backend\modules\expert\models\Expert;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/**
 * ChatTopicController implements the CRUD actions for ChatTopic model.
 */
class ChatTestController extends Controller
{
    public $layout = '//main';
    /**
     * {@inheritdoc}
     */
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
     * Lists all ChatTopic models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetListExperts()
    {
        $model = ClientExpert::find()
        ->alias('ce')
        ->joinWith('chatTopics t')
        ->where(['ce.client_id' => Yii::$app->user->identity->client->id])
        ->orderBy('t.last_message_send DESC')
        ->all();

        $data = [];

         foreach($model as $clientEx) {

            $countChat = ChatModel::find()
                    ->andWhere(['recipient_id' => $clientEx->client->user_id])
                    ->andWhere(['sender_id' => $clientEx->expert->user_id])
                    ->andWhere(['is_read' => 0])
                    ->count();

            $data[] = [
                "client_id" => $clientEx->client_id,
                "expert_id" => $clientEx->expert_id,
                "client_expert_id" => $clientEx->id,
                "clEx_user_id" => $clientEx->expert->user_id,
                "clEx_name" => $clientEx->expert->user->fullname,
                "clEx_expertise" => $clientEx->expert->expertText,
                "clEx_profile" => Url::to(['/client/profile/expert-image', 'id' => $clientEx->expert->user->id]),
                "unread" => $countChat
            ];
        }
        return json_encode($data);
    }

    public function actionGetTopics(){

        $client_id = Yii::$app->request->post('client_id');
        $expert_id = Yii::$app->request->post('expert_id');
        $client_expert_id = Yii::$app->request->post('client_expert_id');

        // $topics  = ArrayHelper::map(ChatTopic::find()
        //     ->where(['client_id' => $client_id])
        //     ->andWhere(['expert_id' => $expert_id])
        //     ->orderBy('id DESC')
        //     ->all(), 'id', 'topic');

        // $data = [];

        // foreach($topics as $key => $topic) {
        //     $data[] = [
        //         "id" => $key,
        //         "value" => $topic
        //     ];
        // }

        $topics = ChatTopic::find()
                ->where(['client_expert_id' => $client_expert_id])
                ->andWhere(['client_id' => $client_id])
                ->andWhere(['expert_id' => $expert_id])
                ->orderBy('last_message_send DESC')
                ->all();

        $data = [];

        if($topics){
            foreach($topics as $topic) {

                $countChat = ChatModel::find()
                        ->where(['topic_id' => $topic->id])
                        ->andWhere(['recipient_id' => $topic->client->user_id])
                        ->andWhere(['is_read' => 0])
                        ->count();


                $data[] = [
                    "id" => $topic->id,
                    "value" => $topic->topic,
                    "is_default" => $topic->is_default,
                    "unread" => $countChat
                ];
            }  
        }else{
            $topic = new ChatTopic();
            $topic->topic = "Default";
            $topic->is_default = 1;
            $topic->client_id = $client_id;
            $topic->expert_id = $expert_id;
            $topic->client_expert_id = $client_expert_id;
            $topic->save();
        }

        

        return json_encode($data);
    }

   
    protected function findModel($id)
    {
        if (($model = ChatTopic::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
