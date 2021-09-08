<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'Hatchniaga',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'website' => [
            'class' => 'backend\modules\website\Module',
        ],
        'client' => [
            'class' => 'backend\modules\client\Module',
        ],
        'expert' => [
            'class' => 'backend\modules\expert\Module',
        ],
        'chat' => [
            'class' => 'backend\modules\chat\ChatModule',
            'numberLastMessages' => 30,
        ],
        
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', 
            //'yii\rbac\PhpManager' or use 
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@mdm/admin/views' => '@backend/modules/admin/views/rbac',
                    '@dektrium/user/views' => '@backend/modules/user/views'
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
    ],
    

    
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'user/*',
            'gii/*',
            'debug/*',
            'expert/*',
            'client/*',
            'website/*',
            'bc-category/*',

            
        
            
            //'application',
            //'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
    
    'params' => $params,
];


