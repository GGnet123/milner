<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class CDNAsset
 *
 * @package app\assets
 */
class CDNAsset extends AssetBundle
{
    public $css = [
        // '//cdn.jsdelivr.net/npm/jquery.steps@1.0.1/dist/jquery-steps.css',
    ];
    public $js = [
        '//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.8/inputmask/inputmask.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js',
    ];
    public $jsOptions = [
        'charset' => 'utf-8',
    ];
}
