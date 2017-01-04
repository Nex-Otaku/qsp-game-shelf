<?php

namespace common\modules\user\models;

use mdm\admin\models\Menu as BaseMenu;
use common\modules\user\behaviors\UuidBehavior;
use common\modules\user\behaviors\BinaryFieldsBehavior;
use common\modules\user\classes\BinaryFieldsTrait;
use yii\base\Arrayable;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id Menu id(autoincrement)
 * @property string $name Menu name
 * @property integer $parent Menu parent
 * @property string $route Route for this menu
 * @property integer $order Menu order
 * @property string $data Extra information for this menu
 *
 * @property Menu $menuParent Menu parent
 * @property Menu[] $menus Menu children
 */
class Menu extends BaseMenu implements Arrayable
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
                'fields' => ['id', 'parent']
            ]
        ]);
    }
}