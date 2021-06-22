<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Module asset bundle
 */
class ChatAsset extends AssetBundle
{
	/**
	 * @inheritdoc
	 */
	public $sourcePath = '@backend/assets/adminpress';

    public $css = [
        'images/images.css'
    ];

} 