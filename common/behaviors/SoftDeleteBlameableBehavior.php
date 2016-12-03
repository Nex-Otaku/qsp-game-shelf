<?php

namespace common\behaviors;

use yii\behaviors\BlameableBehavior;
use common\behaviors\SoftDeleteBehavior;

/**
 * При "мягком" удалении записи сохраняем ID пользователя.
 *
 * @author Nex Otaku <nex@otaku.ru>
 */
class SoftDeleteBlameableBehavior extends BlameableBehavior
{
    /**
     * ID пользователя, удалившего запись.
     * @var type
     */
    public $deletedByAttribute = 'deleted_by';
    /**
     * @inheritdoc
     *
     * In case, when the property is `null`, the value of `Yii::$app->user->id` will be used as the value.
     */
    public $value;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->attributes = [
            SoftDeleteBehavior::EVENT_BEFORE_SOFT_DELETE => $this->deletedByAttribute,
        ];
    }
}
