<?php

namespace frontend\modules\client\controllers;

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
use yii\helpers\Json;
use yii\web\Response;

/**
 * ChatTopicController implements the CRUD actions for ChatTopic model.
 */
class ConsultDataController extends Controller
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
	
	public function beforeAction($action)
	{

		Yii::$app->response->format = Response::FORMAT_JSON;
		return parent::beforeAction($action);
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
                "id" => $clientEx->expert_id,
                "name" => $clientEx->expert->user->fullname,
                "profile" => Url::to(['/client/profile/expert-image', 'id' => $clientEx->expert->user->id]),
                "unread" => $countChat,
				"status" => 'Online'
            ];
        }
        return $data;
    }

    public function actionGetTopics(){

        $client_id = Yii::$app->user->identity->client->id;
		$user_id = Yii::$app->user->identity->id;
        $topics = ChatTopic::find()
                ->andWhere(['client_id' => $client_id, 'is_default' => 0])
                ->orderBy('last_message_send DESC')
                ->all();
        $data = [];
        if($topics){
            foreach($topics as $topic) {
                $countChat = ChatModel::find()
                        ->where(['topic_id' => $topic->id])
                        ->andWhere(['recipient_id' => $user_id])
                        ->andWhere(['is_read' => 0])
                        ->count();
                $data[] = [
                    "id" => $topic->id,
                    "title" => $topic->topic,
					"cid" => $topic->expert_id,
					"consultant" => $topic->expert->user->fullname,
					"profile" => Url::to(['/client/profile/expert-image', 'id' => $topic->expert->user_id]),
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

        

        return $data;
    }
	
	public function actionInitChat($user, $topic = false)
    {
		//echo Yii::$app->user->identity->id;die();
        return ChatModel::initMessage($user, $topic);
    }

   
    protected function findModel($id)
    {
        if (($model = ChatTopic::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
}
