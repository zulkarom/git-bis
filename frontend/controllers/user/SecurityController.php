<?php

namespace frontend\controllers\user;

use Yii;
use dektrium\user\controllers\SecurityController as BaseSecurityController;
use frontend\models\user\LoginForm;
use frontend\models\KadetLevel;
use common\models\User;

class SecurityController extends BaseSecurityController
{
   public function actionLogin()
    {
		$this->layout = "//main-login";
		if (!\Yii::$app->user->isGuest) {
            //$this->goHome();
			$this->redirect(['/dashboard/index']);
        }

        /** @var LoginForm $model */
        $model = \Yii::createObject(LoginForm::className());
        $event = $this->getFormEvent($model);

        // echo $event->getUser();
        // die();
        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_LOGIN, $event);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->login()) {
            $this->redirect(['/dashboard/index']);
            //return $this->goBack();
            /* $pengguna = User::findOne(['id' => Yii::$app->user->identity->id]);

            if($pengguna->role == 1){
                $this->trigger(self::EVENT_AFTER_LOGIN, $event);
    			//$this->goHome();
                $kdLevel = KadetLevel::findOne(['kadet_id' => Yii::$app->user->identity->kadet->id, 'status' => 1]);
                
                
                    if($kdLevel){
                        if($pengguna->kadet->personal_updated_at != '0000-00-00 00:00:00'){
                            $this->redirect(['/kadet/semester-register/create']);

                        }else{
                            $this->redirect(['/profile/index']);
                        }
                       
                    }
                    else{
                        $this->redirect(['/kadet-level/index']);
                    }
            }else{  
                
                $this->trigger(self::EVENT_AFTER_LOGIN, $event);

               $this->redirect(['/profile/maklumat-pegawai']);

            }
            
			
            //return $this->goBack(); */
        }

        return $this->render('login', [
            'model'  => $model,
            'module' => $this->module,
        ]);
		
	}
	
	public function actionLogout()
    {
        $event = $this->getUserEvent(\Yii::$app->user->identity);

        $this->trigger(self::EVENT_BEFORE_LOGOUT, $event);

        \Yii::$app->getUser()->logout();

        $this->trigger(self::EVENT_AFTER_LOGOUT, $event);

        return $this->redirect(['/user/login']);
    }
}
