<?php

namespace frontend\modules\client\controllers;

use Yii;
use common\models\User;
use yii\db\Expression;
use yii\filters\AccessControl;
use backend\models\Client;
use backend\models\ClientProfile;
use backend\models\Expert;
use frontend\models\UploadFile;
use yii\web\NotFoundHttpException;
use yii\helpers\FileHelper;

class ProfileController extends \yii\web\Controller
{
	public $layout = "//main-profile";
	
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
        $model = $this->findClientProfile($id);
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
				    }else{
				    	$model->flashError();
				    }
			    }
			    
			}
			

	        return $this->render('index', [
	            'model' => $model,
	            'user' => $user,
	        ]);



    }

    public function actionUploadImage($id){
	    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
	    
	    $model = $this->findClient($id);
	    $model->file_controller = 'profile';
	    $path = 'client/profile/' . $model->user_id ;
	    $directory = Yii::getAlias('@uploaded/' . $path . '/');
	    if (!is_dir($directory)) {
	        FileHelper::createDirectory($directory);
	    }
	    
	    $fileName = $model->user_id . '.png';
	    $filePath = $directory . $fileName;
	    
	    
	    $model->profile_file = $path . '/' . $fileName ;
	    $model->personal_updated_at = new Expression('NOW()');
	    $err = 'tiada';
	    if(!$model->save()){
	        $err = $model->flashError();
	    }
	    
	    $post = Yii::$app->request->post('image');
	    $image_parts = explode(";base64,", $post);
	    $image_type_aux = explode("image/", $image_parts[0]);
	    
	    $image_type = $image_type_aux[1];
	    $image_base64 = base64_decode($image_parts[1]);
	    file_put_contents($filePath, $image_base64);
	    return [
	        'url' => $path . '/' . $fileName,
	        'err' => $err
	    ];
	    
	}

   

	public function actionProfileImage($id){
        $model = $this->findClient($id);
        
        UploadFile::profileImage(1, $model);
    }
    
    public function actionExpertImage($id){
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
	
	protected function findClient($id)
    {
        if (($model = Client::findOne(['user_id' => $id])) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findClientProfile($id)
    {
        if (($model = ClientProfile::findOne(['user_id' => $id])) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }

	

}
