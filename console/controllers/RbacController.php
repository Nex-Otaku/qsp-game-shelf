<?php

namespace console\controllers;

use yii\console\Controller;
use Yii;
use yii\rbac\Role;
use nex_otaku\toolkit\rbac\rules\UserRule;
use common\models\User;

/**
 * Установка ролей и прав доступа для сайта.
 *
 * Для привязки ролей к пользователям используем файл настроек "console/config/rbac-assignments.php":
 * 
 * <?php

    return 	[
        'developer' => [
            'super-developer@developer.ru',
        ],
        'administrator' => [
            'mega-administrator@administrator.ru',
            'gendirektor@mail.ru',
        ],
        'moderator' => [
            'ultra-moderator@moderator.ru',
        ],
    ];
 * 
 * @author Nex Otaku <nex@otaku.ru>
 */
class RbacController extends Controller
{
    private $assignments = [];
    
    public function init() {
        parent::init();
        
        $this->assignments = require(Yii::getAlias('@console/config/rbac-assignments.php'));
    }
    
    /**
     * Устанавливаем правила доступа для сайта.
     */
    public function actionInit()
    {
        $this->removeRules();
        $this->addRules();
        $this->assignRoles();
        
        $this->stdout("Установлены правила доступа для сайта.\n");
    }
    
    /**
     * Устанавливаем правила доступа для сайта и всех модулей.
     */
    public function actionInitAll()
    {
        // Устанавливаем правила доступа для сайта.
        $this->actionInit();
    }

    /**
     * Сбрасываем правила доступа для сайта.
     */
    public function actionClear()
    {
        $this->removeRules();
        
        $this->stdout("Сброшены правила доступа для сайта.\n");
    }
    
    private function removeRules()
    {
        $auth = Yii::$app->authManager;
        
        $auth->removeAllAssignments();
        $auth->removeAllRoles();
        $auth->removeAllPermissions();
        $auth->removeAllRules();
    }
    
    private function assignPermissions(Role $role, array $permissions)
    {
        $auth = Yii::$app->authManager;
        foreach ($permissions as $path) {
            // Создаём разрешения и прикрепляем к существующей роли.
            $permission = $auth->createPermission($path);
            $auth->add($permission);
            $auth->addChild($role, $permission);
        }
    }
    
    private function addRules()
    {
        $auth = Yii::$app->authManager;

        // Создаём роль "default".
        $default = $auth->createRole('default');
        $default->description = 'Роль по умолчанию';
        $auth->add($default);
        
        // Создаём правило "isUser".
        $isUser = new UserRule();
        $auth->add($isUser);

        // Создаём роль "user" и прикрепляем к ней правило "isUser".
        $user = $auth->createRole('user');
        $user->description = 'Зарегистрированный пользователь';
        $user->ruleName = $isUser->name;
        $auth->add($user);
        // Устанавливаем маршруты для роли "user".
        $this->assignPermissions($user, [
            '/site/*',
            '/user/settings/account',
            '/user/settings/networks',
            '/user/settings/profile',
        ]);

        // Создаём роль "moderator", прикрепляем к ней правило "isUser"
        // и наследуем все разрешения от роли "user".
        $moderator = $auth->createRole('moderator');
        $moderator->description = 'Модератор';
        $moderator->ruleName = $isUser->name;
        $auth->add($moderator);
        $auth->addChild($moderator, $user);
        // Устанавливаем маршруты для роли "moderator".
//        $this->assignPermissions($moderator, [
//            '/files/*',
//            '/sort/*',
//            '/comment/*',
//        ]);

        // Создаём роль "administrator", прикрепляем к ней правило "isUser"
        // и наследуем все разрешения от роли "moderator".
        $administrator = $auth->createRole('administrator');
        $administrator->description = 'Администратор';
        $administrator->ruleName = $isUser->name;
        $auth->add($administrator);
        $auth->addChild($administrator, $moderator);
        // Устанавливаем маршруты для роли "administrator".
        $this->assignPermissions($administrator, [
            '/feed/*',
            '/user/*',
        ]);

        // Создаём роль "developer", прикрепляем к ней правило "isUser"
        // и наследуем все разрешения от роли "administrator".
        $developer = $auth->createRole('developer');
        $developer->description = 'Разработчик';
        $developer->ruleName = $isUser->name;
        $auth->add($developer);
        $auth->addChild($developer, $administrator);
        // Устанавливаем маршруты для роли "developer".
        $this->assignPermissions($developer, [
            '/debug/*',
            '/gii/*',
            '/users-admin/*',
            '/users/*',
        ]);
    }
    
    private function assignRoles()
    {
        $auth = Yii::$app->authManager;
        
        foreach ($this->assignments as $roleName => $users) {
            foreach ($users as $username) {
                $role = $auth->getRole($roleName);
                if (empty($role)) {
                    throw new Exception("Не найдена роль: \"{$roleName}\"");
                }
                $userModel = User::findOne(['username' => $username]);
                if (empty($userModel)) {
                    throw new Exception("Не найден пользователь: \"{$username}\"");
                }
                $auth->assign($role, $userModel->id);
            }
        }
    }
}
