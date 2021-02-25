<?php

namespace app\assets;


use yii\web\AssetBundle;

class PenilaianAsset extends AssetBundle
{
  
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://use.fontawesome.com/releases/v5.7.2/css/all.css',
        'css/site.css',
        'css/style.css',
        'css/components.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js',
       'js/yii_overrides.js',
       'js/stisla.js',
       'js/scripts.js',
       'js/bootstrap.bundle.js',
        'custom/js/penilaian/index.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'app\assets\SweetAlertAsset',

    ];
   
}