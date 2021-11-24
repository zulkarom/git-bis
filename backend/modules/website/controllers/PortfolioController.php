<?php

namespace backend\modules\website\controllers;

use Yii;
use backend\modules\website\models\Portfolio;
use backend\modules\website\models\PortfolioImage;
use backend\modules\website\models\PortfolioImage2;
use backend\modules\website\models\PortfolioSearch;
use backend\models\UploadFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * PortfolioController implements the CRUD actions for Portfolio model.
 */
class PortfolioController extends Controller
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
     * Lists all Portfolio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortfolioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Portfolio model.
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
     * Creates a new Portfolio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Portfolio();

        if($model->save()){
            return $this->redirect(['update', 'id' => $model->id]);
        }   
    }

    public function actionPortfolioImage($id){
        $model = $this->findModel($id);
        
        UploadFile::portfolioImage(1,$model);
    }

    public function actionPortfolioImage2($id){
        $model = $this->findModel($id);
        
        UploadFile::portfolioImage(2,$model);
    }

    /**
     * Updates an existing Portfolio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findPortfolio($id);
        $model2 = $this->findPortfolio2($id);

        $model->setScenario('update');
        $model2->setScenario('update');
        if ($model->load(Yii::$app->request->post()) 
            && $model2->load(Yii::$app->request->post())) {

            if($model->save() && $model2->save()){
                Yii::$app->session->addFlash('success', "Data updated.");
                return $this->redirect(['index']);
           }else{
                return $model->flashError();
           }
            
        }

        return $this->render('update', [
            'model' => $model,
            'model2' => $model2,
        ]);
    }

    /**
     * Deletes an existing Portfolio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $file =  Yii::getAlias('@uploaded/website/portfolio/'.$model->image_file);
        if($model->delete()){
            if (is_file($file)) {
                unlink($file);    
            }
        }else{
            Yii::$app->session->addFlash('error', "Delete Failed");
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Portfolio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Portfolio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Portfolio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findPortfolio($id)
    {
        if (($model = PortfolioImage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findPortfolio2($id)
    {
        if (($model = PortfolioImage2::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
