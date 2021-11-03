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
    public $count_chat;
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
            [['topic', 'client_expert_id'], 'required'],
            [['topic'], 'string', 'max' => 225],
            [['client_id', 'expert_id', 'client_expert_id'], 'integer'],
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
        return $this->hasMany(ChatModel::className(), ['topic_id' => 'id']);
    }

    public function getExpert(){
         return $this->hasOne(Expert::className(), ['id' => 'expert_id']);
    }
    
    public function getClient(){
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    public function getClientExpert(){
        return $this->hasOne(ClientExpert::className(), ['id' => 'client_expert_id']);
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

    public static function deleteTopic($topic)
    {

        ChatModel::deleteAll(['topic_id' => $topic]);
        $model = self::findOne($topic);
        
        $model->delete();
        
        $result = 'Delete Success';
        return $result;
    }
}
