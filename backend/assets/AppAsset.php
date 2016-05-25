<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // STUB 
    // Перенести скрипты админских модулей в сами модули.
    // Здесь оставить только специфичные для конкретного приложения скрипты.
    public $css = [
        'js/fancybox/source/jquery.fancybox.css',
        'css/site.css',
        'css/font-awesome.min.css',
    ];
    public $js = [
        'js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5',
        'js/main.js',
        'js/content-blocks.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
