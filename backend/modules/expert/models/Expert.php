<?php

namespace backend\modules\expert\models;

use Yii;
use backend\models\ClientExpert;
/**
 * This is the model class for table "expert".
 *
 * @property int $id
 * @property int $user_id
 * @property int $expert_type
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
            [['user_id', 'expert_type'], 'required'],
            [['user_id', 'expert_type'], 'integer'],
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
        ];
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
