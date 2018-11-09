<?php

namespace dominus77\noty\themes;

use yii\web\AssetBundle;

/**
 * Class NestAsset
 * @package dominus77\noty\themes
 */
class NestAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/needim/noty/lib';

    /**
     * @var array
     */
    public $css = [
        'themes/nest.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'dominus77\noty\NotyAsset'
    ];
}
