<?php

namespace backend\modules\website\models;

use Yii;
use specialist\icrop\CropImageUploadBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "web_portfolio".
 *
 * @property int $id
 * @property string $image_file
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_portfolio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            // [['image_url'], 'required', 'on' => 'update'],

            [['image_file', 'image_file_hover'], 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update']],

            [['image_url'], 'safe'],

            [['is_show'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_file' => 'Image',
            'image_file_hover' => 'Image Hover',
            'image_url' => "Image Url",
            'is_show' => "Is Show"
        ];
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
