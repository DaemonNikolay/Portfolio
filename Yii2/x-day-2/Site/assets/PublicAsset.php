<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '/web/public/css/font-awesome.min.css',
        '/web/public/css/bootstrap.min.css',
        '/web//public/css/style.css',
        'http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300',
        'http://fonts.googleapis.com/css?family=BenchNine:300,400,700'
    ];
    public $js = [
        '/web//public/js/modernizr.js',
        '/web//public/js/jquery-2.1.1.js',
        '/web//public/js/smoothscroll.js',
        '/web//public/js/bootstrap.min.js',
        '/web//public/js/custom.js'
    ];
    public $depends = [
    ];
}
