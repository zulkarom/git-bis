<?php

namespace frontend\modules\client\controllers;

use Yii;
use backend\models\BizCanvas;
use frontend\modules\client\models\BizCanvasSearch;
use frontend\modules\client\models\pdf\pdf_canvas;
use backend\models\BcKeyParner;
use backend\models\BcBrainstorm;
use backend\models\BcChannel;
use backend\models\BcRevStream;
use backend\models\BcCustSegment;
use backend\models\BcKeyActivity;
use backend\models\BcKeyResource;
use backend\models\BcCostStructure;
use backend\models\BcCustRelation;
use backend\models\BcValProposition;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\db\Expression;
use backend\models\BcItem;
use backend\models\BcCategory;
/**
 * BizCanvasController implements the CRUD actions for BizCanvas model.
 */
class BizCanvasController extends Controller
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
        $model = $this->findModel($id);
        //print_r($model->itemsByCategory(1));
        //die();
        
        return $this->render('view', [
            'model' => $model,
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
            Yii::$app->session->addFlash('success', "Biz Canvas created");
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('create', [
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
    
    public function actionCatDesc($cat)
    {
        $model = BcCategory::findOne($cat);
        
        return $this->renderAjax('guideline', [
            'model' => $model
        ]);
    }

    public function actionCreateItem($pid, $cat)
    {
        $model = new BcItem();
        
        if ($model->load(Yii::$app->request->post())) {
            $model->biz_canvas_id = $pid;
            $model->category_id = $cat;
            
            if($model->save()){
                
               //Yii::$app->session->addFlash('success', "Key Resources Added");
                
            }else{
                $model->flashError();
            }
            return $this->redirect(['view', 'id' => $pid]);
        }
        
        return $this->renderAjax('_form', [
            'model' => $model,
            'cat' => $cat
        ]);
    }
    
    public function actionUpdateItem($id, $pid, $cat)
    {
        $model = $this->findItem($id, $pid, $cat);
        
        if ($model->load(Yii::$app->request->post())) {
            
            if($model->save()){
                
                //Yii::$app->session->addFlash('success', "Key Resource Updated");
                
            }else{
                $model->flashError();
            }
            return $this->redirect(['view', 'id' => $pid]);
        }
        
        return $this->renderAjax('_form', [
            'model' => $model,
            'cat' => $cat
        ]);
    }
    
    /**
     * Deletes an existing BcKeyParner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteItem($id, $pid, $cat)
    {
        $this->findItem($id, $pid, $cat)->delete();
        
        //Yii::$app->session->addFlash('success', "Key Resource Deleted");
        
        return $this->redirect(['view', 'id' => $pid]);
    }

    public function actionGeneratePdf($id){

        $model = $this->findModel($id);
        $pdf = new pdf_canvas;
        $pdf->model = $model;
        $pdf->web = Yii::getAlias('@backend');
        $pdf->generatePdf();
        exit();
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
    
    protected function findItem($id, $bc, $cat)
    {
        if (($model = BcItem::findOne(['id' => $id, 'biz_canvas_id' => $bc, 'category_id' => $cat])) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
