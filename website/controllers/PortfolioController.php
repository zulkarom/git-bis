<?php

namespace website\controllers;

use Yii;
use backend\modules\website\models\Portfolio;
use backend\models\UploadFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * PortfolioController implements the CRUD actions for Portfolio model.
 */
class PortfolioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actionIndex()
    {
        echo 'image';
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
}
