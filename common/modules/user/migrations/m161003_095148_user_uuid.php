<?php

use dmstr\db\mysql\FileMigration;

class m161003_095148_user_uuid extends FileMigration
{
    // TODO
    // Переделать миграцию.
    // Сейчас, миграции идут в таком порядке:
    // 1. Миграция модуля "dektrium/yii2-user"
    // 2. Миграция модуля "mdmsoft/yi2-admin"
    // 3. Миграция модуля "nex-otaku/yii2-uuid-user".
    // 
    // Из-за этого, модули "nex-otaku/yii2-uuid-user" и "nex-otaku/yii2-uuid-admin" слишком плотно связаны.
    // 
    // Нужно сделать самостоятельные миграции для "nex-otaku/yii2-uuid-user" и "nex-otaku/yii2-uuid-admin",
    // чтобы они могли сразу создавать таблицы с бинарными полями, каждый для своих нужд. 
}
