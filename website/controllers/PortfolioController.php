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
 

    public function actionPortfolioImage($id){
        $model = $this->findModel($id);
        
        UploadFile::portfolioImage($model);
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