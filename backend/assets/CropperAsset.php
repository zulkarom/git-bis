<?php
namespace backend\assets;

use yii\base\Exception;
use yii\web\AssetBundle as BaseAdminLteAsset;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class CropperAsset extends BaseAdminLteAsset
{
    public $sourcePath = '@backend/assets/cropper';
    public $css = [
        'cropper.min.css',
    ];
    public $js = [
        'cropper.min.js'
    ];
	

}
