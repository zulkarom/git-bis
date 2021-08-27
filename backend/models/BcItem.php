<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bc_item".
 *
 * @property int $id
 * @property int $biz_canvas_id
 * @property int $category_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $color
 *
 * @property BcBizCanvas $bizCanvas
 * @property BcCategory $category
 */
class BcItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bc_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['biz_canvas_id', 'category_id'], 'required'],
            [['biz_canvas_id', 'category_id'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['color'], 'string', 'max' => 100],
            [['biz_canvas_id'], 'exist', 'skipOnError' => true, 'targetClass' => BizCanvas::className(), 'targetAttribute' => ['biz_canvas_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => BcCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'color' => 'Color',
        ];
    }

    /**
     * Gets query for [[BizCanvas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBizCanvas()
    {
        return $this->hasOne(BizCanvas::className(), ['id' => 'biz_canvas_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(BcCategory::className(), ['id' => 'category_id']);
    }
}
