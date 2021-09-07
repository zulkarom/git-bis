<?php

namespace backend\modules\client\controllers;

use Yii;
use backend\models\Client;
use backend\models\ClientExpert;
use backend\modules\client\models\ClientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\UploadFile;
use common\models\User;
/**
 * ClientController implements the CRUD actions for Client model.
 */
class ClientController extends Controller
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
     * Lists all Client models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Client model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   
        $model = $this->findModel($id);
        $clientExpert = ClientExpert::find()->where(['client_id' => $id])->all();
        return $this->render('view', [
            'model' => $model ,
            'clientExpert' => $clientExpert ,
        ]);
    }

    /**
     * Creates a new Client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Client();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Client model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // $model = $this->findModel($id);
        $model = $this->findModel($id);
        $modelUser = User::findOne($model->user_id);
        

        $modelUser->scenario = 'update';
        $model->scenario = 'admin_update';

        if ($modelUser->load(Yii::$app->request->post()) 
            && $model->load(Yii::$app->request->post())) {

            // echo "<pre>";
            // print_r(Yii::$app->request->post());
            // die();

            $modelUser->username = $modelUser->email;
            if($modelUser->rawPassword){
                $modelUser->setPassword($modelUser->rawPassword);
            }            
            
            if($modelUser->save()){
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

    /**
     * Deletes an existing Client model.
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

    public function actionAssignDelete($id,$cid)
    {
        $this->findClientExpert($id)->delete();
        Yii::$app->session->addFlash('success', "Expert Removed");

        return $this->redirect(['/client/client/view', 'id' => $cid]);
    }

    public function actionAssign($cid)
    {
        $model = new ClientExpert();

        if ($model->load(Yii::$app->request->post())) {

            $check = ClientExpert::find()->where(['expert_id' => $model->expert_id])->one();
            if($check){
                Yii::$app->session->addFlash('warning', "Expert Already Exist");
            }else{
                $model->client_id = $cid;

                 if($model->save()){
                    Yii::$app->session->addFlash('success', "Expert Assign"); 
                }else{
                    $model->flashError();
                }
            }
            
            return $this->redirect(['/client/client/view', 'id' => $cid]);
        }

        return $this->renderAjax('assign', [
            'model' => $model,
        ]);
    }

    public function actionProfileImage($id){
        $model = $this->findClient($id);
        
        UploadFile::profileImage(1, $model);
    }

    /**
     * Finds the Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Client the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Client::findOne($id)) !== null) {
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

    protected function findClient($id)
    {
        if (($model = Client::findOne(['user_id' => $id])) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
