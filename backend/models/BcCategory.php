<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bc_category".
 *
 * @property int $id
 * @property string $category_name
 * @property string $category_key
 * @property string|null $description
 * @property int $cat_col
 */
class BcCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bc_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string'],
            [['cat_col'], 'integer'],
            [['category_name'], 'string', 'max' => 200],
            [['category_key'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'category_key' => 'Category Key',
            'description' => 'Description',
            'cat_col' => 'Cat Col',
        ];
    }
}
