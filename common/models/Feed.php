<?php

namespace common\models;

use Yii;
use nex_otaku\uuid\behaviors\UuidBehavior;
use nex_otaku\toolkit\behaviors\MysqlTimestampBehavior;
use yii\behaviors\BlameableBehavior;
use nex_otaku\softdelete\behaviors\SoftDeleteBehavior;
use nex_otaku\softdelete\behaviors\SoftDeleteBlameableBehavior;
use nex_otaku\softdelete\behaviors\SoftDeleteTimestampBehavior;

/**
 * This is the model class for table "feed".
 *
 * @property string $id
 * @property string $slug
 * @property string $description
 * @property string $type
 * @property string $api_version_min
 * @property string $api_version_max
 * @property integer $enabled
 * @property integer $deleted
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 */
class Feed extends \yii\db\ActiveRecord
{
    use \nex_otaku\softdelete\traits\NotDeletedTrait;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feed';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            UuidBehavior::className(),
            MysqlTimestampBehavior::className(),
            BlameableBehavior::className(),
            SoftDeleteBehavior::className(),
            SoftDeleteBlameableBehavior::className(),
            SoftDeleteTimestampBehavior::className(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'description', 'type', 'api_version_min', 'api_version_max'], 'required'],
            [['description', 'type'], 'string'],
            [['enabled'], 'integer'],
            [['id'], 'string', 'max' => 16],
            [['slug', 'api_version_min', 'api_version_max'], 'string', 'max' => 255],
            [['slug'], 'match', 'pattern' => '/^[a-z0-9-]+$/i'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           'id' => Yii::t('app', 'ID'),
           'slug' => Yii::t('app', 'Slug'),
           'description' => Yii::t('app', 'Description'),
           'type' => Yii::t('app', 'Type'),
           'api_version_min' => Yii::t('app', 'Api Version Min'),
           'api_version_max' => Yii::t('app', 'Api Version Max'),
           'enabled' => Yii::t('app', 'Enabled'),
           'deleted' => Yii::t('app', 'Deleted'),
           'created_at' => Yii::t('app', 'Created At'),
           'created_by' => Yii::t('app', 'Created By'),
           'updated_at' => Yii::t('app', 'Updated At'),
           'updated_by' => Yii::t('app', 'Updated By'),
           'deleted_at' => Yii::t('app', 'Deleted At'),
           'deleted_by' => Yii::t('app', 'Deleted By'),
        ];
    }
}
