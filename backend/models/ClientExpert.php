<?php

namespace backend\models;

use Yii;
use backend\models\Expert;
use backend\models\Client;

/**
 * This is the model class for table "client_exper".
 *
 * @property int $id
 * @property int $client_id
 * @property int $expert_id
 */
class ClientExpert extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_exper';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'expert_id'], 'required'],
            [['client_id', 'expert_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'expert_id' => 'Expert ID',
        ];
    }

    public function getExpert()
    {
        return $this->hasOne(Expert::className(), ['id' => 'expert_id']);
    }

    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }
}
