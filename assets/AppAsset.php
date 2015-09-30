<?php


namespace vendor\kuakling\myiicms\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@vendor/kuakling/myiicms/media';
    //public $baseUrl = '@web/media';
    public $sourcePath = '@vendor/kuakling/myiicms/media';
    public $css = [
        'css/style.css',
        'css/prism.css',
        'js/plugins/perfect-scrollbar/perfect-scrollbar.css',
        'js/plugins/chartist-js/chartist.min.css',
    ];
    public $js = [
        'js/prism.js',
        'js/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
        'js/plugins/chartjs/chart.min.js',
        'js/plugins/chartjs/chart-script.js',
        'js/plugins/sparkline/jquery.sparkline.min.js',
        'js/plugins/sparkline/sparkline-script.js',
        'js/plugins/chartist-js/chartist.min.js',
        'js/plugins.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
