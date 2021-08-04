<?php

namespace backend\models;

use Yii;
use backend\models\BizCanvas;
/**
 * This is the model class for table "bc_key_parner".
 *
 * @property int $id
 * @property int $biz_canvas_id
 * @property string $description
 */
class BcKeyParner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bc_key_parner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['biz_canvas_id', 'description', 'title', 'color'], 'required'],
            [['biz_canvas_id'], 'integer'],
            [['description', 'title', 'color'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'biz_canvas_id' => 'Biz Canvas ID',
            'description' => 'Description',
        ];
    }

    public function getBizCanvas(){
        return $this->hasOne(BizCanvas::className(), ['id' => 'biz_canvas_id']);
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
