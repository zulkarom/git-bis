<?php
namespace frontend\models\user;

//use dektrium\user\models\User;
use Yii;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use backend\models\Kadet;
use backend\models\Fasi;

/**
 * Signup form
 */
class RegistrationForm extends BaseRegistrationForm
{
	public $fullname;
	public $role;
	public $password_repeat;

	public $ic;
	public $rol;
	
	public function rules()
    {
        $rules = parent::rules();
		
		$rules['usernameLength']  = ['username', 'number', 'message' => '{attribute} mestilah dalam bentuk nombor tanpa "-"'];
		
        $rules['fullnameRequired'] = ['fullname', 'required'];

        $rules['roleRequired'] = ['role', 'required'];

		$rules['password_repeatRequired'] = ['password_repeat', 'required'];
        $rules['fullnameLength']   =  ['fullname', 'string', 'min' => 3, 'max' => 255];
		
		$rules['password_repeatCompare'] = ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ];
		

		//
        return $rules;
    }
	
	public function attributeLabels()
    {
		$label = parent::attributeLabels();
		$label['role'] = 'Pilih Kategori Pengguna';
		$label['username'] = 'No. Kad Pengenalan';
		$label['fullname'] = 'Nama Penuh';
		$label['password'] = 'Kata Laluan';
		$label['password_repeat'] = 'Ulang Kata Laluan';
        return $label;
    }
	
	public function register()
    {
        if (!$this->validate()) {
            return false;
        }

        /** @var User $user */
        $user = Yii::createObject(User::className());
        $user->setScenario('register');
        $this->loadAttributes($user);

        if (!$user->register()) {
            return false;
        }
	        
       	$user->role = $this->rol;
        if($user->role == 1){
				$kadet = new Kadet;
				$kadet->scenario = "signup";
				$kadet->user_id = $user->id;
				$kadet->nric = $user->username;
				$kadet->year_register = date('Y');
				$kadet->profile_file = 'user.png';
				$kadet->save(); 
			}else if($user->role == 2){
				$pegawai = new Fasi;
				$pegawai->scenario = "signup";
				$pegawai->user_id = $user->id;
				$pegawai->nric = $user->username;
				$pegawai->year_register = date('Y');
				$pegawai->profile_file = 'user.png';
				$pegawai->save();
			}
			
	        Yii::$app->session->setFlash(
	            'info',
	            Yii::t(
	                'user',
	                'Your account has been created and a message with further instructions has been sent to your email'
	            )
	        );
	        return true;
    }


}
