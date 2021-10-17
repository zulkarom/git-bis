<?php

namespace backend\models;

use frontend\models\user\User;
use Yii;

/**
 * This is the model class for table "{{%chat}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $time
 * @property string $rfc822
 * @property string $message
 */
class ChatModel extends \yii\db\ActiveRecord
{
    public $sender_name;
    
    public $recipient_name;

    public $last_message_id;

    public $first_message_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%chat}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time','recipient_id','sender_id', 'message'], 'required'],
            [['time','recipient_id','sender_id', 'topic_id', 'last_message_id', 'first_message_id'], 'integer'],
            [['rfc822'], 'string', 'max' => 50],
            [['message'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('chat', 'Name'),
            'icon' => Yii::t('chat', 'Icon'),
            'message' => Yii::t('chat', 'Message'),
        ];
    }
    
    public function getSender(){
         return $this->hasOne(User::className(), ['id' => 'sender_id']);
    }
    
    public function getRecipient(){
        return $this->hasOne(User::className(), ['id' => 'recipient_id']);
    }


    public static function getMessages($user, $numberLastMessages, $tid)
    {
        $messages = self::find()
        ->alias('a')
        ->select('a.*, s.fullname as sender_name, r.fullname as recipient_name')
        ->joinWith(['sender s', 'recipient r'])
            ->limit($numberLastMessages)
            
            ->orFilterWhere(['and',
                ['sender_id' => Yii::$app->user->identity->id],
                ['recipient_id' => $user],
                ['topic_id' => $tid],
            ])
            
            ->orFilterWhere(['and',
                ['sender_id' => $user],
                ['recipient_id' => Yii::$app->user->identity->id],
                ['topic_id' => $tid],
            ])
            
            ->orderBy(['id'=>SORT_DESC])
            ->all();
        
        $out=[];
        foreach ($messages as $message)
        {
            $out[$message->id]=[
                    'time' => $message->time,
                    'sender_name' => $message->sender_name,
                    'recipient_name' => $message->recipient_name,
                    'message' => $message->message,
                    'sender_id' => $message->sender_id,
                    'recipient_id' => $message->recipient_id,
                    'chat_id' => $message->id,
                ];
        }
        ksort($out);
        return $out;
    }

     public static function getRecentMessages($user, $numberLastMessages, $tid, $last_message_id)
    {
        $messages = self::find()
        ->alias('a')
        ->select('a.*, s.fullname as sender_name, r.fullname as recipient_name')
        ->joinWith(['sender s', 'recipient r'])
            ->orFilterWhere(['and',
                ['sender_id' => Yii::$app->user->identity->id],
                ['recipient_id' => $user],
                ['topic_id' => $tid],
                ['>','a.id',$last_message_id],
            ])
            
            ->orFilterWhere(['and',
                ['sender_id' => $user],
                ['recipient_id' => Yii::$app->user->identity->id],
                ['topic_id' => $tid],
                ['>','a.id',$last_message_id],
            ])
            
            ->orderBy(['id'=>SORT_DESC])
            ->all();
        
        $out=[];
        foreach ($messages as $message)
        {
            $out[$message->id]=[
                    'time' => $message->time,
                    'sender_name' => $message->sender_name,
                    'recipient_name' => $message->recipient_name,
                    'message' => $message->message,
                    'sender_id' => $message->sender_id,
                    'recipient_id' => $message->recipient_id,
                    'chat_id' => $message->id,
                ];
        }
        ksort($out);
        return $out;
    }

    public static function getPreviousMessages($user, $numberLastMessages, $tid, $first_message_id)
    {
        $messages = self::find()
        ->alias('a')
        ->select('a.*, s.fullname as sender_name, r.fullname as recipient_name')
        ->joinWith(['sender s', 'recipient r'])
        ->limit($numberLastMessages)
            ->orFilterWhere(['and',
                ['sender_id' => Yii::$app->user->identity->id],
                ['recipient_id' => $user],
                ['topic_id' => $tid],
                ['<','a.id',$first_message_id],
            ])
            
            ->orFilterWhere(['and',
                ['sender_id' => $user],
                ['recipient_id' => Yii::$app->user->identity->id],
                ['topic_id' => $tid],
                ['<','a.id',$first_message_id],
            ])
            
            ->orderBy(['id'=>SORT_DESC])
            ->all();
        
        $out=[];
        foreach ($messages as $message)
        {
            $out[$message->id]=[
                    'time' => $message->time,
                    'sender_name' => $message->sender_name,
                    'recipient_name' => $message->recipient_name,
                    'message' => $message->message,
                    'sender_id' => $message->sender_id,
                    'recipient_id' => $message->recipient_id,
                    'chat_id' => $message->id,
                ];
        }
        ksort($out);
        return $out;
    }
}
