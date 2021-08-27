<?php

namespace frontend\modules\client\controllers;

use Yii;
use backend\models\BcKeyParner;
use frontend\modules\client\models\BcKeyParnerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * BcKeyParnerController implements the CRUD actions for BcKeyParner model.
 */
class BcKeyParnerController extends Controller
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
     * Lists all BcKeyParner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BcKeyParnerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BcKeyParner model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BcKeyParner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid)
    {
        $model = new BcKeyParner();

        if ($model->load(Yii::$app->request->post())) {
            $model->biz_canvas_id = $pid;

             if($model->save()){

                Yii::$app->session->addFlash('success', "Key Partner Added");
                return $this->redirect(['/client/biz-canvas/view', 'id' => $pid]);
                
            }
        }

        return $this->renderAjax('../biz-canvas/_form', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing BcKeyParner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $pid)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

             if($model->save()){

                Yii::$app->session->addFlash('success', "Partner Updated");
                
            }else{
                $model->flashError();
            }
            return $this->redirect(['/client/biz-canvas/view', 'id' => $pid]);
        }

        return $this->renderAjax('../biz-canvas/_form', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BcKeyParner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $pid)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->addFlash('success', "Key Partner Deleted");

        return $this->redirect(['/client/biz-canvas/view', 'id' => $pid]);
    }

    /**
     * Finds the BcKeyParner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BcKeyParner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BcKeyParner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
