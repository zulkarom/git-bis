<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property int $service_type
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_type'], 'required'],
            [['service_type'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_type' => 'Service Type',
        ];
    }
}
