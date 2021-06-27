<?php

namespace backend\models;

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
            [['id','user_id','time','recipient_id','sender_id'], 'integer'],
            [['rfc822'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 255],
            [['icon'], 'string', 'max' => 255],
            [['message'], 'string'],
            [['name','icon','message'], 'safe'],
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

    public static function getMessages($numberLastMessages)
    {
        $messages = self::find()
            ->orderBy('time DESC')
            ->limit($numberLastMessages)
            ->andFilterWhere(['or', 'sender_id', Yii::$app->user->identity->id])
            ->andFilterWhere(['or', 'recipient_id', Yii::$app->user->identity->id])
            ->orderBy(['time'=>SORT_ASC])
            ->all();
        $out=[];
        foreach ($messages as $message)
        {
            $out[$message['time']]=[
                    'rfc822' => $message['rfc822'],
                    'name' => $message['name'],
                    'icon' => $message['icon'],
                    'message' => $message['message'],
                    'sender_id' => $message['sender_id'],
                    'recipient_id' => $message['recipient_id'],
                ];
        }
        ksort($out);
        return $out;
    }
}