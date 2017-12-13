<?
namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;


class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'sources/style.css',
        'sources/owl-carousel/owl.carousel.css',
        'sources/owl-carousel/owl.theme.css',
        'sources/slitslider/css/style.css',
        'sources/slitslider/css/custom.css'
    ];

    public $js = [
        'sources/script.js',
        'sources/owl-carousel/owl.carousel.js',
        'sources/slitslider/js/modernizr.custom.79639.js',
        'sources/slitslider/js/jquery.ba-cond.min.js',
        'sources/slitslider/js/jquery.slitslider.js',
        'sources/js/google_analytics_auto.js',
    ];

    public $depends = [
        'yii\web\YiiAsset', // yii.js, jquery.js
        'yii\bootstrap\BootstrapAsset', // bootstrap.js
        'yii\bootstrap\BootstrapPluginAsset', // bootstrap.css

    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}