<?php

namespace frontend\modules\client\controllers;

use Yii;
use backend\models\Chat;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\ClientExpert;

/**
 * ChatController implements the CRUD actions for Chat model.
 */
class ChatController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Chat models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $clientExpert = ClientExpert::findOne($id);
        $chat = Chat::find()
        ->where(['recipient_id' => $clientExpert->expert->user_id])
        ->andWhere(['sender_id' => Yii::$app->user->id])
        ->all();

        // echo "<pre>";
        // print_r($chat);
        // die();

        return $this->render('index', [
            'chat' => $chat,
        ]);
    }

   

    /**
     * Creates a new Chat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSendMessage($id)
    {
        echo $id;
        die();
    }

    /**
     * Finds the Chat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Chat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Chat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
