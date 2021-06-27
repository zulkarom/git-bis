<?php

namespace website\assets;

use yii\web\AssetBundle;

/**
 * Main website application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@website/views/myassets';

    public $css = [
        
        'css/webflow2.css',
        'map/style.css',
        'map/rgs.css',
        'map/style(1).css',
        'map/magnific.css',
        'map/responsive.css',
    ];
    public $js = [

        'map/jquery.js',
        'map/jquery-migrate.min.js',
        'map/custom.js',
        'map/modernizr.js',
        'js/jquery-3.5.1.min.dc5e7f18c844b2.js',
        'js/webflow.c6e26e02f.js',
        'ajax/libs/aos/2.3.4/aos.js',
        'map/superfish.js',
        'map/init.js',
    ];


    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
