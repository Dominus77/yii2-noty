<?php

namespace dominus77\noty\themes;

use yii\web\AssetBundle;

/**
 * Class MintAsset
 * @package dominus77\noty\themes
 */
class MintAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/needim/noty/lib';

    /**
     * @var array
     */
    public $css = [
        'themes/mint.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'dominus77\noty\NotyAsset'
    ];
}
