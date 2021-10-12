<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class CommonAssets extends AssetBundle
{
    public $sourcePath = __DIR__ . '/';

    /**
     * @inheritdoc
     */
    public $depends = [
        JqueryAsset::class
    ];

    public $css = [
        'css/dashed-line.css',
    ];
}