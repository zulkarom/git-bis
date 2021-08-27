<?php

namespace backend\models;

use Yii;
use backend\models\BizCanvas;

/**
 * This is the model class for table "bc_brainstorm".
 *
 * @property int $id
 * @property int $biz_canvas_id
 * @property string $description
 */
class BcBrainstorm extends \yii\db\ActiveRecord
{
    public $bc_label = 'Brainstorming Space';
    public $bc_key = 'brainstorm';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bc_brainstorm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['biz_canvas_id', 'description', 'color'], 'required'],
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
