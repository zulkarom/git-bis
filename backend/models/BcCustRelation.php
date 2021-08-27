<?php

namespace backend\models;

use Yii;
use backend\models\BizCanvas;
/**
 * This is the model class for table "bc_cust_relation".
 *
 * @property int $id
 * @property int $biz_canvas_id
 * @property string $description
 */
class BcCustRelation extends \yii\db\ActiveRecord
{
    public $bc_label = 'Customer Relationship';
    public $bc_key = 'cust-relation';
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bc_cust_relation';
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
