<?php
/**
 * Created by PhpStorm.
 * User: ks
 * Date: 24/6/2561
 * Time: 1:54 น.
 */
namespace backend\assets;

use yii\web\AssetBundle;

class FrontLogin extends AssetBundle
{
    public $sourcePath = '@backend/assets/frontLogin';
    public $css = [
        'css/style.css',
        'fonts/material-icon/css/material-design-iconic-font.min.css',
    ];

    public $js = [
        'vendor/jquery/jquery.min.js',
        'js/main.js',
    ];

   
}