<?php

namespace app\assets;


use yii\web\AssetBundle;

class PenilaianAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'custom/js/penilaian/index.js',

    ];
    public $depends = [
        'app\assets\AppAsset',

        
    ];
}