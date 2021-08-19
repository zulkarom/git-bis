<?php

namespace frontend\modules\chatExpert\controllers;

use Yii;
use yii\web\Controller;
use backend\models\ChatModel;
use backend\models\Client;
use yii\filters\AccessControl;
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
    public function actionIndex($id)
    {
        $client = Client::findOne($id);
        $user = Yii::$app->user->identity;

        $messages = ChatModel::getMessages($client->user->id, $this->module->numberLastMessages);

        return $this->render('index', [
            'user' => $user,
            'messages' => $messages,
            'client' => $client,
        ]);
    }

    public function actionSendMessage()
    {
        if (Yii::$app->user->isGuest){
            return '';
        }
        
        $post = Yii::$app->request->post();
        //return json_encode($post) ;

     
        if ($post['sendMessage']=='true')
        {
            $model = new ChatModel();
            
            if ($model->load(Yii::$app->request->post()))
            {
               // return 'xxxxxxxxx' . $model->recipient_id;
                $model->time = time();
                $model->rfc822 = date(DATE_RFC822,$model->time);
                $model->message = strip_tags($model->message);
                if($model->save()){
                    $messages = ChatModel::getMessages($model->recipient_id, $this->module->numberLastMessages);
                    
                    return $this->renderPartial('_table',compact('messages'));
                }
            }else{
                return json_encode($model->errors);
            }
        }

        
    }
}

