<?php

namespace frontend\modules\expert\controllers;

use Yii;
use common\models\User;
use yii\db\Expression;
use yii\filters\AccessControl;
use backend\models\Expert;
use backend\models\ExpertProfile;

use frontend\models\UploadFile;
use yii\web\NotFoundHttpException;

class ProfileController extends \yii\web\Controller
{
	public $layout = "//main-expert";
	
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
	
    public function actionIndex()
    {
		$id = Yii::$app->user->identity->id;
        $model = $this->findExpertProfile($id);
       	$user = User::findOne($id);

			$model->setScenario('insert');
			if ($model->load(Yii::$app->request->post())) {
				$checkUser = User::find()
				->where(['username' => $model->email])
				->andWhere(['<>', 'id', Yii::$app->user->identity->id])
				->one();
			   
			    if($checkUser){
			    	Yii::$app->session->addFlash('warning', "Email have been taken");
			    }else{
			    	$user->email = $model->email;
			    	$user->username = $model->email;
			    	$model->personal_updated_at = new Expression('NOW()');
				    $user->fullname = $model->fullname;
				    // $model->personal_updated_at = date('Y-m-d H:m:s');
				    if($model->save() && $user->save()){
				        Yii::$app->session->addFlash('success', "Profile updated");
				        return $this->refresh();
				        
				    }
			    }
			    
			}
			

	        return $this->render('index', [
	            'model' => $model,
	        ]);



    }

   

	public function actionProfileImage($id){
        $model = $this->findExpert($id);
        
        UploadFile::profileImage(2, $model);
    }
	
	protected function findExpert($id)
    {
        if (($model = Expert::findOne(['user_id' => $id])) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findExpertProfile($id)
    {
        if (($model = ExpertProfile::findOne(['user_id' => $id])) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

	

}
