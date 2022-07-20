<?php

namespace backend\modules\expert\controllers;

use Yii;
use backend\models\Expert;
use common\models\User;
use backend\modules\expert\models\ExpertSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\UploadFile;
use yii\db\Expression;
use backend\models\ClientExpert;
/**
 * ExpertController implements the CRUD actions for Expert model.
 */
class ExpertController extends Controller
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
     * Lists all Expert models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExpertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Expert model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $clientExpert = ClientExpert::find()->where(['expert_id' => $id])->all();
        return $this->render('view', [
            'model' => $model ,
            'clientExpert' => $clientExpert ,
        ]);
    }

    /**
     * Creates a new Expert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Expert();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Expert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUser = User::findOne($model->user_id);
        

        $modelUser->scenario = 'update';
        $model->scenario = 'admin_update';

        if ($modelUser->load(Yii::$app->request->post()) 
            && $model->load(Yii::$app->request->post())) {

            $modelUser->username = $modelUser->email;
            if($modelUser->rawPassword){
                $modelUser->setPassword($modelUser->rawPassword);
            }            
            
            if($modelUser->save()){
                $model->personal_updated_at = new Expression('NOW()');
                if($model->save()){
                    Yii::$app->session->addFlash('success', "Data Updated");
                    return $this->redirect(['view', 'id' => $id]);
                }else{
                    $model->flashError();
                }
            }else{
                $modelUser->flashError();
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelUser' => $modelUser,
        ]);
    }

    public function actionAssignDelete($id,$cid)
    {
        $this->findClientExpert($id)->delete();
        Yii::$app->session->addFlash('success', "Client Removed");

        return $this->redirect(['/expert/expert/view', 'id' => $cid]);
    }

    public function actionAssign($cid)
    {
        $model = new ClientExpert();
        if ($model->load(Yii::$app->request->post())) {

            $check = ClientExpert::find()->where(['client_id' => $model->client_id, 'expert_id' => $cid])->one();
            if($check){
                Yii::$app->session->addFlash('warning', "Client Already Exist");
            }else{
                $model->expert_id = $cid;

                 if($model->save()){
                    Yii::$app->session->addFlash('success', "Client Assign"); 
                }else{
                    $model->flashError();
                }
            }
            
            return $this->redirect(['/expert/expert/view', 'id' => $cid]);
        }

        return $this->renderAjax('assign', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Expert model.
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

    public function actionProfileImage($id){
        $model = $this->findExpert($id);
        
        UploadFile::profileImage(2, $model);
    }

    /**
     * Finds the Expert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Expert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Expert::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findClientExpert($id)
    {
        if (($model = ClientExpert::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findExpert($id)
    {
        if (($model = Expert::findOne(['user_id' => $id])) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
