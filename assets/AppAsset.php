<?php

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
    public $sourcePath = '@app/assets/app/dist';
    public $css = [
        'styles/bundle.min.css',
    ];
    public $js = [
        'scripts/bundle.min.js',
    ];
    public $jsOptions = [
        'charset' => 'utf-8',
    ];
    public $publishOptions = [
        'except' => [
            '*.html',
        ],
    ];
    public $depends = [
        \yii\web\YiiAsset::class,
        CDNAsset::class,
    ];
}
