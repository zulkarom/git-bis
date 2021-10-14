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
            [['topic', 'client_id', 'expert_id'], 'required'],
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

    public function getExpert(){
         return $this->hasOne(Expert::className(), ['id' => 'expert_id']);
    }
    
    public function getClient(){
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    public static function getTopic($topic)
    {
        $model = self::findOne($topic);
        
        $out=[];
        
        $out[$model->id]=[
            'client_id' => $model->client_id,
            'expert_id' => $model->expert_id,
            'expert_user_id' => $model->expert->user_id,
            'topic_name' => $model->topic,
            'topic_id' => $model->id,
        ];
        ksort($out);
        return $out;
    }

}
