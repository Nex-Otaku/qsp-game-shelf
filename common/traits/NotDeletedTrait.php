<?php

namespace common\traits;

/**
 * Делаем выборку по записям, которые ещё не удалены.
 * Для работы необходимо подключить расширение "mdmsoft/yii2-ar-behaviors".
 * 
 * Использование:
 * $coolModels = CoolModel::find()->notDeleted()->all();
 *
 * @author Nex Otaku <nex@otaku.ru>
 */
trait NotDeletedTrait
{
    public static function notDeleted($query)
    {
        $query->andWhere(['deleted' => false]);
    }
}
