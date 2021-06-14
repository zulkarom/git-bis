<?php

namespace backend\modules\website\models;

use Yii;

/**
 * This is the model class for table "web_portfolio".
 *
 * @property int $id
 * @property string $image_url
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_portfolio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image_url'], 'required'],
            [['image_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_url' => 'Image Url',
        ];
    }
}
