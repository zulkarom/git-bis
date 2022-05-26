<?php
/**
 * Created by PhpStorm.
 * User: ks
 * Date: 24/6/2561
 * Time: 1:54 น.
 */
namespace frontend\assets;

use yii\web\AssetBundle;

class ChatAsset extends AssetBundle
{
    public $sourcePath = '@frontend/web/';
    public $js = [

        'dlite/assets/js/apps/chat.js',
        
    ];

   
}