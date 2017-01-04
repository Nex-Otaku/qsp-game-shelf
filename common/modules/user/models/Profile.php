<?php

namespace common\modules\user\models;

use dektrium\user\models\Profile as BaseProfile;
use Yii;

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
    public function rules()
    {
        return [
                ['name', 'string', 'max' => 255],
                ['phone', 'safe'],
                ['lead_subscribe', 'integer'],
            ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
                'name' => Yii::t('user', 'Name'),
                'phone' => Yii::t('app', 'Phone'),
                'lead_subscribe' => Yii::t('app', 'Lead Subscribe'),
            ];
    }
}
