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
    public $sourcePath = '@frontend/assets/hatchniaga/';
    public $js = [

        'assets/js/apps/chats.js?v=5',
        
    ];

   
}