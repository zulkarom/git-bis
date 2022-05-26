<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "chat_clone".
 *
 * @property int $id
 * @property int $recipient_id
 * @property int $sender_id
 * @property string $message
 * @property string $time
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_clone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipient_id', 'sender_id', 'message', 'time'], 'required'],
            [['recipient_id', 'sender_id'], 'integer'],
            [['message'], 'string'],
            [['time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recipient_id' => 'Recipient ID',
            'sender_id' => 'Sender ID',
            'message' => 'Message',
            'time' => 'Time',
        ];
    }

    public function getRecipient(){
        return $this->hasOne(User::className(), ['id' => 'recipient_id']);
    }

    public function getSender(){
        return $this->hasOne(User::className(), ['id' => 'sender_id']);
    }
}
