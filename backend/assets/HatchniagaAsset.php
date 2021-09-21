<?php
/**
 * Created by PhpStorm.
 * User: ks
 * Date: 24/6/2561
 * Time: 1:54 น.
 */
namespace backend\assets;

use yii\web\AssetBundle;

class HatchniagaAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets/hatchniaga';
    public $css = [
        'css/vendors_css.css',
        'css/style.css',
        'css/skin_color.css',
    ];

    public $js = [
        'js/main.js',
        'js/vendors.min.js',
        'js/pages/chat-popup.js',
        'js/template.js',
        'js/demo.js',

    ];

    public $depends = [
        'yii\web\YiiAsset',
		'djabiev\yii\assets\AutosizeTextareaAsset',
        //'yii\jui\JuiAsset',
        'yii\bootstrap4\BootstrapAsset',
        //'backend\assets\FontAwesomeAsset'
    ];
}