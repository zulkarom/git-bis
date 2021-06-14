<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@backend/views/myassets';

    // public $basePath = '@webroot';
    // public $baseUrl = '@web';


    public $css = [
        //'css/site.css',
        'vendor/jqvmap/css/jqvmap.min.css',
        'vendor/chartist/css/chartist.min.css',
        'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
        'css/style.css',
        'css/LineIcons.css',
        
        
    ];
    public $js = [
        //Required vendors
        'vendor/global/global.min.js',
        'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
        'vendor/chart.js/Chart.bundle.min.js',
        'js/custom.min.js',
        'js/deznav-init.js',

        //Counter Up
        'vendor/waypoints/jquery.waypoints.min.js',
        'vendor/jquery.counterup/jquery.counterup.min.js',
        //Apex Chart
        'vendor/apexchart/apexchart.js',
        //Chart piety plugin files
        'vendor/peity/jquery.peity.min.js',

        //Dashboard 1
        'js/dashboard/dashboard-1.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
