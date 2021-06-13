<?php

namespace backend\controllers;

use Yii;
use common\models\Result;
use common\models\ResultSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\MataPelajaran;
use common\models\Model;
use yii\helpers\ArrayHelper;

/**
 * ResultController implements the CRUD actions for Result model.
 */
class ResultController extends Controller
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

    /**
     * Lists all Result models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Result model.
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
     * Creates a new Result model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Result();
        $modelsMataPelajaran = [new MataPelajaran];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

             $modelsMataPelajaran = Model::createMultiple(MataPelajaran::classname());
            Model::loadMultiple($modelsMataPelajaran, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsMataPelajaran) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsMataPelajaran as $modelsMataPelajaran) {
                            $modelsMataPelajaran->id = $model->id;
                            if (! ($flag = $modelsMataPelajaran->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

            
        }

        return $this->render('create', [
            'model' => $model,
            'modelsMataPelajaran' => (empty($modelsMataPelajaran)) ? [new MataPelajaran] : $modelsMataPelajaran
        ]);
    }

    /**
     * Updates an existing Result model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
          */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelsMataPelajaran = $model->mataPelajarans;
		
		//print_r($modelsMataPelajaran );die();


        // if (!$modelsMataPelajaran) {
        //     throw new NotFoundHttpException("The requested page does not exist.");
        // }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $oldIDs = ArrayHelper::map($modelsMataPelajaran, 'id', 'id');
            $modelsMataPelajaran = Model::createMultiple(MataPelajaran::classname(), $modelsMataPelajaran);
            Model::loadMultiple($modelsMataPelajaran, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsMataPelajaran, 'id', 'id')));



            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsMataPelajaran) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            MataPelajaran::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsMataPelajaran as $modelsMataPelajaran) {
                            $modelsMataPelajaran->result_id = $model->id;
                            if (! ($flag = $modelsMataPelajaran->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
						Yii::$app->session->addFlash('success', "Data Updated");
                         return $this->redirect(['update', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
           
        }

        return $this->render('update', [
            'model' => $model,
            'modelsMataPelajaran' => (empty($modelsMataPelajaran)) ? [new MataPelajaran] : $modelsMataPelajaran
        ]);
    }

    /**
     * Deletes an existing Result model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id);
        $select = MataPelajaran::find()
                    ->select('id')
                    ->where(['id' => $id])
                    ->all();

        MataPelajaran::deleteAll(['id' => $id]);
        Result::find()->where(['id' => $id])->one()->delete();

        return $this->redirect(['index','select'=>$select]);
    }

    /**
     * Finds the Result model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Result the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Result::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function findmatapelajaran($id)
    {
      if(($modelsMataPelajaran = MataPelajaran::findOne($id) !== null)){
        return $modelsMataPelajaran;
      }
      throw new NotFoundHttpException('The requested page does not exist.');
    }
}
