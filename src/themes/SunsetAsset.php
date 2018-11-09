<?php

namespace dominus77\noty\themes;

use yii\web\AssetBundle;

/**
 * Class SunsetAsset
 * @package dominus77\noty\themes
 */
class SunsetAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/needim/noty/lib';

    /**
     * @var array
     */
    public $css = [
        'themes/sunset.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'dominus77\noty\NotyAsset'
    ];
}
