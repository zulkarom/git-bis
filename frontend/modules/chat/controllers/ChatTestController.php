<?php

namespace frontend\modules\chat\controllers;

use Yii;
use backend\models\ChatTopic;
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

    public function actionGetTopics($client_id){

        $topics  = ArrayHelper::map(ChatTopic::find()->where(['client_id' => $client_id])->all(), 'id', 'topic');
        
        // echo "<pre>";
        // print_r($topics);
        // die();
        $result = json_encode($topics);
        return $result;
        
    }

   
    protected function findModel($id)
    {
        if (($model = ChatTopic::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
