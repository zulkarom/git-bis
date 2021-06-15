<?php

namespace backend\modules\website\models;

use Yii;
use yii\helpers\FileHelper;
use specialist\icrop\CropImageUploadBehavior;
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
            [['title', 'content'], 'required'],

            ['image_url', 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update']],

            [['title'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {

        $directory = Yii::getAlias('@uploaded/website/section/');
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        return [
            [
                'class' => CropImageUploadBehavior::className(),
                'attribute' => 'image_url',
                'scenarios' => ['insert', 'update'],
                //'placeholder' => '@app/web/images/test.png',
                'path' => $directory,
                'url' => '',
                'ratio' => 1,
            ],
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
            'image_url' => 'Image',
        ];
    }
}
