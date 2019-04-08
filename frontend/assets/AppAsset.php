<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/mvi.css',
        'css/media.css',
        'css/Mediatwo.css',
        'css/boxlang.css',
        'css/footer.css',
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    ); 
    public $js = [
        'js/layout/officeItem.js',
        'js/layout/dataLayer.js',
        'js/layout/box.js',
        'js/layout/jivochat.js',
        
        'js/mvi.js',
        'js/connect.js',
        'js/assets/yii.js',
        'js/scripts.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
