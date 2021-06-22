<?php
namespace frontend\models\user;

use dektrium\user\models\LoginForm as BaseLoginForm;

/**
 * Login form
 */
class LoginForm extends BaseLoginForm
{
	public $role;
	
	public function rules()
    {
        $rules = parent::rules();
        $rules[]  = ['role', 'required'];
       
		$rules[]  = ['login', 'number', 'message' => '{attribute} mestilah dalam bentuk nombor tanpa "-"'];
		$rules[]  = ['role', 'validateRole'];
        return $rules;
    }
	
	public function attributeLabels()
    {
		$labels = parent::attributeLabels();
		$labels['login'] = 'No. Kad Pengenalan';
        return $labels;
    }
    
    public function validateRole($attribute, $params, $validator)
    {
        if(!User::checkRoleExistByUsername($this->login, $this->role)){
            $this->addError($attribute, 'Sila pilih fungsi yang berkenaan sahaja.');
        }
    }
    
    
}
