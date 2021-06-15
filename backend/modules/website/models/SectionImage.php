<?php

namespace backend\models;

use Yii;
use yii\helpers\FileHelper;
use karpoff\icrop\CropImageUploadBehavior;

class SectionImage extends Section
{

    public function behaviors()
    {

        $directory = Yii::getAlias('@uploaded/website/section/');
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        return [
            [
                'class' => CropImageUploadBehavior::className(),
                'attribute' => 'image_url',
                'scenarios' => ['insert', 'update'],
                //'placeholder' => '@app/web/images/test.png',
                'path' => $directory,
                'url' => '',
                'ratio' => 1,
            ],
        ];

    }

}
