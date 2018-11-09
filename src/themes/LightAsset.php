<?php

namespace dominus77\noty\themes;

use yii\web\AssetBundle;

/**
 * Class LightAsset
 * @package dominus77\noty\themes
 */
class LightAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/needim/noty/lib';

    /**
     * @var array
     */
    public $css = [
        'themes/light.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'dominus77\noty\NotyAsset'
    ];
}
