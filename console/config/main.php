<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'templateFile' => '@vendor/dmstr/yii2-db/db/mysql/templates/file-migration.php',
            'generatorTemplateFiles' => [
                'create_table' => '@vendor/dmstr/yii2-db/db/mysql/templates/file-migration.php',
                'drop_table' => '@vendor/dmstr/yii2-db/db/mysql/templates/file-migration.php',
                'add_column' => '@vendor/dmstr/yii2-db/db/mysql/templates/file-migration.php',
                'drop_column' => '@vendor/dmstr/yii2-db/db/mysql/templates/file-migration.php',
                'create_junction' => '@vendor/dmstr/yii2-db/db/mysql/templates/file-migration.php',
            ],
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
        ],
    ],
    'params' => $params,
];
