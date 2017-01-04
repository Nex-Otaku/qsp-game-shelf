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
                    'class' => 'common\modules\user\classes\UuidUrlRule',
                    'pattern' => '<id:@uuid@>',
                    'route' => 'profile/show',
                ],
                // Вход настроен по маршруту "sign-in" в бэкенде.
                // Поэтому здесь остался только "logout".
                'logout'                => 'security/logout',
                '<action:(register|resend)>'             => 'registration/<action>',
                [
                    'class' => 'common\modules\user\classes\UuidUrlRule',
                    'pattern' => 'confirm/<id:@uuid@>/<code:[A-Za-z0-9_-]+>',
                    'route' => 'registration/confirm',
                ],
                'forgot'                                 => 'recovery/request',
                [
                    'class' => 'common\modules\user\classes\UuidUrlRule',
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
    
    public function init()
    {
        // Приходится устанавливать путь здесь, а не в свойствах класса,
        // т.к. он может быть определён разве что в конфиге приложения или Bootstrap.
        // См. yii\base\Module::$_viewPath.
        $this->viewPath = '@common/modules/user/views/user';
    }
}
