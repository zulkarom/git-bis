<?php

namespace backend\modules\client\models;

use Yii;
use backend\models\ClientExpert;
/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property int $user_id
 * @property int $client_type
 */
class Client extends \yii\db\ActiveRecord
{
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
            [['user_id'], 'required'],
            [['user_id', 'client_type'], 'integer'],
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
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getClientExpert()
    {
        return $this->hasMany(ClientExpert::className(), ['client_id' => 'id']);
    }
}
