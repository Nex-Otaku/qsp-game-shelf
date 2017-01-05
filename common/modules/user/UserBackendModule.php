<?php

namespace common\modules\user;

/**
 * Конфигурация модуля "dektrium/yii2-user" для бэкенда.
 *
 * @author Nex Otaku <nex@otaku.ru>
 */
class UserBackendModule extends UserBaseModule
{
    public $adminPermission = 'administrator';
    public $urlRules = [
                // Профиль
                [
                    'class' => 'nex_otaku\uuid\classes\UuidUrlRule',
                    'pattern' => '<id:@uuid@>',
                    'route' => 'profile/show',
                ],
                // Вход настроен по маршруту "sign-in" в бэкенде.
                // Поэтому здесь остался только "logout".
                'logout'                => 'security/logout',
                '<action:(register|resend)>'             => 'registration/<action>',
                [
                    'class' => 'nex_otaku\uuid\classes\UuidUrlRule',
                    'pattern' => 'confirm/<id:@uuid@>/<code:[A-Za-z0-9_-]+>',
                    'route' => 'registration/confirm',
                ],
                'forgot'                                 => 'recovery/request',
                [
                    'class' => 'nex_otaku\uuid\classes\UuidUrlRule',
                    'pattern' => 'recover/<id:@uuid@>/<code:[A-Za-z0-9_-]+>',
                    'route' => 'recovery/reset',
                ],
                'settings/<action:\w+>'                  => 'settings/<action>'
            ];
    
    public $controllerMap = [
        'admin'    => 'common\modules\user\controllers\AdminController',
        'settings'    => 'common\modules\user\controllers\SettingsController',
        'registration' => 'common\modules\user\controllers\RegistrationController',
        'security' => 'common\modules\user\controllers\SecurityController',
        'recovery' => 'dektrium\user\controllers\RecoveryController',
        'profile' => 'dektrium\user\controllers\ProfileController',
    ];
}
