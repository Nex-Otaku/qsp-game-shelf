<?php
return [
    'language' => 'ru-RU',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['default', 'user'],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
        ],
        // Все используемые текстовые сообщения
        // выводятся через переводчик.
        // Это позволяет быстро перевести сгенерированные скрипты.
        // Также, это позволит в будущем 
        // делать проекты для иностранных заказчиков.
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app' => 'app.php'
                    ]
                ],
            ],
        ],
    ],
//    'modules' => [
//        'user' => [
//            'class' => 'dektrium\user\Module',
//            'admins' => ['admin'], // Хардкод для админского пользователя. После настройки прав доступа, нужно удалить эту строку.
//        ],        
//    ],
    'aliases' => [
        '@main_root' => realpath(dirname(__FILE__) . '/../../'),
    ],
];
