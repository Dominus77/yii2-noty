<?php

namespace dominus77\noty\themes;

use yii\web\AssetBundle;

/**
 * Class MetrouiAsset
 * @package dominus77\noty\themes
 */
class MetrouiAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/needim/noty/lib';

    /**
     * @var array
     */
    public $css = [
        'themes/metroui.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'dominus77\noty\NotyAsset'
    ];
}
