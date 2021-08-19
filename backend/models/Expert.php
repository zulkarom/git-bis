<?php

namespace backend\models;

use Yii;
use common\models\User;
use common\models\Common;
/**
 * This is the model class for table "expert".
 *
 * @property int $id
 * @property int $user_id
 * @property int $expert_type
 * @property string $profile_file
 */
class Expert extends \yii\db\ActiveRecord
{
    public $fullname;
    public $email;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expert';
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

            [['user_id', 'expert_type'], 'integer'],
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
            'expert_type' => 'Expert Type',
            'profile_file' => 'Profile File',
        ];
    }

    public function expertType(){
        return Common::expertType();
    }

    public function getExpertText(){
        $label = Common::expertType();
        return $label[$this->expert_type];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getClientExpert()
    {
        return $this->hasMany(ClientExpert::className(), ['expert_id' => 'id']);
    }
}
