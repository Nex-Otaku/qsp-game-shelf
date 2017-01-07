<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

// Переопределяем класс Finder модуля dektrium/yii2-user.
Yii::$classMap['dektrium\user\Finder'] = Yii::getAlias('@common/modules/user/classes/Finder.php');
