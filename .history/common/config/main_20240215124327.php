<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@url'   => 'http://depart.uz/',
        
        '@fileUrl' => 'http://depart.uz/uploads/', // Replace this with the actual path to your files
    
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => \yii\rbac\PhpManager::class,
            'itemFile' => '@common/component/rbac/items.php',
            'assignmentFile' => '@common/component/rbac/assignments.php',
            'ruleFile' => '@common/component/rbac/rules.php'

        ],
    ],
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',       
        // ...
    ],
];