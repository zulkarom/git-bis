<?php

namespace frontend\modules\chat;

use Yii;
use yii\i18n\PhpMessageSource;

/**
 * chat module definition class
 */
class ChatModule extends \yii\base\Module
{
    public $table = 'chat';
    public $numberLastMessages = 20;
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\chat\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->registerTranslations();

       // custom initialization code goes here
    }

    protected function registerTranslations()
    {
        Yii::$app->get('i18n')->translations['chat'] = [
            'class' => PhpMessageSource::class,
            'basePath' => __DIR__ . '/messages',
            'sourceLanguage' => (isset(Yii::$app->language))?Yii::$app->language:'en',
            'forceTranslation' => true,
        ];
    }

}
