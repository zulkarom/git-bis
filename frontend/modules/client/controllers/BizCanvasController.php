<?php

namespace frontend\modules\client\controllers;

use Yii;
use backend\models\BizCanvas;
use frontend\modules\client\models\BizCanvasSearch;
use backend\models\BcKeyParner;
use backend\models\BcBrainstorm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
/**
 * BizCanvasController implements the CRUD actions for BizCanvas model.
 */
class BizCanvasController extends Controller
{
    public $layout = '//main';
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
     * Lists all BizCanvas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new BizCanvas();

        $searchModel = new BizCanvasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BizCanvas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $partner = BcKeyParner::find()
        ->joinWith('bizCanvas')
        ->where(['user_id' => Yii::$app->user->identity->id, 'biz_canvas_id' => $id])
        ->one();

        $space = BcBrainstorm::find()
        ->joinWith('bizCanvas')
        ->where(['user_id' => Yii::$app->user->identity->id, 'biz_canvas_id' => $id])
        ->one();

        return $this->render('view', [
            'partner' => $partner,
            'space' => $space,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BizCanvas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BizCanvas();

        if ($model->load(Yii::$app->request->post())) {

            $model->user_id = Yii::$app->user->identity->id;
            $model->created_at = new Expression('NOW()');

            if(!$model->save()){
                $model->flashError();
            }
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BizCanvas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BizCanvas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BizCanvas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BizCanvas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BizCanvas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
