<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'view' => [
            'renderers' => [
                'html' => [
                    'class' => 'yii\smarty\ViewRenderer',
                    'options' => [
                        'left_delimiter' => '{{',
                        'right_delimiter' => '}}',
                        'config_dir' => '../views/config',
                    ]
                    //'cachePath' => '@runtime/Smarty/cache',
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\MemCache',
            'useMemcached' => true,
            'keyPrefix' =>'vendor_',
            'servers' => [
                [
                    'host' => '10.1.9.164',
                    'port' => 11212,
                    'weight' => 1,
                ],
            ],
        ],
        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://10.1.9.164:27019/vendor',
        ],
        'db' => $db,
    ],
    'params' => $params,
];
