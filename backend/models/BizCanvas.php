<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "bc_biz_canvas".
 *
 * @property int $id
 * @property int $user_id
 * @property string $created_at
 */
class BizCanvas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bc_biz_canvas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'title'], 'required'],
            [['user_id'], 'integer'],
            [['title', 'description'], 'string'],
            [['created_at', 'comment'], 'safe'],
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
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }
    
    public function itemsByCategory($category){
        return BcItem::find()->where(['biz_canvas_id' => $this->id, 'category_id' => $category])->all();
    }
    
    public function getCategory($category){
        return BcCategory::findOne($category);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function countCanvas($user){
        return self::find()
        ->where(['user_id' => $user])
        ->count();
    }

    public function flashError(){
        if($this->getErrors()){
            foreach($this->getErrors() as $error){
                if($error){
                    foreach($error as $e){
                        Yii::$app->session->addFlash('error', $e);
                    }
                }
            }
        }

    }
}
