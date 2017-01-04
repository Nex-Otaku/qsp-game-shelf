<?php

namespace common\modules\user;

use dektrium\user\Module as BaseModule;

/**
 * Конфигурация модуля "dektrium/yii2-user" для бэкенда.
 *
 * @author Nex Otaku <nex@otaku.ru>
 */
class UserBaseModule extends BaseModule
{
    public $modelMap = [
                'User' => 'common\models\User',
                'Profile' => 'common\modules\user\models\Profile',
                'Account' => 'common\modules\user\models\Account',
                'LoginForm' => 'common\modules\user\models\LoginForm',
                'RegistrationForm' => 'common\modules\user\models\RegistrationForm',
                'SettingsForm' => 'common\modules\user\models\SettingsForm',
                'UserSearch' => 'common\modules\user\models\UserSearch',
            ];
    /** @var array Mailer configuration */
    public $mailer = [
        'sender' => 'no-reply@top100photo.ru',
    ];
}
