<?php

namespace common\modules\user\models;

use dektrium\user\models\User as BaseUser;
use common\modules\user\behaviors\UuidBehavior;
use yii\base\Arrayable;
use common\modules\user\behaviors\BinaryFieldsBehavior;
use common\modules\user\classes\BinaryFieldsTrait;
use yii\base\ModelEvent;

/**
 * User ActiveRecord model.
 *
 * @property bool    $isAdmin
 * @property bool    $isBlocked
 * @property bool    $isConfirmed
 *
 * Database fields:
 * @property integer $id
 * @property string  $username
 * @property string  $email
 * @property string  $unconfirmed_email
 * @property string  $password_hash
 * @property string  $auth_key
 * @property integer $registration_ip
 * @property integer $confirmed_at
 * @property integer $blocked_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $flags
 *
 * Defined relations:
 * @property Account[] $accounts
 * @property Profile   $profile
 *
 * Dependencies:
 * @property-read Finder $finder
 * @property-read Module $module
 * @property-read Mailer $mailer
 * 
 */

class User extends BaseUser implements Arrayable
{
    use BinaryFieldsTrait;
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            UuidBehavior::className(),
            'binaryFields' => [
                'class' => BinaryFieldsBehavior::className(),
                'fields' => ['id']
            ]
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['deleted'], 'integer'],
            [['deleted_at'], 'safe'],
        ]);
    }

    public function init()
    {
        $this->deleted = 0;
        $this->deleted_at = null;
    }

    /**
     * @return bool
     */
    public function beforeSafeDelete()
    {
        $event = new ModelEvent();
        $this->trigger('beforeSafeDelete', $event);

        return $event->isValid;
    }

    /**
     * @return bool|int
     * @throws \yii\db\Exception
     */
    public function safeDelete()
    {
        if (!$this->beforeSafeDelete()) {
            return false;
        }

        $this->deleted_at = date('Y-m-d h:i:s');
        $this->deleted = 1;

        $connection = \Yii::$app->db;

        $result = $connection->createCommand()
            ->update(
                $this->tableName(), [
                'deleted_at' => $this->deleted_at,
                'deleted' => $this->deleted,
                ], ['id' => $this->id]
            )
            ->execute();

        $this->afterSafeDelete();
        return $result;
    }

    public function afterSafeDelete()
    {
        $this->trigger('afterSafeDelete');
    }

    /**
     * Generates new username based on email address, or creates new username
     * like "emailuser1".
     */
    public function generateUsername()
    {
        throw \yii\base\NotSupportedException("Не поддерживается генерация имени пользователя.");
    }
}
