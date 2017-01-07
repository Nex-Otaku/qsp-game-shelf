<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        // ID модуля должен обязательно быть "user", иначе модуль не загрузится.
        'user' => [
            'class' => 'nex_otaku\user\UserFrontendModule',
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl' => '',
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
        'urlManager' => [
            'rules' => [
                // Страница входа.
                '/admin/sign-in' => 'user/security/login',
            ],
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\classes\AccessControl',
        // Маршруты, открытые по умолчанию всегда.
        'allowActions' => [
            // Выход
            'user/security/logout',
        ],
    ],
    'params' => $params,
];
