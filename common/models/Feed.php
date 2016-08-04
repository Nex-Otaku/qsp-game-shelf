<?php

namespace common\models;

use Yii;

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
    public function rules()
    {
        return [
            [['id', 'slug', 'description', 'type', 'api_version_min', 'api_version_max'], 'required'],
            [['description', 'type'], 'string'],
            [['enabled', 'deleted', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
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
            'id' => 'ID',
            'slug' => 'URL',
            'description' => 'Описание',
            'type' => 'Тип',
            'api_version_min' => 'Минимальная версия API',
            'api_version_max' => 'Максимальная версия API',
            'enabled' => 'Отображать',
            'deleted' => 'Удалено',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
        ];
    }
}
