<?php

namespace frontend\modules\chatExpert\controllers;

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
use backend\models\BizCanvas;
/**
 * ChatTopicController implements the CRUD actions for ChatTopic model.
 */
class ChatController extends Controller
{
    public $layout = '//main-expert';
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
        ->where(['expert_id' => Yii::$app->user->identity->expert->id])
        ->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionGetListClients()
    {
        $model = ClientExpert::find()
        ->alias('ce')
        ->joinWith('chatTopics t')
        ->where(['ce.expert_id' => Yii::$app->user->identity->expert->id])
        ->orderBy('ce.last_message DESC')
        ->all();

        $data = [];

        $today_date = date('d F Y');

         foreach($model as $clientEx) {

            $countChat = ChatModel::find()
                    ->andWhere(['recipient_id' => $clientEx->expert->user_id])
                    ->andWhere(['sender_id' => $clientEx->client->user_id])
                    ->andWhere(['is_read' => 0])
                    ->count();

            $topic = ChatTopic::find()
                ->where(['client_expert_id' => $clientEx->id])
                ->andWhere(['client_id' => $clientEx->client_id])
                ->andWhere(['expert_id' => $clientEx->expert_id])
                ->andWhere(['is_default' => 1])
                ->orderBy('last_message_send DESC')
                ->one();

            $last_send = date('d F Y', strtotime($topic->last_message_send));

            if($today_date == $last_send){
                $datetime = date('h:i A', strtotime($topic->last_message_send));
            }else{
                $datetime = date('j M', strtotime($topic->last_message_send));
            }

            $data[] = [
                "client_id" => $clientEx->client_id,
                "expert_id" => $clientEx->expert_id,
                "client_expert_id" => $clientEx->id,
                "clEx_user_id" => $clientEx->client->user_id,
                "clEx_name" => $clientEx->client->user->fullname,
                "clEx_profile" => Url::to(['/expert/profile/client-image', 'id' => $clientEx->client->user->id]),
                "clEx_company" => $clientEx->client->biz_name,
                "clEx_company_type" => $clientEx->client->biz_type,
                "clEx_company_address" => $clientEx->client->biz_address,
                "unread" => $countChat,
                "id" => $topic->id,
                "value" => $topic->topic,
                "is_default" => $topic->is_default,
                "datetime" => $datetime,
            ];
        }
        return json_encode($data);
    }

    public function actionGetListTopics()
    {

        $topics = ChatTopic::find()
                ->andWhere(['expert_id' => Yii::$app->user->identity->expert->id])
                ->andWhere(['<>', 'is_default', 1])
                ->orderBy('last_message_send DESC')
                ->all();

        $data = [];

        $today_date = date('d F Y');

        if($topics){
            foreach($topics as $topic) {

                $countChat = ChatModel::find()
                        ->where(['topic_id' => $topic->id])
                        ->andWhere(['recipient_id' => $topic->client->user_id])
                        ->andWhere(['is_read' => 0])
                        ->count();

                $last_send = date('d F Y', strtotime($topic->last_message_send));

                if($today_date == $last_send){
                    $datetime = date('h:i A', strtotime($topic->last_message_send));
                }else{
                    $datetime = date('j M', strtotime($topic->last_message_send));
                }

                $data[] = [
                    "id" => $topic->id,
                    "value" => $topic->topic,
                    "is_default" => $topic->is_default,
                    "topic_name" => $topic->topic,
                    "unread" => $countChat,
                    "client_id" => $topic->client_id,
                    "expert_id" => $topic->expert_id,
                    "client_expert_id" => $topic->client_expert_id,
                    "clEx_user_id" => $topic->client->user_id,
                    "clEx_name" => $topic->client->user->fullname,
                    "clEx_expertise" => $topic->expert->expertText,
                    "datetime" => $datetime,
                    "clEx_profile" => Url::to(['/client/profile/profile-image', 'id' => $topic->client->user->id]),
                ];
            }  
        }

        return json_encode($data);
    }

    public function actionGetBizCanvas()
    {

        $cid = Yii::$app->request->get('cl_user_id');

        $canvas = BizCanvas::find()
                ->andWhere(['user_id' => $cid])
                ->all();

        $data = [];


        if($canvas){
            foreach($canvas as $cav) {

                $data[] = [
                    "id" => $cav->id,
                    "title" => $cav->title,
                    "description" => $cav->description,
                ];
            }  
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
