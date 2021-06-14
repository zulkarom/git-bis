<?php

namespace backend\modules\website\models;

use Yii;

/**
 * This is the model class for table "web_intro".
 *
 * @property int $id
 * @property string $title
 * @property string $title_content
 * @property string $title_button
 * @property string $intro_content
 */
class Introduction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_intro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'title_content', 'title_button', 'intro_content'], 'required'],
            [['intro_content'], 'string'],
            [['title', 'title_button'], 'string', 'max' => 50],
            [['title_content'], 'string', 'max' => 100],
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
            'title_content' => 'Title Content',
            'title_button' => 'Title Button',
            'intro_content' => 'Intro Content',
        ];
    }
}
