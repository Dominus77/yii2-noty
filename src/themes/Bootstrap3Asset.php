<?php

namespace dominus77\noty\themes;

use yii\web\AssetBundle;

/**
 * Class Bootstrap3Asset
 * @package dominus77\noty\themes
 */
class Bootstrap3Asset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/needim/noty/lib';

    /**
     * @var array
     */
    public $css = [
        'themes/bootstrap-v3.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'dominus77\noty\NotyAsset'
    ];
}
