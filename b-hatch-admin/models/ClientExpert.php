<?php

namespace backend\models;

use Yii;
use backend\models\Expert;
use backend\models\Client;
use backend\models\ChatTopic;
/**
 * This is the model class for table "client_exper".
 *
 * @property int $id
 * @property int $client_id
 * @property int $expert_id
 */
class ClientExpert extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_exper';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'expert_id'], 'required'],
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
            'client_id' => 'Client',
            'expert_id' => 'Expert',
        ];
    }

    public function getExpert()
    {
        return $this->hasOne(Expert::className(), ['id' => 'expert_id']);
    }

    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    public function getChatTopics()
    {
        return $this->hasMany(ChatTopic::className(), ['client_expert_id' => 'id']);
    }

    public function getCountUnread($client_id, $expert_id){
        $unread = ChatTopic::find()
                ->alias('t')
                ->joinWith(['chats c'])
                ->where(['t.client_id' => $this->client_id])
                ->andWhere(['t.expert_id' => $this->expert_id])
                ->andWhere(['c.recipient_id' => Yii::$app->user->identity->id])
                ->andWhere(['c.is_read' => 0])
                ->count();
        return $unread;
    }
}
