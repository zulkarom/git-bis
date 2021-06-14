<?php

namespace backend\modules\website\models;

use Yii;

/**
 * This is the model class for table "web_section".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $image_url
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'image_url'], 'required'],
            [['title'], 'string', 'max' => 50],
            [['content', 'image_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'image_url' => 'Image Url',
        ];
    }
}
