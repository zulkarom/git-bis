<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property int $user_id
 * @property int $client_type
 * @property string $profile_file
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
            
            [['fullname', 'email', 'personal_updated_at'], 'required', 'on' => 'insert'],

            ['email', 'email'],

            ['profile_file', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update']],
            
            [['user_id', 'client_type'], 'integer'],
            [['fullname', 'email'], 'string', 'max' => 225],
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
            'profile_file' => 'Profile File',
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
