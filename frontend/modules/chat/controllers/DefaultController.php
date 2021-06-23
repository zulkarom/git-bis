<?php

namespace backend\modules\chat\controllers;

use Yii;
use yii\web\Controller;
use backend\models\ChatModel;

/**
 * Default controller for the `chat` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $className = Yii::$app->getUser()->identityClass;
        $model = new $className;
        $user=$model->find()->where(['id'=>Yii::$app->user->id])->one();

        $messages = ChatModel::getMessages($this->module->numberLastMessages);

        return $this->render('index',compact('user','messages'));
    }

    public function actionSendMessage()
    {
        if (Yii::$app->user->isGuest)
            return Yii::t('app','Registered can chat only');

        $post = Yii::$app->request->post();

      

        if ($post['sendMessage']=='true')
        {
            $model = new ChatModel();
            if ($model->load(Yii::$app->request->post()) and $model->validate())
            {
                $model->time = time();
                $model->rfc822 = date(DATE_RFC822,$model->time);
                $model->save();
            }
        }

        $messages = ChatModel::getMessages($this->module->numberLastMessages);

        return $this->renderPartial('_table',compact('messages'));
    }
}

