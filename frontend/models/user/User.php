<?php

namespace frontend\models\user; 

use backend\models\Fasi;
use backend\models\Kadet;
use backend\modules\staff\models\Staff;

class User extends \dektrium\user\models\User
{
	const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
	
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][]   = 'fullname';
        $scenarios['update'][]   = 'fullname';
        $scenarios['register'][] = 'fullname';
		$scenarios['connect'][] = 'fullname';
		$scenarios['settings'][] = 'fullname';
        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        
        $rules['fullnameRequired'] = ['fullname', 'required', 'on' => ['register', 'create', 'connect', 'update']];
		
		$rules['roleRequired'] = ['role', 'required', 'on' => ['register']];
		
		$rules['fullnameLength']   = ['fullname', 'string', 'min' => 3, 'max' => 255];
		
        
        return $rules;
    }
	
	public function attributeLabels(){
		$arr = parent::attributeLabels();
		$arr['fullname'] = "Nama Penuh";
		return $arr;
	}
	
	public function getFasi(){
		return $this->hasOne(Fasi::className(), ['user_id' => 'id']);
	}
	
	public function getStaff(){
		return $this->hasOne(Staff::className(), ['user_id' => 'id']);
	}

	public function getKadet(){
		return $this->hasOne(Kadet::className(), ['user_id' => 'id']);
	}
	
	public function register(){
		$this->status = self::STATUS_ACTIVE;
		return parent::register();
	}
	
	public static function checkRoleExistByUsername($username, $role_id){
	    $role_table = self::getRoleTable($role_id);
	    $check = self::find()->alias('u')
	    ->innerJoin($role_table. ' r', 'u.id = r.user_id')
	    ->where('u.username = \'' . $username . '\'')
	    ->one();
	    if($check){
	        return true;
	    }
	    
	    return false;
	}
	
	private static function getRoleTable($role_id){
	    switch($role_id){
	        case 1:
	            return 'kadet';
	            break;
	        case 2:
	            return 'fasi';
	            break;
	        case 3:
	            return 'jurulatih';
	            break;
	        case 4:
	            return 'anak_gyg';
	    }
	    return false;
	}
}

?>