<?php

namespace common\behaviors;

use nex_otaku\toolkit\behaviors\MysqlTimestampBehavior;

/**
 * Сохраняем время, когда произошло "мягкое" удаление записи.
 *
 * @author Nex Otaku <nex@otaku.ru>
 */
class SoftDeleteTimestampBehavior extends MysqlTimestampBehavior
{
    public $deletedAtAttribute = 'deleted_at';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->attributes = [
            SoftDeleteBehavior::EVENT_BEFORE_SOFT_DELETE => $this->deletedAtAttribute,
        ];
    }
}
