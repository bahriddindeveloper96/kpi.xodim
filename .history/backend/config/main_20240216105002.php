<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'bootstrap' => [
    'class' => 'yii\bootstrap5\BootstrapAsset',
    ],
    'modules' => [
        'gridview' => [
        'class' => 'kartik\grid\Module',
        // other module settings
    ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
        ],
        'assetManager' => [
            'bundles' => [
                // boshqa kutubxonalar...
                'kartik\export\ExportAsset' => [
                    'class' => 'yii\web\AssetBundle',
                    'depends' => [
                        'yii\bootstrap5\BootstrapAsset',
                    ],
                ],
            ],
        ],
       
        
            // 'view' => [
            //      'theme' => [
            //          'pathMap' => [
            //             '@app/views' => '@vendor/hail812/yii2-adminlte3/src/views'
            //          ],
            //      ],
            // ],
       
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',                                
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
        
    ],
    'params' => $params,
];
