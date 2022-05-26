<?php

namespace backend\modules\website\models;

use Yii;
use yii\helpers\FileHelper;
use karpoff\icrop\CropImageUploadBehavior;
use yii\helpers\Url;
use backend\modules\website\models\Portfolio;

class PortfolioImage2 extends Portfolio
{
   
    public function behaviors()
    {
       

        $directory = Yii::getAlias('@uploaded/website/portfolio');
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        return [
            [
                'class' => CropImageUploadBehavior::className(),
                'attribute' => 'image_file_hover',
                'scenarios' => ['insert', 'update'],
                'path' => $directory,
                'url' => '',
                'ratio' => 1,
            ],
        ];

    }

}
