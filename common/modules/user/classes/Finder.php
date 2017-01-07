<?php

/**
 * Класс для вытягивания моделей из БД.
 * 
 * Переопределяем стандартный класс dektrium\user\Finder, чтобы сделать выборку с учётом softDelete.
 * 
 * К сожалению, красивого способа переопределить класс разработчик модуля не предоставил,
 * поэтому делаем так:
 * в файле common/config/bootstrap.php
 * // Переопределяем класс Finder модуля "dektrium/yii2-user".
 * Yii::$classMap['dektrium\user\Finder'] = Yii::getAlias('@common/modules/user/classes/Finder.php');
 * 
 * TODO:
 * Добиться, чтобы можно было нормально переопределять Finder - с помощью конфигурации модуля.
 * Для этого нужно внести изменения в модуль "dektrium/yii2-user", других вариантов нет.
 */

namespace dektrium\user;

use dektrium\user\models\query\AccountQuery;
use dektrium\user\models\Token;
use yii\base\Object;
use yii\db\ActiveQuery;
use Yii;

/**
 * Finder provides some useful methods for finding active record models.
 */
class Finder extends Object
{
    /** @var ActiveQuery */
    protected $userQuery;

    /** @var ActiveQuery */
    protected $tokenQuery;

    /** @var AccountQuery */
    protected $accountQuery;

    /** @var ActiveQuery */
    protected $profileQuery;

    public function getModule()
    {
        // Модуль должен быть подключен с ID "user".
        $app = Yii::$app;
        if ($app->hasModule('user')) {
            $module = $app->getModule('user');
            if ($module instanceof Module) {
                return $module;
            }
        }
        throw new \yii\base\Exception("User module not configured properly");
    }
    
    /**
     * @return ActiveQuery
     */
    public function getUserQuery()
    {
        return $this->userQuery;
    }

    /**
     * @return ActiveQuery
     */
    public function getTokenQuery()
    {
        return $this->tokenQuery;
    }

    /**
     * @return ActiveQuery
     */
    public function getAccountQuery()
    {
        return $this->accountQuery;
    }

    /**
     * @return ActiveQuery
     */
    public function getProfileQuery()
    {
        return $this->profileQuery;
    }

    /** @param ActiveQuery $accountQuery */
    public function setAccountQuery(ActiveQuery $accountQuery)
    {
        $this->accountQuery = $accountQuery;
    }

    /** @param ActiveQuery $userQuery */
    public function setUserQuery(ActiveQuery $userQuery)
    {
        $this->userQuery = $userQuery;
    }

    /** @param ActiveQuery $tokenQuery */
    public function setTokenQuery(ActiveQuery $tokenQuery)
    {
        $this->tokenQuery = $tokenQuery;
    }

    /** @param ActiveQuery $profileQuery */
    public function setProfileQuery(ActiveQuery $profileQuery)
    {
        $this->profileQuery = $profileQuery;
    }

    /**
     * Finds a user by the given id.
     *
     * @param int $id User id to be used on search.
     *
     * @return models\User
     */
    public function findUserById($id)
    {
        return $this->findUser(['id' => $id])->one();
    }

    /**
     * Finds a user by the given username.
     *
     * @param string $username Username to be used on search.
     *
     * @return models\User
     */
    public function findUserByUsername($username)
    {
        return $this->findUser(['username' => $username])->one();
    }

    /**
     * Finds a user by the given email.
     *
     * @param string $email Email to be used on search.
     *
     * @return models\User
     */
    public function findUserByEmail($email)
    {
        return $this->findUser(['email' => $email])->one();
    }

    /**
     * Finds a user by the given username or email.
     *
     * @param string $usernameOrEmail Username or email to be used on search.
     *
     * @return models\User
     */
    public function findUserByUsernameOrEmail($usernameOrEmail)
    {
        if (filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
            return $this->findUserByEmail($usernameOrEmail);
        }

        return $this->findUserByUsername($usernameOrEmail);
    }

    /**
     * Finds a user by the given condition.
     *
     * @param mixed $condition Condition to be used on search.
     *
     * @return \yii\db\ActiveQuery
     */
    public function findUser($condition)
    {
        if ($this->module->enableSoftDelete) {
            return $this->userQuery
                ->where(['deleted' => false])
                ->andWhere($condition);
        }
        return $this->userQuery->where($condition);
    }

    /**
     * @return AccountQuery
     */
    public function findAccount()
    {
        return $this->accountQuery;
    }

    /**
     * Finds an account by id.
     *
     * @param int $id
     *
     * @return models\Account|null
     */
    public function findAccountById($id)
    {
        return $this->accountQuery->where(['id' => $id])->one();
    }

    /**
     * Finds a token by user id and code.
     *
     * @param mixed $condition
     *
     * @return ActiveQuery
     */
    public function findToken($condition)
    {
        return $this->tokenQuery->where($condition);
    }

    /**
     * Finds a token by params.
     *
     * @param integer $userId
     * @param string  $code
     * @param integer $type
     *
     * @return Token
     */
    public function findTokenByParams($userId, $code, $type)
    {
        return $this->findToken([
            'user_id' => $userId,
            'code'    => $code,
            'type'    => $type,
        ])->one();
    }

    /**
     * Finds a profile by user id.
     *
     * @param int $id
     *
     * @return null|models\Profile
     */
    public function findProfileById($id)
    {
        return $this->findProfile(['user_id' => $id])->one();
    }

    /**
     * Finds a profile.
     *
     * @param mixed $condition
     *
     * @return \yii\db\ActiveQuery
     */
    public function findProfile($condition)
    {
        return $this->profileQuery->where($condition);
    }
}
