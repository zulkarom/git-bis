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
/**
 * ChatTopicController implements the CRUD actions for ChatTopic model.
 */
class ChatTestController extends Controller
{
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
        $model = ClientExpert::find()
        ->where(['client_id' => Yii::$app->user->identity->client->id])
        ->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionGetTopics(){

        $client_id = Yii::$app->request->post('client_id');
        $expert_id = Yii::$app->request->post('expert_id');

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
                ->where(['client_id' => $client_id])
                ->andWhere(['expert_id' => $expert_id])
                ->orderBy('last_message_send DESC')
                ->all();

        $data = [];

        foreach($topics as $topic) {

            // $model = ChatTopic::find()
            //     ->alias('t')
            //     ->select('COUNT(c.is_read) as count_chat')
            //     ->where(['is_read' => 0])
            //     ->andWhere(['client_id' => $client_id])
            //     ->andWhere(['expert_id' => $expert_id])
            //     ->joinWith('chats c')
            //     ->groupBy('t.id')
            //     ->all();

            $countChat = ChatModel::find()
                    ->where(['topic_id' => $topic->id])
                    ->andWhere(['recipient_id' => $topic->client->user_id])
                    ->andWhere(['is_read' => 0])
                    ->count();


            $data[] = [
                "id" => $topic->id,
                "value" => $topic->topic,
                "unread" => $countChat
            ];
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
