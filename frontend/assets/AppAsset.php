<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@frontend/views/myassets';

    public $css = [
        
        'css/site.css',
    ];
    public $js = [

        'js/typekit.js',
        'js/moment-js-vendor-26ddeab7fa5f90b6c8cb3-min.en-US.js',
        'js/cldr-resource-pack-7d6dc599f0e9e5882dcca-min.en-US.js',
        'js/common-vendors-4c95cb0df13d73249a184-min.en-US.js',
        'js/common-vendors-stable-db6e1a9e95959c0432ba5-min.en-US.js',
        'js/common-vendors-48e41544b77f688bf85c6-min.en-US.js',
        'js/common-3311b727f642a44e067d9-min.en-US.js',
        // 'js/performance-0add3f16b92e7b8855b50-min.en-US.js',//
        'js/common-cbed30ee8df43978dc2ad-min.en-US.js',
        'js/performance-eb5cbf8713abba7d0dae3-min.en-US.js',
        'js/site-bundle.js',
    ];


    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
