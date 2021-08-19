<?php

namespace backend\models;

use Yii;
use common\models\User;
use backend\models\ClientExpert;
/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property int $user_id
 * @property int $client_type
 * @property string $biz_name
 * @property string $biz_address
 * @property string $biz_phone
 * @property string $biz_fax
 * @property string $biz_email
 * @property string $biz_type
 * @property string $biz_main_activity
 * @property string|null $biz_date_execution
 * @property string $biz_reg_no
 * @property int $biz_capital
 * @property string $profile_file
 * @property string $personal_updated_at
 *
 * @property User $user
 * @property ClientExper[] $clientExpers
 */
class Client extends \yii\db\ActiveRecord
{

    public $fullname;
    public $email;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'email', 'user_id', 'biz_name', 'biz_address', 'biz_phone', 'biz_fax', 'biz_email', 'biz_type', 'biz_main_activity', 'biz_reg_no', 'biz_capital', 'personal_updated_at', 'biz_date_execution'], 'required', 'on' => 'insert'],

            ['profile_file', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update']],

            [['user_id', 'client_type', 'biz_capital'], 'integer'],
            [['biz_date_execution', 'personal_updated_at'], 'safe'],
            [['biz_name', 'biz_address', 'biz_email', 'biz_type', 'biz_main_activity', 'biz_reg_no'], 'string', 'max' => 225],
            [['biz_phone', 'biz_fax'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'client_type' => 'Client Type',
            'biz_name' => 'Name of Business',
            'biz_address' => 'Business Address',
            'biz_phone' => 'Phone Number',
            'biz_fax' => 'Fax Number',
            'biz_email' => 'Business Email',
            'biz_type' => 'Business Type',
            'biz_main_activity' => 'Business Main Activity',
            'biz_date_execution' => 'Business Date Execution',
            'biz_reg_no' => 'Business Registration Number',
            'biz_capital' => 'Initial Capital',
            'profile_file' => 'Profile File',
            'personal_updated_at' => 'Personal Updated At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[ClientExpers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientExperts()
    {
        return $this->hasMany(ClientExpert::className(), ['client_id' => 'id']);
    }

    public function flashError(){
        if($this->getErrors()){
            foreach($this->getErrors() as $error){
                if($error){
                    foreach($error as $e){
                        Yii::$app->session->addFlash('error', $e);
                    }
                }
            }
        }

    }
}
