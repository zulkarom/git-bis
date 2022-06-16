<?php
/**
 * Created by PhpStorm.
 * User: ks
 * Date: 24/6/2561
 * Time: 1:54 น.
 */
namespace frontend\assets;

use yii\web\AssetBundle;

class HatchniagaAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/hatchniaga/';
    public $css = [
		// 'css/bootstrap.min.css',
        'assets/css/dashlite.css',
        'assets/css/theme.css',        
    ];


    public $js = [
        
        
        'assets/js/bundle.js',
        'assets/js/scripts.js',
        'assets/js/charts/gd-analytics.js',
        'assets/js/libs/jqvmap.js',
        'assets/js/apps/chats.js?r=123',
        'assets/js/charts/gd-default.js',
        'js/example-chart.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
		'djabiev\yii\assets\AutosizeTextareaAsset',
        //'yii\jui\JuiAsset',
        'yii\bootstrap4\BootstrapAsset',
        //'backend\assets\FontAwesomeAsset'
    ];
}