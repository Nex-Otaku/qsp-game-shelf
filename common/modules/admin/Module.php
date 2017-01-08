<?php

namespace common\modules\admin;

use mdm\admin\Module as BaseModule;

class Module extends BaseModule
{
    // Отключаем шаблон модуля,
    // используем шаблон нашей админки.
    public $layout = null;
    // Переопределяем несколько контроллеров для работы с UUID.
    public $controllerMap = [
        'assignment' => [
            'class' => 'common\modules\admin\controllers\AssignmentController',
        ],
        'menu' => [
            'class' => 'common\modules\admin\controllers\MenuController',
        ],
    ];
    // Подгружаем остальные контроллеры из базового модуля.
    public $controllerNamespace = 'mdm\admin\controllers';
    // Подгружаем вьюшки из базового модуля.
    public function init()
    {
        parent::init();
        $this->viewPath = '@mdm/admin/views';
    }
}