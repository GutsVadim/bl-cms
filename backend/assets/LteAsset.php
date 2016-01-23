<?php
namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Gutsulyak Vadim <guts.vadim@gmail.com>
 */
class LteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin-lte/css/AdminLTE.css',
        'admin-lte/css/skins/_all-skins.min.css'
    ];
    public $js = [
        'admin-lte/js/app.js',
        'admin-lte/js/demo.js'
    ];
    public $depends = [
    ];
}