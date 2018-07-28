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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    "vendor/bootstrap/css/bootstrap.min.css",
    "vendor/font-awesome/css/font-awesome.min.css",
    "vendor/datatables/dataTables.bootstrap4.css",
    "css/sb-admin.css"
    ];
    public $js = [
        "vendor/jquery/jquery.min.js",
        "vendor/bootstrap/js/bootstrap.bundle.min.js",
        "vendor/jquery-easing/jquery.easing.min.js",
        "vendor/chart.js/Chart.min.js",
        "vendor/datatables/jquery.dataTables.js",
        "vendor/datatables/dataTables.bootstrap4.js",
        "js/sb-admin.min.js",
        "js/sb-admin-datatables.min.js",
        "js/sb-admin-charts.min.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
