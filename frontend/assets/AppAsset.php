<?php
namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{

     public $sourcePath = '@frontend/assets/hatchniaga/';

    public $css = [
        // 'css/bootstrap.min.css',
        'assets/css/dashlite.css',
        'assets/css/theme.css', 
        'assets/css/libs/fontawesome-icons.css',     
    ];

    public $js = [];

    public $depends = [
        'yii\bootstrap4\BootstrapAsset',
        // 'yii\bootstrap4\BootstrapAsset',
    ];
}
