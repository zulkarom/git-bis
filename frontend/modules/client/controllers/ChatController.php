<?php

namespace frontend\modules\client\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use backend\models\BizCanvas;

/**
 * BizCanvasController implements the CRUD actions for BizCanvas model.
 */
class ChatController extends Controller
{
    public $layout = '//chat';
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

    public function actionIndex()
    {
        $model =  BizCanvas::find()->where(['user_id' => Yii::$app->user->identity->id])->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
