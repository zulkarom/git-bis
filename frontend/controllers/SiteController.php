<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use yii\helpers\Url;
use backend\modules\classSession\models\ClassSession;
use backend\models\Announcement;
use backend\modules\frontend\models\frontend;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['signup', 'index', 'login', 'download'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $events = [];
		if(Yii::$app->user->isGuest){
			return $this->redirect(['login']);
		}else{
		    
		    $modelfrontend = frontend::findOne(['user_id' => Yii::$app->user->identity->id]);
		    $position = $modelfrontend->jawatan;
		    
            $type = [0];
            if(in_array($position, [4,5])){//guru sepenuh masa/separuh masa
               $type = [1,2,3];
            }else if($position == 3){
                $type = [1,2,4];
            }
            
            $modelAnnounce = Announcement::find()
            ->where(['status' => 1, 'type_id' => $type])
            ->andWhere(['<=', 'start_date', date('Y-m-d')])
            ->andWhere(['>=', 'end_date', date('Y-m-d')])
            ->all();

            

            $sessions = ClassSession::find()
            ->where(['frontend_id' => Yii::$app->user->identity->id ])
            ->all();
			$events = [];
            foreach ($sessions as $sess) {
                $event = new \yii2fullcalendar\models\Event();
                $event->id = $sess->id;
                                
                $event->title = $sess->client->cl_name;
                
                
                if($sess->plan_status == 10 || $sess->plan_status == 20){
                    $event->start = $sess->plan_date;
                    if($sess->plan_date < date('Y-m-d')){
                        $event->backgroundColor = '#1976d2';
                    }
                    else{
                        $event->backgroundColor = '#ffb22b';
                    }
                }
                else{
                    $event->start = $sess->session_date;
                    if($sess->session_date < date('Y-m-d')){
                        $event->backgroundColor = '#1976d2';
                    }
                    else{
                        $event->backgroundColor = '#ffb22b';
                    }
                }

                $event->url = Url::to(['/calendar/index', 'id' => $sess->id ]);

                $events[] = $event;
            }

            $category = $modelfrontend->category;
            if($category == 1){
                $type = 4;
            }else if($category == 2){
                $type = 3;
            }

			return $this->render('member', [
                'events' => $events,
                'modelAnnounce' => $modelAnnounce,
                'type' => $type,
			]);
		}
        
    }



    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }else{
             return $this->redirect(['user/security/login']);
        }

   //      $model = new LoginForm();
   //      if ($model->load(Yii::$app->request->post()) && $model->login()) {
   //          //return $this->goBack();
			// return $this->goHome();
   //      } else {
			// $this->layout = "//main-login";
   //          return $this->render('login', [
   //              'model' => $model,
   //          ]);
   //      }
    }


    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['/user/login']);
    }


    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
				Yii::$app->session->addFlash('success', "Registration Successful");
               return $this->redirect(['site/login']);
            }
        }
		
		$this->layout = "//main-login";

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
	
	
	
}
