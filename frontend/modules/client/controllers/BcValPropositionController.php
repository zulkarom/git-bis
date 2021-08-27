<?php

namespace frontend\modules\client\controllers;

use Yii;
use backend\models\BcValProposition;
use frontend\modules\client\models\BcValPropositionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * BcValPropositionController implements the CRUD actions for BcValProposition model.
 */
class BcValPropositionController extends Controller
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
     * Lists all BcValProposition models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BcValPropositionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BcValProposition model.
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
     * Creates a new BcValProposition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pid)
    {
        $model = new BcValProposition();

        if ($model->load(Yii::$app->request->post())) {
            $model->biz_canvas_id = $pid;

             if($model->save()){

                Yii::$app->session->addFlash('success', "Value Proposition Added");
                
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
     * Updates an existing BcValProposition model.
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

                Yii::$app->session->addFlash('success', "Value Proposition Updated");
                
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

        Yii::$app->session->addFlash('success', "Value Proposition Deleted");

        return $this->redirect(['/client/biz-canvas/view', 'id' => $pid]);
    }

    /**
     * Finds the BcValProposition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BcValProposition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BcValProposition::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
