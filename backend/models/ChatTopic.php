<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "chat_topic".
 *
 * @property int $id
 * @property string $topic
 *
 * @property Chat[] $chats
 */
class ChatTopic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_topic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['topic'], 'required'],
            [['topic'], 'string', 'max' => 225],
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
            'topic' => 'Topic',
        ];
    }

    /**
     * Gets query for [[Chats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chat::className(), ['topic_id' => 'id']);
    }
}
