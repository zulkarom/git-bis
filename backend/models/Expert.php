<?php

namespace backend\models;

use Yii;

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
            [['fullname', 'email', 'personal_updated_at'], 'required', 'on' => 'profile_personal'],

            ['email', 'email'],

            ['profile_file', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update']],

            [['user_id', 'expert_type'], 'integer'],
            [['profile_file', 'fullname', 'email'], 'string', 'max' => 225],
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
}
