<?php

namespace common\modules\user\models;

use dektrium\user\models\User as BaseUser;
use nex_otaku\uuid\behaviors\UuidBehavior;
use yii\base\Arrayable;
use nex_otaku\uuid\behaviors\BinaryFieldsBehavior;
use nex_otaku\uuid\traits\BinaryFieldsTrait;
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
     * Generates new username based on email address, or creates new username
     * like "emailuser1".
     */
    public function generateUsername()
    {
        throw \yii\base\NotSupportedException("Не поддерживается генерация имени пользователя.");
    }
}
