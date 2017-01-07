<?php

namespace common\modules\user;

use dektrium\user\Module as BaseModule;
use yii\base\BootstrapInterface;

/**
 * Общая конфигурация модуля "dektrium/yii2-user".
 *
 * @author Nex Otaku <nex@otaku.ru>
 */
class UserBaseModule extends BaseModule implements BootstrapInterface
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
    
    // Используем email в качестве имени пользователя.
    public $useEmailAsUsername = true;
    // Отключаем аватарки.
    public $enableGravatar = false;
    // Используемые поля профиля.
    public $profileFields = ['name', 'public_email', /*'gravatar_email', 'gravatar_id',*/ 'location', 'website', 'bio'];
    // Безопасное удаление.
    public $enableSoftDelete = false;
    
    /** @inheritdoc */
    public function bootstrap($app)
    {
        /** @var Module $module */
        /** @var \yii\db\ActiveRecord $modelName */
        if ($app->hasModule('user') && ($module = $app->getModule('user')) instanceof UserBaseModule) {
            // Переопределяем класс Finder модуля "dektrium/yii2-user".
            Yii::$classMap['dektrium\user\Finder'] = Yii::getAlias('@common/modules/user/classes/Finder.php');
        }
    }
}
