<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bc_cust_relation".
 *
 * @property int $id
 * @property int $biz_canvas_id
 * @property string $description
 */
class BcCustRelation extends \yii\db\ActiveRecord
{
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
            [['biz_canvas_id', 'description'], 'required'],
            [['biz_canvas_id'], 'integer'],
            [['description'], 'string'],
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
}
