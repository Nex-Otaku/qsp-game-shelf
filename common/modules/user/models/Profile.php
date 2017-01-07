<?php

namespace common\modules\user\models;

use dektrium\user\models\Profile as BaseProfile;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $name
 * @property string  $phone
 * @property integer $lead_subscribe
 * @property User    $user
 */
class Profile extends BaseProfile
{
    // Объявляем свойства модели, специфичные для проекта.
    // Например, переопределяем поля в методах "rules" и "attributeLabels".
}
